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
        $user = Auth::user();
        $histories = $user->histories;  // Ambil semua riwayat yang terkait dengan user yang sedang login

        return view('dashboard', compact('histories'));
    }
}
