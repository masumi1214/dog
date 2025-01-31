<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DogDashboardController extends Controller
{
    public function index()
    {
        $dogProfile = request()->user()->dogProfile()->latest()->first();

        if (is_null($dogProfile)) {
            return view('dog-dashboard');  
        }

        return redirect()->route(
            'dog_profiles.show',
            $dogProfile->id
        );
    }
}