<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;

class CountryController extends Controller
{
    public function index()
    {
        $countries = Country::all();
        return view('country.index', compact('countries'));
    }
    public function create()
    {
        return view('country.create');
    }

    public function edit($id)
    {
        $countries = Country::findOrFail($id);
        return view('country.edit', compact('countries'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:country,name,' . $id,
        ]);

        $country = Country::findOrFail($id);
        $country->name = $request->name;
        $country->save();

        return redirect()->route('country.index')
            ->with('success', 'Country updated successfully');
    }
    public function destroy($id)
    {
        $country = Country::findOrFail($id);
        $country->delete();

        return redirect()->route('country.index')
            ->with('success', 'Country deleted successfully');
    }
    public function trashedData()
    {
        $countries = Country::onlyTrashed()->get(); 
        return view('country.restore', compact('countries'));
    }
    public function restoreTrashData($id){
        $country = Country::withTrashed()->find($id);
        if ($country) {
            $country->restore(); 
            return redirect()->route('country.index')->with('success', 'Country restored successfully!');
        }
        return redirect()->route('country.restore')->with('error', 'Country not found!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:country,name',
        ]);

        Country::create($request->only('name'));

        return redirect()->route('country.index')
            ->with('success', 'country created successfully');
    }
}
