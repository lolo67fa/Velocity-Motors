<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CarListing;

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

        $newCars = CarListing::latest()->get();

        foreach ($newCars as $newCar) {
            $mycar[] = [
                "id" => "db-" . $newCar->id,
                "name" => $newCar->car_name,
                "brand" => $newCar->brand,
                "price" => $newCar->price,
                "tax" => "15%",
                "status" => $newCar->status,
                "image" => $newCar->image ?? "images/default-car.jpg",
                "year" => $newCar->year,
                "color" => $newCar->color,
                "mileage" => $newCar->mileage,
                "seller_name" => $newCar->seller_name,
                "seller_phone" => $newCar->seller_phone,
                "seller_email" => $newCar->seller_email,
                "location" => $newCar->location,
            ];
        }

        return view('car', compact('mycar'));
    }

    public function Car_Details($id)
    {
        if (str_starts_with($id, 'db-')) {
            $dbId = str_replace('db-', '', $id);
            $newCar = CarListing::find($dbId);

            if (!$newCar) {
                abort(404);
            }

            $car = [
                "id" => "db-" . $newCar->id,
                "name" => $newCar->car_name,
                "brand" => $newCar->brand,
                "price" => $newCar->price,
                "tax" => "15%",
                "status" => $newCar->status,
                "image" => $newCar->image ?? "images/default-car.jpg",
                "year" => $newCar->year,
                "color" => $newCar->color,
                "mileage" => $newCar->mileage,
                "seller_name" => $newCar->seller_name,
                "seller_phone" => $newCar->seller_phone,
                "seller_email" => $newCar->seller_email,
                "location" => $newCar->location,
            ];

            return view('car_details', compact('car'));
        }

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
            'price' => 'required',
            'year' => 'required',
            'color' => 'required',
            'mileage' => 'required',
            'seller_name' => 'required',
            'seller_phone' => 'required',
            'seller_email' => 'required',
            'location' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png,webp|max:4096',
        ]);

        $imageName = time() . '.' . $request->image->extension();

        $request->image->move(public_path('uploads'), $imageName);

        CarListing::create([
            'car_name' => $request->car_name,
            'brand' => $request->brand,
            'price' => $request->price,
            'year' => $request->year,
            'color' => $request->color,
            'mileage' => $request->mileage,
            'seller_name' => $request->seller_name,
            'seller_phone' => $request->seller_phone,
            'seller_email' => $request->seller_email,
            'location' => $request->location,
            'status' => 'Available',
            'image' => 'uploads/' . $imageName,
        ]);

        return redirect('/cars')->with('success', 'Car added successfully!');
    }

    public function edit($id)
    {
        $car = CarListing::findOrFail($id);

        return view('edit_car', compact('car'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'car_name' => 'required',
            'brand' => 'required',
            'price' => 'required',
            'year' => 'required',
            'color' => 'required',
            'mileage' => 'required',
            'location' => 'required',
        ]);

        $car = CarListing::findOrFail($id);

        $car->car_name = $request->car_name;
        $car->brand = $request->brand;
        $car->price = $request->price;
        $car->year = $request->year;
        $car->color = $request->color;
        $car->mileage = $request->mileage;
        $car->location = $request->location;

        $car->save();

        return redirect('/cars')->with('success', 'Car updated successfully!');
    }

    public function destroy($id)
{
    $car = CarListing::findOrFail($id);

    $car->delete();

    return redirect('/cars')->with('success', 'Car deleted successfully!');
}
}