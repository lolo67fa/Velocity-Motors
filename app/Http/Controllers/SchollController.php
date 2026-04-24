<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SchollController extends Controller
{
    public function StudentInfo($name, $age, $degree)
    {
        return "
            <h2>Student Information</h2>
            <p><strong>Name is:</strong> $name</p>
            <p><strong>Age is:</strong> $age Years</p>
            <p><strong>Degree is:</strong> $degree</p>
        ";
    }
}