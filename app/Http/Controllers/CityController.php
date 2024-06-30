<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\State;

class CityController extends Controller
{    public function index()
    {
        $cities= City::all();
        
        return view('city.index', compact('cities'));
    }
    public function create()
    {
        $states=State::all();
        return view('city.create',compact('states'));
    }

    public function edit($id)
    {
        $cities = City::findOrFail($id);
        $states = State::pluck('name', 'id');
        return view('city.edit', compact('cities','states'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|unique:city,name,' . $id,
            'state_id'=>'required|exists:state,id',
        ]);

        $city =City::findOrFail($id);
        $city->name = $request->name;
        $city->state_id = $request->state_id;
        $city->save();

        return redirect()->route('city.index')
            ->with('success', 'City updated successfully');
    }
    public function destroy($id)
    {
        $city = City::findOrFail($id);
        $city->delete();

        return redirect()->route('city.index')
            ->with('success', 'City deleted successfully');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:city,name',
            'state_id'=>'required|exists:state,id',
        ]);

        City::create($request->all());

        return redirect()->route('city.index')
            ->with('success', 'city created successfully');
    }
}
