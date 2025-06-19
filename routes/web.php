<?php

use App\Http\Controllers\LevelController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\GoogleController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ChooseRoleController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\SuperadminController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [UserDashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['web'])->group(function () {
    Route::get('/auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('/auth/google/callback', [GoogleController::class, 'handleGoogleCallback'])->name('google.callback');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/question-lists', [LevelController::class, 'index'])->name('question.lists');

Route::get('/question/{level:slug}/{subject:slug}', [SubjectController::class, 'index']);

Route::get('/cek-role', function () {
    $user = auth()->user();
    if (!$user) {
        return response()->json(['message' => 'Belum login']);
    }
    return response()->json([
        'name' => $user->name,
        'roles' => $user->getRoleNames(), // gunakan Spatie!
    ]);
})->middleware('auth');

Route::post('/histories', [HistoryController::class, 'store']);

// Choose Role
Route::middleware('auth', 'has_role')->group(function () {
    Route::get('/choose-role', [ChooseRoleController::class, 'index'])->name('choose.role');
    Route::post('/choose-role', [ChooseRoleController::class, 'store'])->name('choose.role.store');
});


// Dashboard
Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard/admin', function () {
        return view('dashboard.dashboard');
    })->middleware(['role_selected.permission:Dashboard Access'])
      ->name('dashboard.admin');

    Route::view('dashboard/user', 'dashboard.user.index')
        ->middleware('role_selected.permission:User Access')
        ->name('dashboard.user.index');

    Route::view('dashboard/role', 'dashboard.role.index')
        ->middleware('role_selected.permission:Role Access')
        ->name('dashboard.role.index');

    Route::view('dashboard/permission', 'dashboard.permission.index')
        ->middleware('role_selected.permission:Permission Access')
        ->name('dashboard.permission.index');

    Route::view('dashboard/level', 'dashboard.level.index')
        ->middleware('role_selected.permission:Level Access')
        ->name('dashboard.level.index');

    Route::view('dashboard/subject', 'dashboard.subject.index')
        ->middleware('role_selected.permission:Subject Access')
        ->name('dashboard.subject.index');

    Route::view('dashboard/category', 'dashboard.category.index')
        ->middleware('role_selected.permission:Category Access')
        ->name('dashboard.category.index');

    Route::view('dashboard/question', 'dashboard.question.index')
        ->middleware('role_selected.permission:Question Access')
        ->name('dashboard.question.index');
});

require __DIR__.'/auth.php';
