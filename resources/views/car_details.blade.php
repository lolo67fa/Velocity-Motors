@extends('layouts.app')

@section('content')
<div class="details-page">

    <div class="topbar">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="/" class="brand">🚘 Velocity Motors</a>
            <a href="/cars" class="back-btn">Back to Cars</a>
        </div>
    </div>

    <div class="container py-5">
        <div class="details-card">

            <div class="car-image-box">
                <img src="{{ asset($car['image']) }}" alt="{{ $car['name'] }}">
            </div>

            <div class="info-box">
                <span class="status">{{ $car['status'] }}</span>
                <h1>{{ $car['name'] }}</h1>
                <p class="brand-name">{{ $car['brand'] }}</p>

                <div class="info-grid">
                    <div>
                        <strong>Price</strong>
                        <span>{{ number_format($car['price']) }} SAR</span>
                    </div>

                    <div>
                        <strong>Tax</strong>
                        <span>{{ $car['tax'] }}</span>
                    </div>

                    <div>
                        <strong>Year</strong>
                        <span>{{ $car['year'] }}</span>
                    </div>

                    <div>
                        <strong>Color</strong>
                        <span>{{ $car['color'] }}</span>
                    </div>

                    <div>
                        <strong>Mileage</strong>
                        <span>{{ $car['mileage'] }}</span>
                    </div>

                    <div>
                        <strong>Location</strong>
                        <span>{{ $car['location'] }}</span>
                    </div>
                </div>

                <div class="seller-card">
                    <h3>Seller Information</h3>

                    <p><strong>Name:</strong> {{ $car['seller_name'] }}</p>
                    <p><strong>Phone:</strong> +{{ $car['seller_phone'] }}</p>
                    <p><strong>Email:</strong> {{ $car['seller_email'] }}</p>

                    <div class="seller-actions">
                        <a href="tel:+{{ $car['seller_phone'] }}" class="call-btn">Call Seller</a>
                        <a href="https://wa.me/{{ $car['seller_phone'] }}" target="_blank" class="whatsapp-btn">WhatsApp</a>
                        <a href="mailto:{{ $car['seller_email'] }}" class="email-btn">Email</a>
                    </div>
                </div>
            </div>

        </div>
    </div>

</div>

<style>
.details-page{
    min-height:100vh;
    background:
        linear-gradient(rgba(9,19,45,.75), rgba(9,19,45,.75)),
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
.details-card{
    background:rgba(255,255,255,.96);
    border-radius:32px;
    overflow:hidden;
    display:grid;
    grid-template-columns:1fr 1fr;
    box-shadow:0 30px 80px rgba(0,0,0,.35);
}
.car-image-box img{
    width:100%;
    height:100%;
    min-height:570px;
    object-fit:cover;
}
.info-box{
    padding:45px;
}
.status{
    background:#dcfce7;
    color:#166534;
    padding:8px 18px;
    border-radius:25px;
    font-weight:900;
    display:inline-block;
    margin-bottom:15px;
}
.info-box h1{
    color:#0b1638;
    font-size:44px;
    font-weight:900;
    margin-bottom:5px;
}
.brand-name{
    color:#64748b;
    font-size:20px;
    margin-bottom:30px;
}
.info-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:15px;
    margin-bottom:30px;
}
.info-grid div{
    background:#eef4ff;
    padding:18px;
    border-radius:18px;
}
.info-grid strong{
    display:block;
    color:#0b1638;
    margin-bottom:6px;
}
.info-grid span{
    color:#475569;
}
.seller-card{
    background:#0b1638;
    color:white;
    padding:25px;
    border-radius:24px;
}
.seller-card h3{
    font-weight:900;
    margin-bottom:18px;
}
.seller-card p{
    margin-bottom:8px;
}
.seller-actions{
    display:flex;
    gap:10px;
    flex-wrap:wrap;
    margin-top:18px;
}
.seller-actions a{
    text-decoration:none;
    padding:11px 18px;
    border-radius:14px;
    font-weight:900;
}
.call-btn{
    background:white;
    color:#0b1638;
}
.whatsapp-btn{
    background:#22c55e;
    color:white;
}
.email-btn{
    background:#2563eb;
    color:white;
}
@media(max-width:900px){
    .details-card{
        grid-template-columns:1fr;
    }
    .car-image-box img{
        min-height:320px;
    }
}
</style>
@endsection