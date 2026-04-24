<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DeptController extends Controller
{
    public function my_depts()
    {
        $dept1 = "IT";
        $dept2 = "HR";
        $dept3 = "Finance";
        $dept4 = "Marketing";

        return view('depts', compact('dept1', 'dept2', 'dept3', 'dept4'));
    }
}