<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    public function normaluserprofile(User $user)
    {
        return view('normaluserprofile', [
            'user' => $user
        ]);
    }

    public function show(User $user)
    {
        return view('admin.users.profile', [
            'user' => $user
        ]);
    }

    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('danger', 'Usunięto profil użytkownika');
    }

    public function update(User $user)
    {
        $inputs = request()->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users,username,'.$user->id],
            'name' => ['required', 'string', 'max:255'],
            'avatar' => ['file'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'password' => ['min:8', 'confirmed']
        ]);

        if(request('avatar'))
        {
            $inputs['avatar'] = request('avatar')->store('images');
        }

        $user->update($inputs);
        
        return back()->with('success', 'Zmiany w profilu zostały zapisane');
     }
}
