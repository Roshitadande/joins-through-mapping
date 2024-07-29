<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryApiController extends Controller
{
    public function showCountry(){
       return Country::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);

        $countries = Country::create($request->all());
        return response()->json($countries, 201);
    }
    public function update(Request $request, Country $countries)
    {
        $request->validate([
            'name'=>'required',
        ]);

        $countries->update($request->all());
        return response()->json($countries, 200);
    }
    public function destroy(Country $countries)
    {
        $countries->delete();
        return response()->json(null, 204);
    }
}
