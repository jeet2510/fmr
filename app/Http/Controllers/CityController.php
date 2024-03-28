<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

// namespace App\Controllers;


class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cities = City::all();
        return view('cities.index', compact('cities'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'country' => 'required',
            'city_name' => 'required',
          ]);
          City::create($request->all());
          return redirect()->route('cities.index')
            ->with('success', 'Post created successfully.');
    }

    /**
     * Display the specified resource.
     */
    // public function show(string $id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'country' => 'required',
            'city_name' => 'required',
          ]);
          $city = City::find($id);
          $city->update($request->all());
          return redirect()->route('cities.index')
            ->with('success', 'Post updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $city = City::find($id);
    $city->delete();
    return redirect()->route('cities.index')
      ->with('success', 'Post deleted successfully');
    }

    public function create()
    {
      return view('cities.create');
    }

    public function show($id)
    {
      $city = City::find($id);
      return view('cities.show', compact('city'));
    }
}
