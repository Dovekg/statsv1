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

	
    public function index(Task $tasks)
    {
        if (Auth::user()->is('admin|analyst')) {
            $all = $tasks->all()->count();
            $completed = $tasks->where('completed', true)->count();
            $closed = $tasks->where('closed', true)->count();
            $process = $tasks->where('claimed', true)->count();
        }
        else {
            $allTasks = $tasks->where('user_id', Auth::user()->id);
            $all = $allTasks->count();
            $completed = $allTasks->where('completed', true)->count();
            $closed = $allTasks->where('closed', true)->count();
            $process = $allTasks->where('claimed', true)->count();
        }
        return view('dashboard.index', compact('all', 'process', 'completed', 'closed'));
    }
}
