<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Task;
use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}

	
    public function index(Task $task)
    {
        if (Auth::user()->is('admin|analyst'))
            $tasks = $task->all();
        else
            $tasks = $task->where('user_id', Auth::user()->id);
        $all = $tasks->count();
        $completed = $tasks->where('completed', true)->count();
        $closed = $tasks->where('closed', true)->count();
        $process = $all - $completed - $closed;

        return view('dashboard.index', compact('all', 'process', 'completed', 'closed'));
    }
}
