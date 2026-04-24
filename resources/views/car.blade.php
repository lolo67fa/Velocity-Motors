@extends('layouts.app')

@section('content')
<div class="cars-page">

    <div class="topbar">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="/" class="brand">🚘 Velocity Motors</a>
            <a href="/" class="back-btn">Back Home</a>
        </div>
    </div>

    <div class="container py-5">
        <div class="text-center mb-5">
            <span class="badge-title">Premium Collection</span>
            <h1 class="page-title">Available Cars</h1>
            <p class="page-subtitle">Explore our modern cars with clean details and trusted brands.</p>
        </div>

        <div class="row g-4">
            @foreach($mycar as $car)
                <div class="col-md-4">
                    <div class="car-card">
                        <img src="{{ asset($car['image']) }}" class="car-img" alt="{{ $car['name'] }}">

                        <div class="car-body">
                            <div class="d-flex justify-content-between align-items-center mb-2">
                                <h3>{{ $car['name'] }}</h3>
                                <span class="status">{{ $car['status'] }}</span>
                            </div>

                            <p><strong>Brand:</strong> {{ $car['brand'] }}</p>
                            <p><strong>Price:</strong> {{ number_format($car['price']) }} SAR</p>
                            <p><strong>Tax:</strong> {{ $car['tax'] }}</p>

                           <a href="{{ route('cars.details', $car['id']) }}" class="details-btn">
    View Details
</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>

<style>
.cars-page{
    min-height:100vh;
    background:
        linear-gradient(rgba(9,19,45,.70), rgba(9,19,45,.70)),
        url('{{ asset("images/road.jpg") }}') center/cover fixed no-repeat;
}
.topbar{
    background:#0b1638;
    padding:18px 0;
}
.brand{
    color:white;
    text-decoration:none;
    font-size:24px;
    font-weight:900;
}
.back-btn{
    color:#0b1638;
    background:white;
    padding:10px 22px;
    border-radius:14px;
    text-decoration:none;
    font-weight:800;
}
.badge-title{
    background:rgba(255,255,255,.95);
    color:#2563eb;
    padding:10px 24px;
    border-radius:30px;
    font-weight:800;
}
.page-title{
    color:white;
    font-size:52px;
    font-weight:900;
    margin-top:22px;
}
.page-subtitle{
    color:#dbeafe;
    font-size:18px;
}
.car-card{
    background:rgba(255,255,255,.96);
    border-radius:26px;
    overflow:hidden;
    box-shadow:0 25px 55px rgba(0,0,0,.25);
    transition:.3s;
}
.car-card:hover{
    transform:translateY(-8px);
}
.car-img{
    width:100%;
    height:240px;
    object-fit:cover;
    background:#e5e7eb;
}
.car-body{
    padding:25px;
}
.car-body h3{
    font-weight:900;
    color:#0b1638;
    margin:0;
}
.car-body p{
    color:#475569;
    margin-bottom:8px;
}
.status{
    background:#dcfce7;
    color:#166534;
    padding:6px 12px;
    border-radius:20px;
    font-size:13px;
    font-weight:800;
}
.details-btn{
    width:100%;
    margin-top:15px;
    border:none;
    background:#0b1638;
    color:white;
    padding:12px;
    border-radius:14px;
    font-weight:900;
    display:block;
    text-align:center;
    text-decoration:none;
}
</style>
@endsection