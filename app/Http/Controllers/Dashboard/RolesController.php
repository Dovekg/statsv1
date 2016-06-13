<?php

namespace App\Http\Controllers\Dashboard;

use Bican\Roles\Models\Permission;
use Bican\Roles\Models\Role;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class RolesController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    
    public function index()
    {
        $roles = Role::all();
        return view('dashboard.roles.index', compact('roles'));
    }

    public function store(Request $request)
    {
        Role::create($request->all());
        return redirect()->back();
    }

    public function edit($id)
    {
        $role = Role::findOrFail($id);
        return view('dashboard.roles.edit', compact('role'));
    }

    public function update(Request $request, $id)
    {
        $role = Role::findOrFail($id);
        $role->save($request->all());
        return redirect()->back();
    }

    public function destroy($id)
    {
        $role = Role::findOrFail($id);
        $role->delete();
        return redirect()->back();
    }
        
}
