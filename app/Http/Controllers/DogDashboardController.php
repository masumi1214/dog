<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DogDashboardController extends Controller
{
    public function index()
    {
        return view('dog-dashboard');
    }
}