<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ChangeUsernameRequest;
use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.home.index', compact('users'));
    }

    public function userIndex()
    {
        $users = User::orderBy('id', 'desc')->paginate();
        return view('admin.users.index', compact('users'));
    }

    public function basic()
    {
        return view('admin.settings.password');
    }

    public function changePassword(ChangePasswordRequest $request)
    {
        Auth::user()->update([
            'password' => $request->password
        ]);

        \activity()->causedBy($request->user()->id)->log('Changed his password');
        Session::flash('notification', ['type' => 'success-message', 'message' => 'Succesvol jouw wachtwoord veranderd!']);

        return redirect()->back();
    }

    public function changeUsername(ChangeUsernameRequest $request)
    {
        Auth::user()->update([
            'name' => $request->username
        ]);

        \activity()->causedBy($request->user()->id)->log('Changed his name into '. $request->username);
        Session::flash('notification', ['type' => 'success-message', 'message' => 'Succesvol jouw gebruikersnaam veranderd!']);

        return redirect()->back();
    }

    public function changeEmail(Request $request)
    {
        Auth::user()->update([
            'email' => $request->email
        ]);

        \activity()->causedBy($request->user()->id)->log('Changed his email into '. $request->email);
        Session::flash('notification', ['type' => 'success-message', 'message' => 'Succesvol jouw email adres veranderd!']);

        return redirect()->back();
    }
}
