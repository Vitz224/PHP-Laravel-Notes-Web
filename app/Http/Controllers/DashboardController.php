<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Note;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke(Request $request)
    {
        $role = $request->user()->role;
        if ($role === 'admin') {
            return view('admin.dashboard');
        }
        $latestNotes = $request->user()->notes()->latest()->take(5)->get();
        return view('user.dashboard', compact('latestNotes'));
    }
}
