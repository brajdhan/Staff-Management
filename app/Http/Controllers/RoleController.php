<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Role::latest()->get();
        return view('role.list', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Role $role)
    {
        $roleData = Role::get();
        $roles = [];
        $roles[null] = 'Please Select Role';

        foreach ($roleData as $data) {
            $roles[$data['id']] = ucfirst($data->name);
        }

        $permissions = Permission::get();
        $role->permissions;
        return view('role.edit', compact('roles', 'role', 'permissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Role $role)
    {
        $role = Role::findById($role->id);

        if ($role->id == 1) {
            $roleName = 'admin';
        } else if ($role->id == 2) {
            $roleName = 'user';
        } else if ($role->id == 3) {
            $roleName = 'staff';
        } else {
            $roleName = '';
        }

        $role->update(['name' => $roleName]);
        $role->syncPermissions($request->permission);
        return redirect()->route('roles.index')->with(['message' => 'Role updated successfully.', 'status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('roles.index')->with(['message' => 'Role deleted successfully.', 'status' => 'success']);
    }
}
