<?php

namespace App\Http\Controllers;

use App\City;
use App\Auction;
use App\Bank;
use DB;
use Auth;
use Illuminate\Http\Request;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function show(City $city)
    {
        $auction = Auction::where('id', $city->id)->first();

        DB::table('auctions')
        ->where('id', $city->id)
        ->update(['bids' => (($auction->bids)+1)]);

        DB::table('auctions')
        ->where('id', $city->id)
        ->update(['currentprice' => ($auction->finalsale)]);

        DB::table('auctions')
        ->where('id', $city->id)
        ->update(['soldout' => ("Yes")]);

        DB::table('auctions')
        ->where('id', $city->id)
        ->update(['customer_id' => (Auth::user()->id)]);
 
        $auctions = Auction::all();
        return redirect()-> route("customers.index",[
            "auctions" => $auctions,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function edit(City $city)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, City $city)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\City  $city
     * @return \Illuminate\Http\Response
     */
    public function destroy(City $city)
    {
        //
    }
}
