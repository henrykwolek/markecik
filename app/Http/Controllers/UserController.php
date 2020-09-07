<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function show(User $user)
    {
        return view('admin.users.profile', [
            'user' => $user
        ]);
    }

    public function update(User $user)
    {
        $inputs = request()->validate([
            'username' => ['required', 'string', 'max:255', 'unique:users,username,'.$user->id],
            'name' => ['required', 'string', 'max:255'],
            'avatar' => ['file'],
            'email' => ['required', 'email', 'max:255'],
            'password' => ['min:8', 'confirmed']
        ]);

        if(request('avatar'))
        {
            $inputs['avatar'] = request('avatar')->store('avatars');
        }

        $user->update($inputs);
        
        return back()->with('success', 'Zmiany w profilu zostały zapisane');
     }
}
