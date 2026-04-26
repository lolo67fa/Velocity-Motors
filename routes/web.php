<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;


use App\Http\Controllers\Ecommerce;
use App\Http\Controllers\DashboardController;

use App\Models\CarListing;


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

Route::get('/admin', function () {
    if (!auth()->check()) {
        return redirect('/login');
    }

    if (auth()->user()->email !== 'ghala2025s@gmail.com') { 
        abort(403, 'You are not allowed to access this page.');
    }

    $totalCars = CarListing::count() + 3;
    $availableCars = CarListing::where('status', 'Available')->count() + 2;
    $soldCars = CarListing::where('status', 'Sold')->count() + 1;
    $users = User::count();
    $latestCars = CarListing::latest()->take(5)->get();

    return view('admin.dashboard', compact(
        'totalCars',
        'availableCars',
        'soldCars',
        'users',
        'latestCars'
    ));
})->name('admin.dashboard');
Route::get('/admin/cars', function () {
    if (!auth()->check()) {
        return redirect('/login');
    }

    if (auth()->user()->email !== 'ghala2025s@gmail.com') {
        abort(403, 'You are not allowed to access this page.');
    }

    $cars = \App\Models\CarListing::latest()->get();

    return view('admin.cars', compact('cars'));
})->name('admin.cars');


Route::delete('/admin/cars/{id}', function ($id) {
    if (!auth()->check()) {
        return redirect('/login');
    }

    if (auth()->user()->email !== 'ghala2025s@gmail.com') {
        abort(403, 'You are not allowed to access this page.');
    }

    $car = \App\Models\CarListing::findOrFail($id);
    $car->delete();

    return redirect()->route('admin.cars')->with('success', 'Car deleted successfully.');
})->name('admin.cars.delete');


Route::post('/admin/cars/{id}/sold', function ($id) {
    if (!auth()->check()) {
        return redirect('/login');
    }

    if (auth()->user()->email !== 'ghala2025s@gmail.com') {
        abort(403, 'You are not allowed to access this page.');
    }

    $car = \App\Models\CarListing::findOrFail($id);
    $car->status = 'Sold';
    $car->save();

    return redirect()->route('admin.cars')->with('success', 'Car marked as sold.');
})->name('admin.cars.sold');

Route::get('/cars/{id}/edit', [Ecommerce::class, 'edit'])->name('cars.edit');

Route::put('/cars/{id}', [Ecommerce::class, 'update'])->name('cars.update');

Route::delete('/cars/{id}', [Ecommerce::class, 'destroy'])->name('cars.delete');

Route::get('/admin/dashboard', function () {
    if (!Auth::check()) {
        return redirect('/login');
    }

    if (Auth::user()->email !== 'ghala2025s@gmail.com') {
        return redirect('/')->with('error', 'You are not allowed to access the dashboard.');
    }

    return view('admin.dashboard');
})->name('admin.dashboard');