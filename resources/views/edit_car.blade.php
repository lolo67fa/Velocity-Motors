<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Car</title>

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: linear-gradient(135deg, #0b1638, #6b7280);
            min-height: 100vh;
        }

        .navbar {
            background: #071333;
            color: white;
            padding: 18px 70px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
        }

        .nav-buttons a {
            text-decoration: none;
            background: #2563eb;
            color: white;
            padding: 10px 22px;
            border-radius: 6px;
            margin-left: 10px;
        }

        .container {
            width: 70%;
            margin: 70px auto;
            background: #f8fafc;
            padding: 45px;
            border-radius: 28px;
            box-shadow: 0 20px 50px rgba(0,0,0,0.25);
        }

        h1 {
            text-align: center;
            font-size: 40px;
            color: #111827;
            margin-bottom: 10px;
        }

        .subtitle {
            text-align: center;
            color: #6b7280;
            margin-bottom: 35px;
            font-size: 18px;
        }

        .form-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 22px;
        }

        .form-group {
            display: flex;
            flex-direction: column;
        }

        label {
            font-weight: bold;
            margin-bottom: 8px;
            color: #111827;
        }

        input {
            padding: 14px;
            border: 1px solid #d1d5db;
            border-radius: 12px;
            font-size: 16px;
            outline: none;
        }

        input:focus {
            border-color: #2563eb;
        }

        .actions {
            margin-top: 35px;
            display: flex;
            justify-content: center;
            gap: 15px;
        }

        .btn-update {
            border: none;
            background: #16a34a;
            color: white;
            padding: 14px 35px;
            border-radius: 12px;
            font-size: 17px;
            font-weight: bold;
            cursor: pointer;
        }

        .btn-back {
            text-decoration: none;
            background: #111827;
            color: white;
            padding: 14px 35px;
            border-radius: 12px;
            font-size: 17px;
            font-weight: bold;
        }

        .success {
            background: #dcfce7;
            color: #166534;
            padding: 12px;
            border-radius: 10px;
            margin-bottom: 20px;
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <div class="navbar">
        <div class="logo">🚗 Car Store</div>

        <div class="nav-buttons">
            <a href="/">Home</a>
            <a href="/cars">View Cars</a>
        </div>
    </div>

    <div class="container">
        <h1>Edit Car</h1>
        <p class="subtitle">Update your car information easily</p>

        @if(session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('cars.update', $car->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-grid">

                <div class="form-group">
                    <label>Car Name</label>
                    <input type="text" name="car_name" value="{{ $car->car_name }}" required>
                </div>

                <div class="form-group">
                    <label>Brand</label>
                    <input type="text" name="brand" value="{{ $car->brand }}" required>
                </div>

                <div class="form-group">
                    <label>Price</label>
                    <input type="number" name="price" value="{{ $car->price }}" required>
                </div>

                <div class="form-group">
                    <label>Year</label>
                    <input type="text" name="year" value="{{ $car->year }}" required>
                </div>

                <div class="form-group">
                    <label>Color</label>
                    <input type="text" name="color" value="{{ $car->color }}" required>
                </div>

                <div class="form-group">
                    <label>Mileage</label>
                    <input type="text" name="mileage" value="{{ $car->mileage }}" required>
                </div>

                <div class="form-group">
                    <label>Location</label>
                    <input type="text" name="location" value="{{ $car->location }}" required>
                </div>
<div class="actions">

    <button type="submit" class="btn-update">
        Update Car
    </button>

</form>

<form action="{{ route('cars.delete', $car->id) }}" method="POST"
      onsubmit="return confirm('Are you sure you want to delete this car?');">

    @csrf
    @method('DELETE')

    <button type="submit"
        style="
        border:none;
        background:#dc2626;
        color:white;
        padding:14px 35px;
        border-radius:12px;
        font-size:17px;
        font-weight:bold;
        cursor:pointer;">
        Delete Car
    </button>
</form>

<a href="/cars" class="btn-back">Back to Cars</a>

</div>
        </form>
    </div>

</body>
</html>