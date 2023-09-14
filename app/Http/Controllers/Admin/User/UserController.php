<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        return view("admin.user.index", [
            "users" => User::with("roles")->orderByDesc("id")->get(),
            "roles" => Role::orderBy("name")->get()
        ]);
    }

    public function store(Request $request)
    {
        if (!auth()->user()->hasPermissionTo("create_user")) {
            $notification = ["type" => "error", "message" => "Don't have permission!"];
            return redirect()->back()->with("notification", $notification);
        }
        $request->validate([
            "name" => ['required', 'string'],
            "email" => ['required', 'unique:users', 'email'],
            "password" => ['required', Password::defaults()],
            "role" => ['required', 'integer']
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($request->role && $request->role != 0) {
            $user->assignRole($request->role);
        }

        event(new Registered($user));

        $notification = $user
            ? ["type" => "success", "message" => "User add successfully!"]
            : ["type" => "error", "message" => "User add failed!"];
        return redirect()->back()->with("notification", $notification);
    }

    public function create()
    {
        return redirect()->route("admin.user.manager.users.index");
    }

    public function show(User $user)
    {
        return redirect()->route("admin.user.manager.users.index");
    }

    public function edit(User $user)
    {
    }

    public function update(Request $request, User $user)
    {
    }

    public function destroy(User $user)
    {
        if (!auth()->user()->hasPermissionTo("delete_role") || @$user->roles[0]->name == "admin") {
            $notification = ["type" => "error", "message" => "Don't have permission!"];
            return redirect()->back()->with("notification", $notification);
        }
        $notification = $user->delete()
            ? ["type" => "success", "message" => "User delete successfully!"]
            : ["type" => "error", "message" => "User delete failed!"];
        return redirect()->back()->with("notification", $notification);
    }
}
