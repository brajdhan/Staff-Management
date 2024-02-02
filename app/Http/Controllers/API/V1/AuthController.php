<?php

namespace App\Http\Controllers\API\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /** User Login */
    public function login(Request $request)
    {
        try {
            $this->validate($request, [
                'email' => 'required|email',
                'password' => 'required',
            ]);
            if (auth()->attempt(['email' => $request->email, 'password' => $request->password])) {
                // Authentication passed...
                /** @var \App\Models\User $user */
                $user = auth()->user();
                return response(["error" => false, 'token' => $user->createToken('API')->plainTextToken]);
            } else {
                return response(["error" => "Authentication Failed!"], 400);
            }
        } catch (ValidationException $e) {
            return response(["error" => $e->errors()], 400);
        } catch (Exception $e) {
            return response(["error" => $e->getMessage()], 500);
        }
    }

    /** User Register */
    public function register(Request $request)
    {
        try {
            $this->validate($request, [
                'first_name'          => ['required', 'string', 'max:255'],
                'last_name'          => ['required', 'string', 'max:255'],
                'email'         => ['required', 'string', 'email', 'max:255', 'unique:users'],
                'password'      => ['required', 'string'],
                'phone'        => ['required', 'numeric', 'digits:10','unique:users'],
                'gender'      => ['required', 'string'],
                'role'          => ['required', 'string', Rule::in([
                    'user',
                    'staff',
                ])],
                'designation' => ['nullable'],
                'current_address' => ['nullable'],
                'permanent_address' => ['nullable'],
            ]);


            $user = new User;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->gender = $request->gender;
            $user->designation = $request->designation ?? NULL;
            $user->current_address = $request->current_address ?? NULL;
            $user->permanent_address = $request->permanent_address ?? NULL;
            $user->save();
            
            $user->assignRole($request->input('role'));

            // return response(["error" => false, 'user' => $user, 'token' => $user->createToken('API')->plainTextToken]);
            return response(["error" => false, 'user' => $user]);
        } catch (ValidationException $e) {
            return response(["error" => $e->errors()], 400);
        } catch (Exception $e) {
            return response(["error" => $e->getMessage()], 500);
        }
    }

    public function update(Request $request)
    {
        try {
             /** @var \App\Models\User $user */
            $user = auth()->user();
            $this->validate($request, [
                'first_name'          => ['required', 'string', 'max:255'],
                'last_name'          => ['required', 'string', 'max:255'],
                'phone' => 'required|numeric|digits:10|unique:users,phone,' . $user->id,
                'gender'      => ['required', 'string'],
                'role'          => ['required', 'string', Rule::in([
                    'user',
                    'staff',
                ])],
                'designation' => ['nullable'],
                'current_address' => ['nullable'],
                'permanent_address' => ['nullable'],
            ]);

            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;

            $user->phone = $request->phone;
            $user->gender = $request->gender;
            $user->designation = $request->designation ?? NULL;
            $user->current_address = $request->current_address ?? NULL;
            $user->permanent_address = $request->permanent_address ?? NULL;

            if ($request->has('email')) {
                $user->email =  $request->email;
            }

            if ($request->has('password')) {
                $user->password =  Hash::make($request->password);
            }
            if (request()->hasFile('profile')) {
                $file = request()->file('profile');
                $filename = time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads'), $filename);
                $user->profile = $filename;
            }

            $user->save();
            $user->syncRoles($request->role);
            return response(["error" => false, 'message' => "User Updated", 'user' => $user]);
        } catch (ValidationException $e) {
            return response(["error" => $e->errors()], 400);
        } catch (Exception $e) {
            return response(["error" => $e->getMessage()], 500);
        }
    }

/** User Logout */
    public function logout(Request $request)
    {
        /** @var \App\Models\User $user */
        $user = auth()->user();
        $user->tokens()->delete();
        return response([
            "error" => false,
            'message' => 'User logged out'
        ]);
    }
}
