
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\DepartmentController;
use App\Models\Employee;
use App\Models\Department;

// Halaman login hanya untuk pengguna yang belum login
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.process');
});

// Halaman yang harus dibuka setelah login
Route::middleware('auth')->group(function () {

    Route::get('/', function () {
        $totalEmployees = Employee::count();
        $totalDepartments = Department::count();

        $latestEmployees = Employee::with('department')
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalEmployees',
            'totalDepartments',
            'latestEmployees'
        ));
    })->name('dashboard');

    Route::resource('departments', DepartmentController::class);
    Route::resource('employees', EmployeeController::class);

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});
