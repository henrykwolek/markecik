<?php

namespace App\Http\Controllers;

use App\User;
use App\Post;
use Auth;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', [
            'users' => $users
        ]);
    }

    public function normaluserprofile(User $user, Post $post)
    {
        $posts = Post::orderBy('id', 'DESC')->where('user_id', $user->id)->paginate(9);
        return view('user-profile', [
            'user' => $user,
            'posts' => $posts
        ]);
    }

    public function show(User $user)
    {
        return view('admin.users.profile', [
            'user' => $user
        ]);
    }

    public function showNormalUser(User $user)
    {
        if(Auth::user()->id != $user->id)
        {
            return back();
        }
        else
        {
            return view('user-edit-profile', [
            'user' => $user
            ]);
        }
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
            'about' => [''],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'password' => ['min:8', 'confirmed']
        ]);

        if(request('avatar'))
        {
            $inputs['avatar'] = request('avatar')->store('images');
            $image = Image::make(public_path($inputs['avatar']))->fit(300, 300);
            $image->save();
        }

        $user->update($inputs);
        
        return back()->with('success', 'Zmiany w profilu zostały zapisane');
     }
}
