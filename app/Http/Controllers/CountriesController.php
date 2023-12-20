<?php

namespace App\Http\Controllers;

use App\Models\Country;
use Illuminate\Http\Request;


class CountriesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return "I am index page";

        $countries = Country::all();
        return view("countries.index",compact("countries"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("countries.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->all();

        
        // *use App\Models\Country;
        // Country::create([
        //     "name" => $request["name"],
        //     "capital" => $request["capital"],
        //     "currency" => $request["currency"],
        //     "content" => $request["content"],
        //     "user_id" => $request["user_id"],
        // ]);
        // return redirect(route("countries.index"));
        // *    columnname => formname
        // data successfully store in "countries" table

        // $country = new Country();
        // $country->name = $request["name"];
        // $country->capital = $request["capital"];
        // $country->currency = $request["currency"];
        // $country->content = $request["content"];
        // $country->user_id = $request["user_id"];
        // $country->save();
        // return redirect(route("countries.index"));


        Country::create($request->all());
        return redirect(route("countries.index"));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $country = Country::findOrFail($id);
        return view("countries.show",["country"=>$country]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $country = Country::findOrFail($id);
        return view("countries.edit")->with("country",$country);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        Country::findOrFail($id)->update([
            "name" => $request["name"],
            "capital" => $request["capital"],
            "currency" => $request["currency"],
            "content" => $request["content"],
            "user_id" => $request["user_id"],
        ]);

        return redirect(route("countries.index"));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $country = Country::findOrFail($id);
        $country->delete();
        // return redirect(route("countries.index")); 
        return redirect()->route("countries.index"); 
        
        // return redirect()->back();
    }
}
