<?php

namespace App\Http\Controllers;

use App\Auction;
use Auth;
use Illuminate\Http\Request;

class AuctionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auctions = Auction::all();
        return view("auctions.index",[
            "auctions" => $auctions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("auctions.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $auction = new Auction();
        if($request->hasFile('photo')){
            $auction->photo = $request->photo->store("auction_image","public");
        }else{
            $auction->photo = "images/logojp.jpg";
        }

        $auction->title = $request->title;
        $auction->description = $request->description;
        
        if($request->fixbid==null){
            $auction->fixbid = 0;
        }else{
            $auction->fixbid = $request->fixbid;
        }

        if($request->finalsale==null){
            $auction->finalsale = 0;
        }else{
            $auction->finalsale = $request->finalsale;
        }
        
        $auction->condition = $request->condition;
        $auction->enddate = $request->enddate;
        $auction->endtime = $request->endtime;
        
        $auction->bids = '0';
        $auction->currentprice = '0';
        $auction->soldout = 'No';        

        $auction->user_id = Auth::user()->id;
        
        $auction->save();

        return redirect()-> route("shops.index");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function show(Auction $auction)
    {
        return view("auctions.show",[
            "auction" => $auction,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function edit(Auction $auction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auction $auction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Auction  $auction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auction $auction)
    {
        //
    }
}
