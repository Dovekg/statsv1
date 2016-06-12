<?php

namespace App\Http\Controllers\Dashboard;

use App\Bid;
use App\Tag;
use App\Task;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class TasksController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index(Task $task)
    {
        $tasks = $task->where('user_id', Auth::user()->id)->get();
        return view('dashboard.tasks.index', compact('tasks'));
    }

    public function create()
    {
        return view('dashboard.tasks.create ');
    }

    public function store(Request $request, Task $task, Tag $tag)
    {
        if ($request->hasFile('data')) {
            $file = $request->file('data');
            if ($file->isValid()) {
                $newFileName = md5(time() . rand(0, 1000)) . '.' . $file->getClientOriginalExtension();
                $savePath = $newFileName;
                Storage::put(
                    $savePath,
                    file_get_contents($file->getRealPath())
                );
                $request['data_path'] = $savePath;
                $request['data_mime'] = $file->getClientMimeType();
                $request['data_ori_filename'] = $file->getClientOriginalName();
            }
        }
        $request['user_id'] = Auth::user()->id;
        $id = $task->create($request->except(['_token', 'data', 'tags']))->id;
        $tags = $request->get('tags');
        if( $tags )
        {
            foreach ($tags as $key => $method)
            {
                $tag->create([
                    'task_id' => $id,
                    'tag' => $method
                ]);
            }
        }
        return redirect('/dashboard/tasks/' . $id );
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);
        return view('dashboard.tasks.show', compact('task'));
    }
    public function downloadData($path, Task $task)
    {
        $entry = $task->where('data_path', $path)->first();
        $file = Storage::disk('local')->get($entry->data_path);
        return (new Response($file, 200))
            ->header('Content-Type', $entry->data_file_mime);
    }

    public function close($id)
    {
        $task = Task::findOrFail($id);
        $task->closed = !($task->closed);
        $task->save();
        return redirect()->back();
    }

    public function claim($id)
    {
        $task = Task::findOrFail($id);
        $task->claimed = true;
        $task->claimed_user_id = Auth::user()->id;
        $task->save();
        return redirect()->back();
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        return redirect()->to(route('dashboard.tasks.index'));

    }

    public function complete($id)
    {
        $task = Task::findOrFail($id);
        $task->completed = true;
        $task->save();
        return redirect()->back();

    }

    public function bid(Request $request, $id, Bid $bid)
    {
        $request['task_id'] = $id;
        $request['bid_user_id'] = Auth::user()->id;
        $bid->create($request->all());
        return redirect()->back();
    }

}
