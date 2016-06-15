<?php

namespace App\Http\Controllers\Dashboard;

use Bican\Roles\Models\Permission;
use Bican\Roles\Models\Role;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class PermsController extends Controller
{
    public function __construct()
    {
        $this->middleware('role:admin');
    }
    public function index()
    {
        $perms = Permission::all();
        $roles = Role::all();
        return view('dashboard.roles.perms.index', compact('perms', 'roles'));
    }

    public function store(Request $request)
    {
        $perm = Permission::create($request->only('name', 'slug', 'description', 'model'));
        $role = Role::find($request->get('role'));
        $role->attachPermission($perm);
        return redirect()->back();
    }

    public function edit($id)
    {
        $perm = Permission::findOrFail($id);
        $roles = Role::all();
        return view('dashboard.roles.perms.edit', compact('perm', 'roles'));
    }

    public function update(Request $request, $id)
    {
        $perm = Permission::findOrFail($id);
        $perm['name'] = $request['name'];
        $perm['slug'] = $request['slug'];
        $perm['model'] = $request['model'];
        $perm['description'] = $request['description'];
        $perm->save();
        $role = Role::find($request->get('role'));
        $role->attachPermission($perm);
        return redirect()->to(route('dashboard.perms.index'));
    }

    public function destroy($id)
    {
        $perm = Permission::findOrFail($id);
        $perm->delete();
        return redirect()->back();
    }
}
