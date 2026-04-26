@extends('layouts.app')

@section('content')

<style>
.hero-section{
    min-height:100vh;
    background: linear-gradient(rgba(8,18,50,.65), rgba(8,18,50,.65)),
    url('{{ asset("images/road.jpg") }}') center center/cover no-repeat;
}

.glass-box{
    background: rgba(255,255,255,.95);
    border-radius:30px;
    padding:60px 40px;
    box-shadow:0 20px 60px rgba(0,0,0,.15);
}

.brand-btn{
    border:none;
    padding:14px 35px;
    border-radius:16px;
    color:#fff;
    font-weight:700;
    text-decoration:none;
    display:inline-block;
    transition:.3s;
}

.brand-btn:hover{
    transform:translateY(-3px);
    color:#fff;
}

.topbar{
    background:#08163a;
}

.topbar a{
    text-decoration:none;
}
</style>

<div class="hero-section">
<!-- Navbar -->
<div class="topbar py-3 px-4">
    <div class="container d-flex justify-content-between align-items-center">

        <h3 class="text-white m-0 fw-bold">
            🚘 Car Store
        </h3>

        <div class="d-flex align-items-center gap-2">

            <a href="{{ route('admin.dashboard') }}" class="btn btn-warning btn-sm px-4 fw-bold">
                Dashboard
            </a>

            @auth
                <form method="POST" action="{{ route('logout') }}" class="d-inline m-0">
                    @csrf
                    <button class="btn btn-danger btn-sm px-4">
                        Logout
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}" class="btn btn-light btn-sm px-4">
                    Login
                </a>

                <a href="{{ route('register') }}" class="btn btn-primary btn-sm px-4">
                    Register
                </a>
            @endauth

        </div>

    </div>
</div>

    <!-- Hero -->
    <div class="container d-flex justify-content-center align-items-center" style="min-height:85vh;">

        <div class="glass-box text-center w-100">

            <span class="badge bg-light text-primary px-4 py-2 rounded-pill mb-4 fs-6">
                ✨ Premium Car Collection
            </span>

            <h1 class="fw-bold display-3 text-dark mb-4">
                Find the right car for your next drive
            </h1>

            <p class="text-secondary fs-4 mb-5">
                Explore modern cars from trusted brands and browse in a simple elegant interface.
            </p>

            <div class="d-flex flex-wrap justify-content-center gap-3">
                <a href="{{ route('sell.car') }}" class="brand-btn" style="background:#8b5cf6;">
    Sell Your Car
</a>

                <a href="/cars" class="brand-btn" style="background:#ef4444;">
                    Toyota
                </a>

                <a href="/cars" class="brand-btn" style="background:#0b1638;">
                    Kia
                </a>

                <a href="/cars" class="brand-btn" style="background:#2563eb;">
                    Hyundai
                </a>

                <a href="/cars" class="brand-btn" style="background:#eab308; color:#111;">
                    Mazda
                </a>

                <a href="/cars" class="brand-btn" style="background:#10b981;">
                    View All Cars
                </a>

            </div>

        </div>

    </div>
<!-- Contact Footer -->
<div style="
margin-top:40px;
padding:35px;
background:rgba(255,255,255,0.08);
border-radius:24px;
text-align:center;
backdrop-filter: blur(10px);
">

    <h3 style="
    color:white;
    font-size:32px;
    font-weight:900;
    margin-bottom:15px;
    ">
        Contact Seller
    </h3>

    <p style="
    color:#dbeafe;
    font-size:18px;
    margin-bottom:10px;
    ">
        📧 Email: 
        <a href="mailto:lolo67fas@gmail.com"
        style="color:#60a5fa; text-decoration:none; font-weight:700;">
            lolo67fas@gmail.com
        </a>
    </p>

    <p style="
    color:#dbeafe;
    font-size:18px;
    margin-bottom:0;
    ">
        📞 Phone:
        <a href="tel:+966500678118"
        style="color:#22c55e; text-decoration:none; font-weight:700;">
            +966500678118
        </a>
    </p>

</div>
</div>

@endsection