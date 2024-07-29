<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryApiController extends Controller
{
    public function showCountry(){
       return Country::all();
    }
    public function singleData($id){
        $country=Country::find($id);
        return response()->json($country, 200);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);

        $countries = Country::create($request->all());
        return response()->json($countries, 201);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:country,name,' . $id,
        ]);

        $country = Country::findOrFail($id);
        $country->name = $request->name;
        $country->save();
        return response()->json($country, 200);
    }
    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
        return response()->json(null, 204);
    }
}
