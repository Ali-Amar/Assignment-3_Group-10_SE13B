<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        if (User::isCurrentUserAdmin()) {
            return redirect()->route('admin.dashboard');
        }
        return view('dashboard');
    }
}