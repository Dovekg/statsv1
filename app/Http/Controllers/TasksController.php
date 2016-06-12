<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Method;
use App\Task;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Response;

class TasksController extends Controller
{
    public function create (Method $method)
    {
    	$methods = $method->all();
    	return view('tasks.create', compact('methods'));
    }

    public function store (Request $request, Task $task)
    {
    	if ($request->hasFile('example_file')) {
            $file = $request->file('example_file');
            if ($file->isValid()) {
                $newFileName = md5(time() . rand(0, 1000)) . '.' . $file->getClientOriginalExtension();
                $savePath = $newFileName;
                Storage::put(
                    $savePath,
                    file_get_contents($file->getRealPath())
                );
                $request['example_file_path'] = $savePath;
                $request['example_file_mime'] = $file->getClientMimeType();
                $request['example_file_ori_filename'] = $file->getClientOriginalName();  
            }
        }
        $id = $task->create($request->except(['_token', 'example_file', 'methods']))->id;

        if($request->get('methods'))
        {
            foreach ($request->get('methods') as $key => $method)
            {
                $task->find($id)->methods()->attach($key);
            }
        }

        return redirect('/tasks/' . $id );
    }
    public function show($id)
    {
    	$task = Task::findOrFail($id);
    	return view('tasks.show', compact('task'));
    }

    public function downloadExample($path, Task $task)
    {
    	$entry = $task->where('example_file_path', $path)->first();
        $file = Storage::disk('local')->get($entry->example_file_path);
        return (new Response($file, 200))
            ->header('Content-Type', $entry->example_file_mime);
    }

}
