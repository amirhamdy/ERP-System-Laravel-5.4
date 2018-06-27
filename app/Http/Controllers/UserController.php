<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Role;
use DB;
use Hash;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*    public function __construct()
        {
            $this->middleware('auth');
        }*/

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $users = User::all();
        return view('users.index')->with(['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $roles = Role::pluck('display_name', 'id');
        return view('users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
            'roles' => 'required'
        ]);
        $input = $request->only('name', 'email', 'password');
        $input['password'] = Hash::make($input['password']); //Hash password
        $user = User::create($input); //Create User table entry
        //Attach the selected Roles
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }
        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::get(); //get all roles
        $userRoles = $user->roles->pluck('id')->toArray();
        return view('users.edit', compact('user', 'roles', 'userRoles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param  int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'confirmed',
            'roles' => 'required'
        ]);
        $input = $request->only('name', 'email', 'password');
        if (!empty($input['password'])) {
            $input['password'] = Hash::make($input['password']); //update the password
        } else {
            $input = array_except($input, array('password')); //remove password from the input array
        }
        $user = User::find($id);
        $user->update($input); //update the user info
        //delete all roles currently linked to this user
        DB::table('role_user')->where('user_id', $id)->delete();
        //attach the new roles to the user
        foreach ($request->input('roles') as $key => $value) {
            $user->attachRole($value);
        }
        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }
}