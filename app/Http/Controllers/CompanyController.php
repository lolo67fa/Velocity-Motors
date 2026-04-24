<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    // الطريقة الأولى (with)
    public function cmp()
    {
        return view('company')
            ->with('name', 'Google')
            ->with('age', 25);
    }

    // الطريقة الثانية (array)
    public function camps()
    {
        $data = [
            'name' => 'Microsoft',
            'age' => 50
        ];

        return view('company', $data);
    }
}