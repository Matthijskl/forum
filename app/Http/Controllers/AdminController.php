<?php

namespace App\Http\Controllers;

use App\Category;
use App\Http\Requests\AddRoleRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Http\Requests\ChangeUsernameRequest;
use App\Http\Requests\CreateCategoryRequest;
use App\Http\Requests\CreateSubCategoryRequest;
use App\Role;
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
        $users = User::orderBy('id', 'desc')
            ->with('roles')
            ->paginate();
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

    public function roleIndex()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function addRole(AddRoleRequest $request)
    {
        Role::create($request->all());
        \activity()->causedBy($request->user()->id)->log('Added a role: '. $request->name);
        Session::flash('notification', ['type' => 'success-message', 'message' => 'Succesvol een extra Role toegevoegd!!']);

        return redirect()->back();
    }

    public function deleteRole(Role $role)
    {
//        dd($role);
        $role->delete();
        \activity()->causedBy(Auth::id())->log('Delete the role: '. $role->name);
        Session::flash('notification', ['type' => 'success-message', 'message' => "De rol {$role->name} is verwijderd!"]);

        return redirect()->back();
    }

    public function categoryIndex()
    {
        $categories = Category::firstCategory()->get();
        return view('admin.categories.index', compact('categories'));
    }

    public function createCategory(CreateCategoryRequest $request)
    {
        Category::create([
            'name' => $request->name,
            'description' => $request->description
        ]);

        \activity()->causedBy(Auth::id())->log('Created the new category: '. $request->name);
        Session::flash('notification', ['type' => 'success-message', 'message' => "Succesvol de categorie {$request->name} aangemaakt!"]);

        return redirect()->back();
    }

    public function createSubCategory(CreateSubCategoryRequest $request)
    {
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'parent_id' => $request->parent_id
        ]);

        \activity()->causedBy(Auth::id())->log('Created the new sub-category: '. $request->name);
        Session::flash('notification', ['type' => 'success-message', 'message' => "Succesvol de sub-categorie {$request->name} aangemaakt!"]);

        return redirect()->back();
    }

    public function deleteCategory()
    {

    }
}
