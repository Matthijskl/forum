<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\EditUserRequest;
use App\Mail\SendTestMail;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function edit(User $user)
    {
        $role = Role::all();
//        $categories = Category::where('user_id', $user->id)->paginate(10);
        return view('admin.users.edit', compact('user', 'role', 'categories'));
    }

    public function update(User $user, EditUserRequest $request)
    {
//        dd($request->all());

        $user->update([
           'name' => $request->name,
            'email' => $request->email,
        ]);


        $user->roles()->sync($request->role);
        \activity()->causedBy($request->user()->id)->log('Edited '.$user->name.'`s profile');
        Session::flash('notification', ['type' => 'success-message', 'message' => "Succesvol {$user->name} geupdate!"]);

        $email = new SendTestMail($user);

        Mail::to($user)->queue($email);
        return redirect()->back();
    }
}
