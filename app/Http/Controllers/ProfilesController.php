<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Alert;

class ProfilesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function show()
    {
        return view('dashboard.profiles.show');
    }

    public function change()
    {
        return view('dashboard.profiles.change');
    }
    

    public function changePassword(Request $request)
    {
        $password = $request->get('password');
        $confirm = $request->get('confirm_password');
        if($password == $confirm){
            Auth::user()->update(['password' => bcrypt($password)]);
            Alert::success('用户密码修改成功，现在你可以用心密码登陆！', '恭喜！');
            Auth::guard()->logOut();
        }
        else {
            Alert::error('两次输入的密码不一样，请重新输入！', '出现错误');
            return redirect()->back();
        }
        return redirect(url('/login'));
    }

    public function changeUsername(Request $request)
    {
        $username = $request->get('username');
        Auth::user()->update(['name' => $username]);
        Alert::success('用户名更新成功', '恭喜！');

        return redirect()->back();
    }
}
