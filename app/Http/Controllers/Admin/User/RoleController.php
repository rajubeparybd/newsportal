<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        return view("admin.user.role.index", [
            "roles" => Role::with("permissions")->get(),
            "permissions" => Permission::select(["id", "name"])->get()
        ]);
    }

    public function store(Request $request)
    {
        if (!auth()->user()->hasPermissionTo("create_role")) {
            $notification = ["type" => "error", "message" => "Don't have permission!"];
            return redirect()->back()->with("notification", $notification);
        }
        $request->validate([
            "name" => ['required', 'string'],
            "description" => ['required', 'string'],
            "permissions" => ['required', 'array']
        ]);
        $role = Role::create([
            "name" => wordsToRole($request->name),
            "description" => $request->description,
        ]);

        $permission = $role->givePermissionTo($request->permissions);

        $notification = $permission
            ? ["type" => "success", "message" => "Role add successfully!"]
            : ["type" => "error", "message" => "Role add failed!"];
        return redirect()->back()->with("notification", $notification);
    }

    public function create()
    {
        return redirect()->route("admin.user.manager.roles.index");
    }

    public function show(Role $role)
    {
        return redirect()->route("admin.user.manager.roles.index");
    }

    public function edit(Role $role)
    {
        if (!auth()->user()->hasPermissionTo("edit_role") || $role->name == "admin") {
            $notification = ["type" => "error", "message" => "Don't have permission!"];
            return redirect()->back()->with("notification", $notification);
        }
        return view("admin.user.role.edit", [
            "role" => $role,
            "roleHasPermissions" => $role->permissions->pluck("id")->toArray(),
            "permissions" => Permission::all()
        ]);
    }

    public function update(Request $request, Role $role)
    {
        if (!auth()->user()->hasPermissionTo("edit_role") /*|| $role->name == "admin"*/) {
            $notification = ["type" => "error", "message" => "Don't have permission!"];
            return redirect()->back()->with("notification", $notification);
        }
        $request->validate([
            "name" => ['required', 'string'],
            "description" => ['required', 'string'],
            "permissions" => ['array']
        ]);
        $role->name = wordsToRole($request->name);
        $role->description = $request->description;
        $role_updated = $role->save();

        $permission = $role->syncPermissions($request->permissions);

        $notification = ($permission && $role_updated)
            ? ["type" => "success", "message" => "Role updated successfully!"]
            : ["type" => "error", "message" => "Role updated failed!"];
        return redirect()->route("admin.user.manager.roles.index")->with("notification", $notification);
    }

    public function destroy(Role $role)
    {
        if (!auth()->user()->hasPermissionTo("delete_role") || $role->name == "admin") {
            $notification = ["type" => "error", "message" => "Don't have permission!"];
            return redirect()->back()->with("notification", $notification);
        }
        $notification = $role->delete()
            ? ["type" => "success", "message" => "Role delete successfully!"]
            : ["type" => "error", "message" => "Role delete failed!"];
        return redirect()->back()->with("notification", $notification);
    }
}
