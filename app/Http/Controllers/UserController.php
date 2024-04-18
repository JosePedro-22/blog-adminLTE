<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::paginate(10);

        return view('dashboard.user.index',
            [
                'usuarios' => $usuarios,
            ]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $data = $request->validate([
            'name' => 'required | string',
            'email' => 'required | email | unique:users',
            'password' => 'required|confirmed ',
            'password_confirmation' => 'required',
            'active' => 'sometimes'
        ]);

        if(!isset($data['active']) || $data['active'] != 'on')
            $data['active'] = false;
        else
            $data['active'] = true;

        User::create($data);

        return back();

    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('dashboard.user.edit', [
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $data = $request->validate([
            'name' => 'required | string',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id)
            ],
            'password' => 'sometimes|confirmed',
            'password_confirmation' => 'sometimes',
            'active' => 'sometimes'
        ]);

        if(!isset($data['active']) || $data['active'] != 'on')
            $data['active'] = false;
        else
            $data['active'] = true;

        $user->update($data);

        return redirect()->route('users.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();

        return back();
    }
}
