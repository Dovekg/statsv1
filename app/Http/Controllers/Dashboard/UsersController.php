<?php

namespace App\Http\Controllers\Dashboard;

use App\User;
use Bican\Roles\Models\Role;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }

    public function index()
    {
        $users = User::all();
        return view('dashboard.users.index', compact('users'));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();
        return view('dashboard.users.edit', compact('user', 'roles'));
    }

    public function update(Request $request, $id)
    {
//        dd($request->all());
        $user = User::findOrFail($id);
        $password = $request->get('password');
        $confirm = $request->get('confirm_password');
        if($password) {
            if($password == $confirm){
                $user->name = $request['name'];
                $user->email = $request['email'];
                $user->password = bcrypt($request['password']);
                $user->save();
            }
            else {
                redirect()->back();
            }
        }
        else {
            $user->name = $request['name'];
            $user->email = $request['email'];
            $user->save();
        }

        if($request->get('role')) {
            $user->detachAllRoles();
            $user->attachRole($request->get('role'));
        }

        return redirect()->to(route('dashboard.users.index'));
    }
}
