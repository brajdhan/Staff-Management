<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $users = User::role(['user', 'staff'])->orderBy('id', 'desc')->get();
        return view('user.list', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roleData = Role::where('id', '!=', 1)->get();
        $roles = [];
        $roles[null] = 'Please Select Role';
        foreach ($roleData as $data) {
            if ($data['name'] == 'user') {
                $roles[$data['name']] = 'User';
            }

            if ($data['name'] == 'staff') {
                $roles[$data['name']] = 'Staff';
            }
        }

        // return view('user.create', compact('roles'));
        return view('user.create-muliple-address', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->address;
        $request->validate([
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required|email:rfc,dns|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required|numeric|digits:10|unique:users',
            'gender' => 'required',
            'role' => 'required',
            'designation' => 'nullable',
            'address'=>'required|array'
        ]);

        $user = new User;
        $user->first_name = $request->first_name;
        $user->last_name = $request->last_name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->password = Hash::make($request->password);
        $user->gender = $request->gender;
        $user->designation = $request->designation ?? NULL;
        $user->current_address = json_encode($request->address);
        $user->save();

        $user->assignRole($request->input('role'));

        return redirect()->route('users.index')->with(['message' => 'User is created successfully.', 'status' => 'success']);
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
    public function edit(string $id)
    {
        $roleData = Role::where('id', '!=', 1)->get();
        $roles = [];
        $roles[null] = 'Please Select Role';
        foreach ($roleData as $data) {
            if ($data['name'] == 'user') {
                $roles[$data['name']] = 'User';
            }

            if ($data['name'] == 'staff') {
                $roles[$data['name']] = 'Staff';
            }
        }

        $user = User::find($id);

        return view('user.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'first_name' => 'required|min:3',
            'last_name' => 'required|min:3',
            'email' => 'required|email:rfc,dns|unique:users,email,' . $id,
            'phone' => 'required|numeric|digits:10|unique:users,phone,' . $id,
            'role' => 'required',
            'gender' => 'required',
            'designation' => 'nullable',
            'address' => 'required|array|nullable',
        ]);

        $update_user = User::find($id);
        $update_user->first_name = $request->first_name;
        $update_user->last_name = $request->last_name;
        $update_user->email = $request->email;
        $update_user->phone = $request->phone;
        $update_user->gender = $request->gender;
        $update_user->current_address = json_encode($request->address) ?? NULL;
        $update_user->designation = $request->designation ?? NULL;

        if ($request->password) {
            $update_user->password = Hash::make($request->password);
        }

        if (request()->hasFile('profile')) {
            $file = request()->file('profile');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $update_user->profile = $filename;
        }
        $update_user->save();

        $update_user->syncRoles($request->input('role'));

        return redirect()->route('users.index')->with(['message' => 'User is updated successfully.', 'status' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        User::destroy($id);

        return redirect()->route('users.index')->with(['message' => 'User deleted successfully.', 'status' => 'success']);
    }
}
