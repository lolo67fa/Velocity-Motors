@extends('layouts.app')

@section('content')
<div class="auth-page">
    <div class="auth-card">
        <div class="auth-left">
            <div class="brand">🚘 Velocity Motors</div>
            <h1>Welcome Back</h1>
            <p>Login to explore your premium car collection.</p>
        </div>

        <div class="auth-right">
            <h2>Login</h2>
            <p class="subtitle">Welcome back</p>

            @if ($errors->any())
                <div class="alert alert-danger small">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('login.submit') }}">
                @csrf

                <label>Email Address</label>
                <input type="email" name="email" placeholder="name@example.com" required autofocus>

                <label>Password</label>
                <input type="password" name="password" placeholder="********" required>

                <div class="auth-row">
                    <label class="remember">
                        <input type="checkbox" name="remember">
                        Remember me
                    </label>

                    <a href="#">Forgot password?</a>
                </div>

                <button type="submit">Sign In</button>

                <p class="switch">
                    Don't have an account?
                    <a href="{{ route('register') }}">Create account</a>
                </p>
            </form>
        </div>
    </div>
</div>

<style>
.auth-page{
    min-height:100vh;
    background:
        linear-gradient(rgba(9,19,45,.70), rgba(9,19,45,.70)),
        url('{{ asset("images/road.jpg") }}') center/cover no-repeat;
    display:flex;
    align-items:center;
    justify-content:center;
    padding:30px;
}
.auth-card{
    width:950px;
    min-height:560px;
    background:rgba(255,255,255,.96);
    border-radius:32px;
    overflow:hidden;
    display:grid;
    grid-template-columns:1fr 1fr;
    box-shadow:0 30px 80px rgba(0,0,0,.30);
}
.auth-left{
    background:linear-gradient(135deg,#0b1638,#1e40af);
    color:white;
    padding:55px;
    display:flex;
    flex-direction:column;
    justify-content:center;
}
.brand{
    font-size:24px;
    font-weight:800;
    margin-bottom:60px;
}
.auth-left h1{
    font-size:48px;
    font-weight:900;
}
.auth-left p{
    font-size:18px;
    color:#dbeafe;
}
.auth-right{
    padding:55px;
}
.auth-right h2{
    color:#0b1638;
    font-weight:900;
    text-align:center;
}
.subtitle{
    text-align:center;
    color:#64748b;
    margin-bottom:30px;
}
.auth-right label{
    font-weight:700;
    margin-bottom:8px;
}
.auth-right input[type="email"],
.auth-right input[type="password"]{
    width:100%;
    border:none;
    background:#eef4ff;
    padding:14px 18px;
    border-radius:14px;
    margin-bottom:18px;
    outline:none;
}
.auth-row{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:22px;
}
.auth-row a,
.switch a{
    text-decoration:none;
    font-weight:800;
    color:#2563eb;
}
.remember{
    display:flex;
    gap:8px;
    align-items:center;
    font-weight:500!important;
}
.remember input{
    margin:0;
}
button{
    width:100%;
    border:none;
    background:#0b1638;
    color:white;
    padding:15px;
    border-radius:16px;
    font-weight:900;
    font-size:17px;
    box-shadow:0 12px 25px rgba(11,22,56,.25);
}
.switch{
    text-align:center;
    margin-top:25px;
    color:#64748b;
}
@media(max-width:850px){
    .auth-card{grid-template-columns:1fr;}
    .auth-left{display:none;}
}
</style>
@endsection