<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Township;
use App\City;
use App\District;
use App\Auction;
use App\User;
use Illuminate\Http\Request;
use DB;
use Auth;

class BankController extends Controller
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
        
        $adminmsc = Bank::where('id', 1)->first();
        $adminvsc = Bank::where('id', 2)->first();
        $adminppc = Bank::where('id', 3)->first();
        $adminjcb = Bank::where('id', 4)->first();

        $sellerbank = Bank::where('user_id', Auth::user()->id)->first();
        $buyerbank = Bank::where('user_id', $request->customerid)->first();

        $sellercardtype = $sellerbank->type;
        $buyercardtype =$buyerbank->type;

        $collectmoney = (93*($request->price))/100;

        //Collect Money From Buyer
        if($buyercardtype=="MSC"){
            DB::table('banks')
            ->where('id', 1)
            ->update(['balance' => (($adminmsc->balance)+($request->price))]);
        }else if($buyercardtype=="VSC"){
            DB::table('banks')
            ->where('id', 2)
            ->update(['balance' => (($adminvsc->balance)+($request->price))]);
        }else if($buyercardtype=="PPC"){
            DB::table('banks')
            ->where('id', 3)
            ->update(['balance' => (($adminppc->balance)+($request->price))]);
        }else{
            DB::table('banks')
            ->where('id', 4)
            ->update(['balance' => (($adminjcb->balance)+($request->price))]);
        }

        //Transfer Money To Seller
        if($sellercardtype=="MSC"){
            DB::table('banks')
            ->where('id', 1)
            ->update(['balance' => (($adminmsc->balance)-$collectmoney)]);
        }else if($sellercardtype=="VSC"){
            DB::table('banks')
            ->where('id', 2)
            ->update(['balance' => (($adminvsc->balance)-$collectmoney)]);
        }else if($sellercardtype=="PPC"){
            DB::table('banks')
            ->where('id', 3)
            ->update(['balance' => (($adminppc->balance)-$collectmoney)]);
        }else{
            DB::table('banks')
            ->where('id', 4)
            ->update(['balance' => (($adminjcb->balance)-$collectmoney)]);
        }

        //Add Money To Seller
        DB::table('banks')
        ->where('user_id', Auth::user()->id)
        ->update(['balance' => (($sellerbank->balance)+$collectmoney)]);

        //Reduce Money From Buyer
        DB::table('banks')
        ->where('user_id', $request->customerid)
        ->update(['balance' => (($sellerbank->balance)-($request->price))]);

        $ownauctions = Auction::where('user_id',Auth::user()->id)->where('soldout',"No")->get(); 
        $soldauctions = Auction::where('user_id',Auth::user()->id)->where('soldout',"Yes")->get();
           
        return view("shops.index",[
            "ownauctions" => $ownauctions,
            "soldauctions" => $soldauctions,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Bank $bank)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Bank  $bank
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        //
    }
}
