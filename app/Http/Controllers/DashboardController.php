<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $role = $request->user()->role;
        if ($role === 'admin') {
            return view('admin.dashboard');
        }
        return view('user.dashboard');
    }
}
