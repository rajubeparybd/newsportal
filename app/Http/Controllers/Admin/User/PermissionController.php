<?php

namespace App\Http\Controllers\Admin\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermissionController extends Controller
{
    public function index()
    {
        return view("admin.user.permission.index", [
            "permissions" => Permission::orderByDesc("id")->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            "name" => ['required', 'string'],
            "description" => ['required', 'string']
        ]);
        $permission = Permission::create([
            "name" => wordsToPermission($request->name),
            "description" => $request->description,
        ]);

        $notification = $permission
            ? ["type" => "success", "message" => "Permission add successfully!"]
            : ["type" => "error", "message" => "Permission add failed!"];
        return redirect()->back()->with("notification", $notification);
    }

    public function create()
    {
        return redirect()->route("admin.user.manager.permissions.index");
    }

    public function show(Permission $permission)
    {
        return redirect()->route("admin.user.manager.permissions.index");
    }

    public function edit(Permission $permission)
    {
        if (!config("app.debug")) {
            return redirect()->route("admin.user.manager.permissions.index");
        }

        return view("admin.user.permission.edit", [
            "permission" => $permission,
        ]);
    }

    public function update(Request $request, Permission $permission)
    {
        if (!config("app.debug")) {
            return redirect()->route("admin.user.manager.permissions.index");
        }

        $request->validate([
            "name" => ['required', 'string'],
            "description" => ['required', 'string']
        ]);
        $permission->name = wordsToPermission($request->name);
        $permission->description = $request->description;
        $updated = $permission->save();

        $notification = $updated
            ? ["type" => "success", "message" => "Permission update successfully!"]
            : ["type" => "error", "message" => "Permission update failed!"];

        return redirect()->route("admin.user.manager.permissions.index")->with("notification", $notification);
    }

    public function destroy(Permission $permission)
    {
        if (!config("app.debug")) {
            return redirect()->route("admin.user.manager.permissions.index");
        }

        $notification = $permission->delete()
            ? ["type" => "success", "message" => "Permission delete successfully!"]
            : ["type" => "error", "message" => "Permission delete failed!"];
        return redirect()->back()->with("notification", $notification);
    }

}
