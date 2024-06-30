<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\Country;

class StateController extends Controller
{
    public function index()
    {
        $states = State::all();
        
        return view('state.index', compact('states'));
    }
    public function create()
    {
        $countries=Country::all();
        return view('state.create',compact('countries'));
    }

    public function edit($id)
    {
        $states = State::findOrFail($id);
        $countries = Country::pluck('name', 'id');
        return view('state.edit', compact('states','countries'));
    }

    public function update(Request $request, $id)
    {

        $states=$request->validate([
            'name' => 'required|unique:state,name,' . $id,
            'country_id'=>'required|exists:country,id',
        ]);

        $state =State::findOrFail($id);
        $state->name = $request->name;
        $state->country_id = $request->country_id;
        $state->save();

        return redirect()->route('state.index')
            ->with('success', 'State updated successfully');
    }
    public function destroy($id)
    {
        $state = State::findOrFail($id);
        $state->delete();

        return redirect()->route('state.index')
            ->with('success', 'State deleted successfully');
    }

   
    public function storeState(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:state,name',
            'country_id' => 'required|exists:country,id',
        ]);

        State::create($request->all());

        return redirect()->route('state.index')
                         ->with('success', 'State created successfully');
    }
    
}
