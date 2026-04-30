<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    #This method will show permission page
    public function index()
    {
        return view('permissions.list');
    }
    public function create()
    {
        return view('permissions.create');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:permissions,name|min:3'
        ]);

        if ($validator->passes()) {
            Permission::create(['name' => $request->name]);
            return redirect()->route('permissions.index')->with('success', 'Permission created successfully.');
        } else {
            return redirect()->route('permissions.create')->withInput()->withErrors($validator);
        }
        

        // $request->validate([
        //     'name' => 'required|unique:permissions,name',
        // ]);

        // Permission::create(['name' => $request->name]);

        // return redirect()->route('permissions.index')->with('success', 'Permission created successfully.');
    }
    public function edit($id)
    {
        // $permission = Permission::findOrFail($id);
        // return view('permissions.edit', compact('permission'));
    }
    public function update(Request $request, $id)
    {
        // $request->validate([
        //     'name' => 'required|unique:permissions,name,' . $id,
        // ]);
    }
    public function destroy($id)
    {
        // $permission = Permission::findOrFail($id);
        // $permission->delete();

        // return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully.');
    }      
}
