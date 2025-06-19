<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; // Pastikan model User sudah ada
use App\Models\History; // Pastikan model History sudah ada
use Illuminate\Support\Facades\Auth;

class UserDashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $histories = $user->histories; // asumsi relasi di model User sudah dibuat

        return view('dashboard', compact('histories'));
    }
}
