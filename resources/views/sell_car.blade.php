@extends('layouts.app')

@section('content')
<div class="sell-page">

    <div class="topbar">
        <div class="container d-flex justify-content-between align-items-center">
            <a href="/" class="brand">🚘 Velocity Motors</a>
            <a href="/" class="back-btn">Back Home</a>
        </div>
    </div>

    <div class="container py-5">
        <div class="sell-card">

            <div class="text-center mb-4">
                <span class="badge-title">Sell Your Car</span>
                <h1>List Your Car For Sale</h1>
                <p>Fill in your car details, seller information, and upload a car image.</p>
            </div>

            @if(session('success'))
                <div class="alert alert-success text-center fw-bold">
                    {{ session('success') }}
                </div>
            @endif

            @if ($errors->any())
                <div class="alert alert-danger">
                    @foreach ($errors->all() as $error)
                        <div>{{ $error }}</div>
                    @endforeach
                </div>
            @endif

            <form method="POST" action="{{ route('sell.car.store') }}" enctype="multipart/form-data">
                @csrf

                <h3>Car Information</h3>

                <div class="form-grid">
                    <div>
                        <label>Car Name</label>
                        <input type="text" name="car_name" placeholder="BMW X5" value="{{ old('car_name') }}" required>
                    </div>

                    <div>
                        <label>Brand</label>
                        <input type="text" name="brand" placeholder="BMW" value="{{ old('brand') }}" required>
                    </div>

                    <div>
                        <label>Year</label>
                        <input type="text" name="year" placeholder="2024" value="{{ old('year') }}" required>
                    </div>

                    <div>
                        <label>Price</label>
                        <input type="number" name="price" placeholder="150000" value="{{ old('price') }}" required>
                    </div>

                    <div>
                        <label>Color</label>
                        <input type="text" name="color" placeholder="Black" value="{{ old('color') }}" required>
                    </div>

                    <div>
                        <label>Mileage</label>
                        <input type="text" name="mileage" placeholder="20,000 KM" value="{{ old('mileage') }}" required>
                    </div>

                    <div class="full-width">
                        <label>Car Image</label>
                        <input type="file" name="image" accept="image/*" required>
                        <small>Accepted formats: JPG, PNG, WEBP. Max size: 4MB.</small>
                    </div>
                </div>

                <h3 class="mt-4">Seller Information</h3>

                <div class="form-grid">
                    <div>
                        <label>Seller Name</label>
                        <input type="text" name="seller_name" placeholder="Seller full name" value="{{ old('seller_name') }}" required>
                    </div>

                    <div>
                        <label>Phone Number</label>
                        <input type="text" name="seller_phone" placeholder="9665xxxxxxxx" value="{{ old('seller_phone') }}" required>
                    </div>

                    <div>
                        <label>Email</label>
                        <input type="email" name="seller_email" placeholder="seller@example.com" value="{{ old('seller_email') }}" required>
                    </div>

                    <div>
                        <label>Location</label>
                        <input type="text" name="location" placeholder="Riyadh, Saudi Arabia" value="{{ old('location') }}" required>
                    </div>
                </div>

                <button type="submit">Submit Car</button>
            </form>

        </div>
    </div>
</div>

<style>
.sell-page{
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

.sell-card{
    max-width:1000px;
    margin:auto;
    background:rgba(255,255,255,.96);
    padding:45px;
    border-radius:32px;
    box-shadow:0 30px 80px rgba(0,0,0,.35);
}

.badge-title{
    background:#eef4ff;
    color:#2563eb;
    padding:10px 24px;
    border-radius:30px;
    font-weight:900;
}

.sell-card h1{
    color:#0b1638;
    font-size:45px;
    font-weight:900;
    margin-top:20px;
}

.sell-card p{
    color:#64748b;
}

.sell-card h3{
    color:#0b1638;
    font-weight:900;
}

.form-grid{
    display:grid;
    grid-template-columns:1fr 1fr;
    gap:20px;
}

.full-width{
    grid-column:1 / -1;
}

label{
    display:block;
    font-weight:800;
    color:#0b1638;
    margin-bottom:8px;
}

input{
    width:100%;
    border:none;
    background:#eef4ff;
    padding:14px 18px;
    border-radius:14px;
    outline:none;
}

input[type="file"]{
    background:white;
    border:2px dashed #c7d2fe;
    cursor:pointer;
}

small{
    display:block;
    margin-top:8px;
    color:#64748b;
}

button{
    width:100%;
    margin-top:30px;
    border:none;
    background:#0b1638;
    color:white;
    padding:16px;
    border-radius:16px;
    font-weight:900;
    font-size:18px;
}

button:hover{
    background:#13245a;
}

@media(max-width:800px){
    .form-grid{
        grid-template-columns:1fr;
    }

    .sell-card{
        padding:30px;
    }

    .sell-card h1{
        font-size:34px;
    }
}
</style>
@endsection