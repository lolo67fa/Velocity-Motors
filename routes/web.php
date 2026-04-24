<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

use App\Http\Controllers\Ecommerce;
use App\Http\Controllers\DashboardController;

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::post('/login', function () {
    $credentials = request()->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    $remember = request()->has('remember');

    if (Auth::attempt($credentials, $remember)) {
        request()->session()->regenerate();
        return redirect('/');
    }

    return back()->withErrors([
        'email' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة',
    ]);
})->name('login.submit');

Route::get('/register', function () {
    return view('register');
})->name('register');

Route::post('/register', function () {
    $data = request()->validate([
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'email', 'unique:users,email'],
        'password' => ['required', 'min:6', 'confirmed'],
    ]);

    $user = User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'password' => Hash::make($data['password']),
    ]);

    Auth::login($user);

    return redirect('/');
})->name('register.submit');

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();

    return redirect('/login');
})->name('logout');
Route::get('/', [Ecommerce::class, 'List_Car']);
Route::get('/cars', [Ecommerce::class, 'List_Car']);
Route::get('/', function () {
    return view('land_page');
});

Route::get('/cars', [Ecommerce::class, 'List_Car']);
Route::get('/cars/{id}', [Ecommerce::class, 'Car_Details'])->name('cars.details');
Route::get('/sell-car', [Ecommerce::class, 'Sell_Car'])->name('sell.car');

Route::post('/sell-car', [Ecommerce::class, 'Store_Car'])->name('sell.car.store');