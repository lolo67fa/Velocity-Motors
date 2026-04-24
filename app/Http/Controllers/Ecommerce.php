<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Ecommerce extends Controller
{
    private function cars()
    {
        return [
            [
                "id" => 1,
                "name" => "BMW X5",
                "brand" => "BMW",
                "price" => 300000,
                "tax" => "15%",
                "status" => "Available",
                "image" => "images/2023-bmw-.jpg",
                "year" => "2023",
                "color" => "Gray",
                "mileage" => "18,000 KM",
                "seller_name" => "Omar Alharbi",
                "seller_phone" => "966501234567",
                "seller_email" => "omar.cars@example.com",
                "location" => "Riyadh, Saudi Arabia"
            ],
            [
                "id" => 2,
                "name" => "Mercedes C200",
                "brand" => "Mercedes",
                "price" => 250000,
                "tax" => "15%",
                "status" => "Sold",
                "image" => "images/merc.webp",
                "year" => "2022",
                "color" => "White",
                "mileage" => "25,500 KM",
                "seller_name" => "Faisal Alotaibi",
                "seller_phone" => "966502222333",
                "seller_email" => "faisal.motors@example.com",
                "location" => "Jeddah, Saudi Arabia"
            ],
            [
                "id" => 3,
                "name" => "Toyota Camry",
                "brand" => "Toyota",
                "price" => 120000,
                "tax" => "15%",
                "status" => "Available",
                "image" => "images/toyota.webp",
                "year" => "2024",
                "color" => "Blue",
                "mileage" => "9,000 KM",
                "seller_name" => "Nasser Alqahtani",
                "seller_phone" => "966509876543",
                "seller_email" => "nasser.auto@example.com",
                "location" => "Madinah, Saudi Arabia"
            ]
        ];
    }

    public function List_Car()
    {
        $mycar = $this->cars();
        return view('car', compact('mycar'));
    }

    public function Car_Details($id)
    {
        $cars = $this->cars();

        $car = collect($cars)->firstWhere('id', (int) $id);

        if (!$car) {
            abort(404);
        }

        return view('car_details', compact('car'));
    }
    public function Sell_Car()
{
    return view('sell_car');
}

public function Store_Car(Request $request)
{
    $request->validate([
        'car_name' => 'required',
        'brand' => 'required',
        'year' => 'required',
        'price' => 'required',
        'color' => 'required',
        'mileage' => 'required',
        'seller_name' => 'required',
        'seller_phone' => 'required',
        'seller_email' => 'required|email',
        'location' => 'required',
    ]);

    return redirect()->route('sell.car')->with('success', 'Your car has been submitted successfully!');
}
}