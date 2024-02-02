<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $permissions = Permission::latest()->paginate(10);
        return view('permission.list', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('permission.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $permission = Permission::create(['name' => $request->name]);
            return redirect()->route('permissions.index')->with(['message' => 'Permission is created successfully.', 'status' => 'success']);
        } catch (\Exception $e) {
            return redirect()->route('permissions.index')->with(['message' => 'Something went wrong.', 'status' => 'danger']);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Permission $permission)
    {
        return view('permission.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        try {
            $permission->update(['name' => $request->name]);
            return redirect()->route('permissions.index')->with(['message' => 'Permission is updated successfully.', 'status' => 'success']);
        } catch (\Exception $e) {
            return redirect()->route('permissions.index')->with(['message' => 'Something went wrong.', 'status' => 'danger']);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        $permission->delete();
        return redirect()->route('permissions.index')->with(['message' => 'Permission is deleted successfully.', 'status' => 'success']);
    }
}
