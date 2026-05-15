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
        $permissions = Permission::paginate(3);
        return view('permissions.index', compact('permissions'));
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
    }
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('permissions.edit', compact('permission'));
    }
    public function update(Request $request, $id)
    {
        $permission = Permission::findOrFail($id);
        $validator = Validator::make($request->all(),[
            'name' => 'required|unique:permissions,name,' . $id . '|min:3'
        ]); 

        if ($validator->passes()) {
            $permission->update(['name' => $request->name]);
            return redirect()->route('permissions.index')->with('success', 'Permission updated successfully.');
        } else {
            return redirect()->route('permissions.edit', $id)->withInput()->withErrors($validator);
        }
    }
    public function destroy($id)
    {
        $permission = Permission::findOrFail($id);
        $permission->delete();

        return redirect()->route('permissions.index')->with('success', 'Permission deleted successfully.');
    }      
}
