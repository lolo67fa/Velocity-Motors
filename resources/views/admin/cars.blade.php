@extends('layouts.app')

@section('content')

<div class="admin-page">

    <div class="topbar">
        <div class="brand">
            🚘 Velocity Admin
        </div>

        <div class="links">
            <a href="/admin">Dashboard</a>
            <a href="/admin/cars" class="active">Car Listings</a>
            <a href="/sell-car">Add Car</a>
            <a href="/">Website</a>
        </div>
    </div>

    <div class="container-box">

        <div class="header">
            <div>
                <h1>Car Listings</h1>
                <p>Manage submitted cars, sellers, prices, and listing status.</p>
            </div>

            <a href="/sell-car" class="add-btn">+ Add New Car</a>
        </div>

        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <div class="table-card">
            <table>
                <thead>
                    <tr>
                        <th>Image</th>
                        <th>Car</th>
                        <th>Seller</th>
                        <th>Price</th>
                        <th>Status</th>
                        <th>Location</th>
                        <th>Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse($cars as $car)
                        <tr>
                            <td>
                                <img src="{{ asset($car->image ?? 'images/default-car.jpg') }}" class="car-img">
                            </td>

                            <td>
                                <strong>{{ $car->car_name }}</strong>
                                <span>{{ $car->brand }} • {{ $car->year }} • {{ $car->color }}</span>
                            </td>

                            <td>
                                <strong>{{ $car->seller_name }}</strong>
                                <span>{{ $car->seller_phone }}</span>
                            </td>

                            <td>{{ number_format($car->price) }} SAR</td>

                            <td>
                                <span class="status {{ $car->status == 'Sold' ? 'sold' : 'available' }}">
                                    {{ $car->status }}
                                </span>
                            </td>

                            <td>{{ $car->location }}</td>

                            <td>
                                <div class="actions">
                                    <a href="/cars/db-{{ $car->id }}" class="view">View</a>

                                    <form method="POST" action="{{ route('admin.cars.sold', $car->id) }}">
                                        @csrf
                                        <button type="submit" class="sold-btn">Sold</button>
                                    </form>

                                    <form method="POST" action="{{ route('admin.cars.delete', $car->id) }}" onsubmit="return confirm('Delete this car?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="delete-btn">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="empty">
                                No submitted cars yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>

</div>

<style>
body{
    background:#eef2f7;
}

.admin-page{
    min-height:100vh;
    background:#eef2f7;
    font-family:Arial, sans-serif;
}

.topbar{
    background:#07152f;
    padding:20px 45px;
    display:flex;
    justify-content:space-between;
    align-items:center;
}

.brand{
    color:white;
    font-size:26px;
    font-weight:900;
}

.links{
    display:flex;
    gap:12px;
}

.links a{
    color:white;
    text-decoration:none;
    padding:11px 18px;
    border-radius:12px;
    font-weight:800;
    background:rgba(255,255,255,.08);
}

.links a.active,
.links a:hover{
    background:#2563eb;
}

.container-box{
    padding:40px;
}

.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:25px;
}

.header h1{
    color:#0f172a;
    font-size:45px;
    font-weight:950;
    margin:0;
}

.header p{
    color:#64748b;
    margin-top:8px;
}

.add-btn{
    background:#0f172a;
    color:white;
    padding:14px 24px;
    border-radius:14px;
    text-decoration:none;
    font-weight:900;
}

.success{
    background:#dcfce7;
    color:#166534;
    padding:16px;
    border-radius:14px;
    margin-bottom:20px;
    font-weight:800;
}

.table-card{
    background:white;
    border-radius:26px;
    padding:25px;
    box-shadow:0 18px 40px rgba(15,23,42,.08);
    overflow-x:auto;
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    text-align:left;
    color:#64748b;
    padding:14px;
    border-bottom:1px solid #e2e8f0;
}

td{
    padding:16px 14px;
    border-bottom:1px solid #e2e8f0;
    color:#334155;
    vertical-align:middle;
}

td strong{
    display:block;
    color:#0f172a;
    font-weight:900;
}

td span{
    display:block;
    color:#64748b;
    font-size:14px;
}

.car-img{
    width:95px;
    height:65px;
    object-fit:cover;
    border-radius:12px;
}

.status{
    display:inline-block;
    padding:7px 13px;
    border-radius:20px;
    font-size:13px;
    font-weight:900;
}

.available{
    background:#dcfce7;
    color:#166534;
}

.sold{
    background:#fee2e2;
    color:#991b1b;
}

.actions{
    display:flex;
    gap:8px;
    flex-wrap:wrap;
}

.actions a,
.actions button{
    border:none;
    padding:9px 13px;
    border-radius:10px;
    font-weight:800;
    text-decoration:none;
    cursor:pointer;
    font-size:13px;
}

.view{
    background:#dbeafe;
    color:#1d4ed8;
}

.sold-btn{
    background:#fef3c7;
    color:#92400e;
}

.delete-btn{
    background:#fee2e2;
    color:#991b1b;
}

.empty{
    text-align:center;
    padding:35px;
    color:#64748b;
}
</style>

@endsection