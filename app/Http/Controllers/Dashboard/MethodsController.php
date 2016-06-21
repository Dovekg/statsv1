<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Method;

class MethodsController extends Controller
{
	public function __construct()
    {
        $this->middleware('role:admin|analyst|moderator');
    }
    public function index()
    {
    	$methods = Method::all();
    	return view('dashboard.methods.index', compact('methods'));
    }

    public function store(Request $request)
    {
        $method = Method::create($request->only('name', 'description'));
        return redirect()->back();
    }

    public function edit($id)
    {
        $method = Method::findOrFail($id);
        return view('dashboard.methods.edit', compact('method'));
    }

    public function update(Request $request, $id)
    {
        $method = Method::findOrFail($id);
        $method['name'] = $request->get('name');
        $method['description'] = $request->get('description');
        $method->save();
        return redirect()->to(route('dashboard.methods.index'));
    }

    public function destroy($id)
    {
        $method = Method::findOrFail($id);
        $method->delete();
        return redirect()->back();
    }
}
