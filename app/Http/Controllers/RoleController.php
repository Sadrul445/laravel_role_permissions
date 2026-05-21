<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::orderBy('name', 'ASC')->paginate(3);
        return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $permissions = Permission::orderBy('name', 'ASC')->get();
        return view(
            'roles.create',
            [
                'permissions' => $permissions
            ]
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|unique:roles|min:3'
        ]);

        if ($validator->passes()) {

            $role = Role::create([
                'name' => $request->name
            ]);

            if (!empty($request->permission)) {
                foreach ($request->permission as $name) {
                    $role->givePermissionTo($name);
                }
            }
            return redirect()
                ->route('roles.index')
                ->with('success', 'Role created successfully.');
        } else {
            return redirect()
                ->route('roles.create')
                ->withInput()
                ->withErrors($validator);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
            $roles = Role::orderBy('name', 'ASC')->get();
            return view('roles.index', compact('roles'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
            $role = Role::findOrFail($id);
            $hasPermissions = $role->permissions->pluck('name');
            $permissions = Permission::orderBy('name', 'ASC')->get();
            return view(
                'roles.edit',[
                    'permissions' => $permissions,
                    'hasPermissions' => $hasPermissions,
                    'role' => $role
                ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|min:3|unique:roles,name,' . $request->id
        ]);

        if ($validator->passes()) {

            $role = Role::findOrFail($request->id);
            $role->update([
                'name' => $request->name
            ]);

            if (!empty($request->permission)) {
                $role->syncPermissions($request->permission);
            } else {
                $role->syncPermissions([]);
            }
            return redirect()
                ->route('roles.index')
                ->with('success', 'Role updated successfully.');
        } else {
            return redirect()
                ->route('roles.edit', $request->id)
                ->withInput()
                ->withErrors($validator);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy()
    {
        //
    }
}
