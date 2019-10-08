<?php

namespace App\Http\Controllers;
use App\Township;
use App\City;
use App\District;
use App\Auction;
use App\User;
use Illuminate\Http\Request;
use DB;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function dashboard()
    {
        $ownauctions = Auction::where('user_id',Auth::user()->id)->where('soldout',"No")->get(); 
        $soldauctions = Auction::where('user_id',Auth::user()->id)->where('soldout',"Yes")->get();
        $auctions = Auction::all(); 


        $user = User::where('id',Auth::user()->id)->first();        

        if($user->hasRole('shop')){
            return view("shops.index",[
                "ownauctions" => $ownauctions,
                "soldauctions" => $soldauctions,
            ]);
        }else if($user->hasRole('customer')){            
            return view("customers.index",[
                "auctions" => $auctions,
            ]);
        }else{
            return view("dashboard");
        }
    }

    public function setup()
    {
        return view('setup');
    }

    public function index()
    {
        
        if (!Auth::guest()){
            return redirect()->route('welcome');
        }

        return view('welcome');
    }

    public function selectTownship(Request $request){
        $township=Township::where('id',$request->township)->first();        
        $city = $township->city;
        $state = $city->state;
        return response()->json([
            'success',
            'city' => $city,
            'state' => $state
        ]);
    }

    public function normalBid(Request $request){
        $auction = Auction::where('id', $request->postid)->first();

        DB::table('auctions')
        ->where('id', $request->postid)
        ->update(['bids' => (($auction->bids)+1)]);

        DB::table('auctions')
        ->where('id', $request->postid)
        ->update(['currentprice' => (($auction->currentprice)+($request->bidprice))]);

        DB::table('auctions')
        ->where('id', $request->postid)
        ->update(['customer_id' => (Auth::user()->id)]);

        $auctions = Auction::all();
        return redirect()-> route("customers.index",[
            "auctions" => $auctions,
        ]);
    }
    
    public function directBuy(Request $request){
        $township=Township::where('id',$request->township)->first();        
        $city = $township->city;
        $state = $city->state;
        return response()->json([
            'success',
            'city' => $city,
            'state' => $state
        ]);
    }
}
