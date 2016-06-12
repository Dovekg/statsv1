<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Comment;


class CommentsController extends Controller
{

	public function __construct()
	{
		$this->middleware('auth');
	}
	
    public function store(Request $request, Comment $comment)
    {
        $request['user_id'] = Auth::user()->id;
        $comment->create($request->all());
        alert()->success('Success Message', 'Optional Title');
        return redirect()->back();
    }
}
