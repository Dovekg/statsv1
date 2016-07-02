<?php

namespace App\Http\Controllers\Dashboard;

use App\Bid;
use App\Tag;
use App\Task;
use App\User;
use App\Method;
use Bican\Roles\Models\Role;
use Carbon\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Alert;

class TasksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    
    public function index(Task $task)
    {
        if (Auth::user()->is('admin|analyst')) {
            $tasks = $task->orderBy('created_at', 'desc')->paginate(10);
        }
        else
            $tasks = $task->where('user_id', Auth::user()->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard.tasks.index', compact('tasks'));
    }

    public function edit($id)
    {
        $task = Task::findOrFail($id);
        $methods =Method::all()->all();
        foreach ($methods as $k => $v) {
            foreach ($task->tags as $t) {
                if($v->name == $t->tag)
                    unset($methods[$k]);
            }
        };
        
        return view('dashboard.tasks.edit', compact('task', 'methods'));
    }

    public function update(Request $request, $id)
    {
        $task = Task::findOrFail($id);
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
        $task->save($request->except(['data', 'tags']));
        $task->tags()->each(function($tag) {
                $tag->delete();
            });
        $tags = $request->get('tags');
        if( $tags )
        {
            
            foreach ($tags as $key => $method)
            {
                Tag::create([
                    'task_id' => $task->id,
                    'tag' => $method
                ]);
            };
        };
        
        return redirect('/dashboard/tasks/' . $task->id );
    }

    public function create()
    {
        $methods = Method::all();
        return view('dashboard.tasks.create', compact('methods'));
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
        $id = $task->create($request->except(['data', 'tags']))->id;
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
        alert()->success('任务已顺利提交给分析员，等待认领中！', '成功');
        return redirect('/dashboard/tasks/' . $id );
    }

    public function show($id)
    {
        $task = Task::findOrFail($id);
//        Carbon::now()->timestamp
        $cent = (Carbon::now()->timestamp- $task->created_at->timestamp) / 86400;
        if ($cent >= 1) {
            $percent = 100;
        } elseif ($cent <=0 ){
            $percent = 0;
        } else {
            $percent = floor($cent*100);
        }
        return view('dashboard.tasks.show', compact('task', 'percent'));
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
        alert()->success('任务状态已更新！', '操作成功');
        return redirect()->back();
    }

    public function claim(Request $request, $id)
    {
        $task = Task::findOrFail($id);
        $task->claimed = true;
        $task->claimed_user_id = $request['user_id'];
        $task->save();
        alert()->success('任务领取成功，请尽快完成分析！', '操作成功');
        return redirect()->back();
    }

    public function destroy($id)
    {
        $task = Task::findOrFail($id);
        $task->delete();
        alert()->success('任务删除成功！', '操作成功');
        return redirect()->to(route('dashboard.tasks.index'));

    }

    public function complete($id)
    {
        $task = Task::findOrFail($id);
        $task->completed = true;
        $task->save();
        alert()->success('任务完成，我们尽快通知用户验收！', '恭喜');
        return redirect()->back();

    }

    public function bid(Request $request, $id, Bid $bid)
    {
        $request['task_id'] = $id;
        $request['bid_user_id'] = Auth::user()->id;
        $bid->create($request->all());
        alert()->success('竞价已提交！', '操作成功');
        return redirect()->back();
    }

    public function claimed(Task $task)
    {
        if (Auth::user()->is('admin'))
            $tasks = $task->where('claimed', true)->where('completed', false)->orderBy('created_at', 'desc')->paginate(10);
        elseif(Auth::user()->is('analyst'))
            $tasks = $task->where('claimed_user_id', Auth::user()->id)->where('completed', false)->orderBy('created_at', 'desc')->paginate(10);
        else
            $tasks = $task->where('user_id', Auth::user()->id)->where('claimed', true)->where('completed', false)->orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard.tasks.index', compact('tasks'));
    }

    public function completed(Task $task)
    {
        return $this->getTasks($task, 'completed');
    }
    public function closed(Task $task)
    {
        return $this->getTasks($task, 'closed');
    }

        /**
         * @param Task $task
         * @param $type
         * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
         */
    public function getTasks(Task $task, $type) {
        if (Auth::user()->is('admin|analyst'))
            $tasks = $task->where($type, true)->orderBy('created_at', 'desc')->paginate(10);
        else
            $tasks = $task->where('user_id', Auth::user()->id)->where($type, true)->orderBy('created_at', 'desc')->paginate(10);
        return view('dashboard.tasks.index', compact('tasks'));
    }

}
