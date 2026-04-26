@extends('layouts.app')

@section('content')

<div class="admin-wrapper">

    <aside class="sidebar">
        <div>
            <div class="logo">
                <span>🚘</span>
                <div>
                    <h2>Velocity</h2>
                    <p>Admin Console</p>
                </div>
            </div>

            <nav>
                <a class="active" href="/admin">Dashboard</a>
              <a href="/admin/cars">Car Listings</a>
                <a href="/sell-car">Add New Car</a>
                <a href="/">View Website</a>
            </nav>
        </div>

        <div class="admin-card">
            <p>Logged in as</p>
            <strong>{{ auth()->user()->name ?? 'Administrator' }}</strong>
        </div>
    </aside>

    <main class="main">

        <header class="top-header">
            <div>
                <h1>Dashboard</h1>
                <p>Manage car listings, sellers, and marketplace activity.</p>
            </div>

            <a href="/sell-car" class="add-btn">+ Add Car</a>
        </header>

        <section class="stats-grid">

            <div class="stat-card">
                <div class="stat-icon blue">🚗</div>
                <div>
                    <p>Total Listings</p>
                    <h2>{{ $totalCars }}</h2>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon green">✅</div>
                <div>
                    <p>Available Cars</p>
                    <h2>{{ $availableCars }}</h2>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon red">🏷️</div>
                <div>
                    <p>Sold Cars</p>
                    <h2>{{ $soldCars }}</h2>
                </div>
            </div>

            <div class="stat-card">
                <div class="stat-icon yellow">👥</div>
                <div>
                    <p>Users</p>
                    <h2>{{ $users }}</h2>
                </div>
            </div>

        </section>

        <section class="content-grid">

            <div class="panel large">
                <div class="panel-header">
                    <div>
                        <h3>Recent Car Listings</h3>
                        <p>Latest cars submitted to the marketplace</p>
                    </div>

                    <a href="/cars">View all</a>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th>Car</th>
                            <th>Seller</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th>Location</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse($latestCars as $car)
                            <tr>
                                <td>
                                    <strong>{{ $car->car_name }}</strong>
                                    <span>{{ $car->year }} • {{ $car->color }}</span>
                                </td>

                                <td>{{ $car->seller_name }}</td>

                                <td>{{ number_format($car->price) }} SAR</td>

                                <td>
                                    <span class="badge {{ $car->status == 'Sold' ? 'sold' : 'approved' }}">
                                        {{ $car->status }}
                                    </span>
                                </td>

                                <td>{{ $car->location }}</td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="empty-row">
                                    No submitted cars yet.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="panel small">
                <h3>Quick Actions</h3>

                <a href="/sell-car" class="action-card">
                    <span>➕</span>
                    <div>
                        <strong>Add Listing</strong>
                        <p>Create a new car advertisement</p>
                    </div>
                </a>

                <a href="/cars" class="action-card">
                    <span>🚘</span>
                    <div>
                        <strong>Browse Cars</strong>
                        <p>Review public car listings</p>
                    </div>
                </a>

                <a href="/" class="action-card">
                    <span>🌐</span>
                    <div>
                        <strong>Open Website</strong>
                        <p>Go to customer homepage</p>
                    </div>
                </a>

                <div class="tips-box">
                    <h4>Admin Tip</h4>
                    <p>Keep listings updated and review seller information before publishing cars.</p>
                </div>
            </div>

        </section>

    </main>

</div>

<style>
body{
    background:#eef2f7;
}

.admin-wrapper{
    min-height:100vh;
    display:flex;
    background:#eef2f7;
    font-family:Inter, Arial, sans-serif;
}

.sidebar{
    width:285px;
    background:#07152f;
    color:white;
    padding:28px;
    display:flex;
    flex-direction:column;
    justify-content:space-between;
}

.logo{
    display:flex;
    gap:14px;
    align-items:center;
    margin-bottom:40px;
}

.logo span{
    width:48px;
    height:48px;
    background:#15284f;
    display:flex;
    align-items:center;
    justify-content:center;
    border-radius:16px;
    font-size:24px;
}

.logo h2{
    margin:0;
    font-size:24px;
    font-weight:900;
}

.logo p{
    margin:0;
    color:#94a3b8;
    font-size:13px;
}

nav a{
    display:flex;
    align-items:center;
    color:#cbd5e1;
    text-decoration:none;
    padding:15px 18px;
    border-radius:14px;
    margin-bottom:10px;
    font-weight:700;
}

nav a:hover,
nav a.active{
    background:#1d4ed8;
    color:white;
}

.admin-card{
    background:#111f3d;
    padding:20px;
    border-radius:18px;
}

.admin-card p{
    margin:0;
    color:#94a3b8;
    font-size:13px;
}

.admin-card strong{
    font-size:17px;
}

.main{
    flex:1;
    padding:38px;
}

.top-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:30px;
}

.top-header h1{
    font-size:42px;
    font-weight:950;
    color:#0f172a;
    margin:0;
}

.top-header p{
    color:#64748b;
    margin-top:8px;
    font-size:17px;
}

.add-btn{
    background:#0f172a;
    color:white;
    text-decoration:none;
    padding:14px 24px;
    border-radius:16px;
    font-weight:900;
    box-shadow:0 12px 25px rgba(15,23,42,.18);
}

.stats-grid{
    display:grid;
    grid-template-columns:repeat(4,1fr);
    gap:20px;
    margin-bottom:28px;
}

.stat-card{
    background:white;
    padding:24px;
    border-radius:24px;
    display:flex;
    gap:18px;
    align-items:center;
    box-shadow:0 18px 40px rgba(15,23,42,.08);
}

.stat-icon{
    width:58px;
    height:58px;
    border-radius:18px;
    display:flex;
    align-items:center;
    justify-content:center;
    font-size:26px;
}

.blue{background:#dbeafe;}
.green{background:#dcfce7;}
.red{background:#fee2e2;}
.yellow{background:#fef3c7;}

.stat-card p{
    margin:0;
    color:#64748b;
    font-weight:800;
}

.stat-card h2{
    margin:4px 0 0;
    color:#0f172a;
    font-size:34px;
    font-weight:950;
}

.content-grid{
    display:grid;
    grid-template-columns:2fr 1fr;
    gap:24px;
}

.panel{
    background:white;
    border-radius:26px;
    padding:28px;
    box-shadow:0 18px 40px rgba(15,23,42,.08);
}

.panel-header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:22px;
}

.panel h3{
    margin:0;
    color:#0f172a;
    font-size:24px;
    font-weight:950;
}

.panel p{
    margin:6px 0 0;
    color:#64748b;
}

.panel-header a{
    color:#2563eb;
    text-decoration:none;
    font-weight:900;
}

table{
    width:100%;
    border-collapse:collapse;
}

th{
    text-align:left;
    color:#64748b;
    font-size:14px;
    padding-bottom:14px;
}

td{
    padding:18px 0;
    border-top:1px solid #e2e8f0;
    color:#334155;
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

.badge{
    display:inline-block;
    padding:7px 13px;
    border-radius:20px;
    font-size:13px;
    font-weight:900;
}

.approved{
    background:#dcfce7;
    color:#166534;
}

.sold{
    background:#fee2e2;
    color:#991b1b;
}

.empty-row{
    text-align:center;
    color:#64748b;
    padding:30px;
}

.action-card{
    display:flex;
    gap:15px;
    align-items:center;
    text-decoration:none;
    background:#f8fafc;
    padding:18px;
    border-radius:18px;
    margin-top:14px;
    border:1px solid #e2e8f0;
}

.action-card:hover{
    background:#eef4ff;
}

.action-card span{
    font-size:28px;
}

.action-card strong{
    color:#0f172a;
    font-weight:900;
}

.action-card p{
    margin:3px 0 0;
    color:#64748b;
    font-size:14px;
}

.tips-box{
    margin-top:20px;
    background:#0f172a;
    color:white;
    padding:22px;
    border-radius:20px;
}

.tips-box h4{
    margin:0;
    font-weight:900;
}

.tips-box p{
    color:#cbd5e1;
    margin-top:8px;
}

@media(max-width:1000px){
    .stats-grid,
    .content-grid{
        grid-template-columns:1fr;
    }

    .sidebar{
        display:none;
    }

    .top-header{
        flex-direction:column;
        align-items:flex-start;
        gap:15px;
    }
}
</style>

@endsection