<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Cookie;

class AdminController extends Controller
{
    /**
     * @return RedirectResponse
     */
    public function changeTheme()
    {
        if (Cookie::has("theme")) {
            if (Cookie::get("theme") == "dark")
                Cookie::queue("theme", "light", 86400);
            else
                Cookie::queue("theme", "dark", 86400);
        } else {
            Cookie::queue("theme", "dark", 86400);
        }
        return redirect()->back();
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function dashboard()
    {
        return view("admin.dashboard");
    }
}
