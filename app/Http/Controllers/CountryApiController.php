<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryApiController extends Controller
{
    public function showCountry(){
       return Country::all();
    }
}
