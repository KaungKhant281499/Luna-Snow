<?php

namespace App\Http\Controllers;


use App\Shop;
use App\District;
use App\City;
use App\Township;
use App\Auction;
use App\Bank;
use Auth;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ownauctions = Auction::where('user_id',Auth::user()->id)->where('soldout',"No")->get();
        $soldauctions = Auction::where('user_id',Auth::user()->id)->where('soldout',"Yes")->get();
        $auctions = Auction::all(); 
        
        return view ("shops.index",[
            "auctions" => $auctions,
            "ownauctions" => $ownauctions,
            "soldauctions" => $soldauctions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $townships = Township::orderBy('name')->get();
        $cities = City::orderBy('name')->get();
        $districts = District::orderBy('name')->get();
        
        return view ("shops.create",[
            "districts"=>$districts,
            "cities"=>$cities,
            "townships"=>$townships,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Assign Role
        $user = Auth::user();
        $user->assignRole("shop");

        //Customer Save
        $shop = new Shop();
        $shop->name = $request->name;

        if($request->hasFile('photo')){
            $shop->photo = $request->photo->store("account_images","public");
        }else{
            $shop->photo = "images/contents/logo.jpg";
        }

        $shop->address = $request->address;
        $shop->township_id = $request->township;
        $shop->user_id = Auth::user()->id;
        $shop->save();

        //Bank Save
        $bank = new Bank();
        $bank->cardno = $request->cardno;
        $bank->cvv = $request->cvv;
        $bank->exp = $request->accountexp;
        $bank->balance = 100000000;
        $bank->user_id = $user->id;
        $bank->type = $request->type;
        $bank->save();

        return redirect()-> route("shops.index")->with("notification","Congratulations, Your Account Registration Is Finished");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function show(Shop $shop)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function edit(Shop $shop)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shop $shop)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shop  $shop
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shop $shop)
    {
        //
    }
}
