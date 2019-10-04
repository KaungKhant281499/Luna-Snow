<?php

namespace App\Http\Controllers;
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
        return view('dashboard');
    }
    public function index()
    {
        
        if (!Auth::guest()){
            return redirect()->route('home');
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
}
