<?php

namespace App\Http\Controllers;

use App\Customer;
use App\District;
use App\City;
use App\Township;
use App\Auction;
use App\Bank;
use Auth;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auctions = Auction::all();
        return view("customers.index",[
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
        $townships = Township::orderBy('name')->get();
        $cities = City::orderBy('name')->get();
        $districts = District::orderBy('name')->get();
        
        return view ("customers.create",[
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
        $user->assignRole("customer");

        //Customer Save
        $customer = new Customer();
        $customer->name = Auth::user()->name;

        if($request->hasFile('photo')){
            $customer->photo = $request->photo->store("account_images","public");
        }else{
            $customer->photo = "images/contents/logo.jpg";
        }

        $customer->address = $request->address;
        $customer->township_id = $request->township;
        $customer->user_id = Auth::user()->id;
        $customer->save();

        //Bank Save
        $bank = new Bank();
        $bank->cardno = $request->cardno;
        $bank->cvv = $request->cvv;
        $bank->exp = $request->accountexp;
        $bank->balance = 100000000;
        $bank->user_id = $user->id;
        $bank->type = $request->type;
        $bank->save();

        return redirect()-> route("auctions")->with("notification","Congratulations, Your Account Registration Is Finished");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function show(Customer $customer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function edit(Customer $customer)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Customer $customer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Customer  $customer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Customer $customer)
    {
        //
    }
}
