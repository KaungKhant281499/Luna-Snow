<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Auction;
use App\Auction_Photo;
class PagesController extends Controller
{
    public function auctionpage()
    {
        $auctions = Auction::all();;
        return view("auctions.index",[
            "auctions" => $auctions,
        ]);
    }

    public function aboutpage()
    {
        return view("abouts.index");
    }

    public function contactpage()
    {
        return view("contacts.index");
    }

    public function account()
    {
        return view ("account");
    }

    public function bankcreate()
    {
        return view ("banks.create");
    }
}
