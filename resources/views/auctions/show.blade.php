@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
<div class="content">
    <div class="row justify-content-center">
        <div class="col-lg-12 col-md-12 col-sm-12">
          <div class="card">
            <div class="contents">
                <table border="0" width="100%">
                  <tr>
                      <td colspan="2"> 
                        <b> <font face="Agency FB" size="5" color="#2c74ae"> {{$auction->title}} </font> </b> &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp
                        @if($auction->condition=="Used")
                          <img width="80px" height="80px" src="images/auctions/used.png">
                        @else                                      
                          <img width="80px" height="80px" src="images/auctions/new.png">
                        @endif
                      </td>
                  </tr>
                  <tr>
                      <td colspan="2">
                        <img src="{{Storage::url($auction->photo)}}" width="100%" height="300">
                      </td>
                  </tr>
                  <tr>
                      <td colspan="2"> 
                        <font face="Agency FB" size="3" color="#2c74ae"> Description: </font>
                        <br>
                        {{$auction->description}}
                      </td>
                  </tr>
                  <tr>
                    <td colspan="2"> <hr> </td>
                  </tr>
                  <tr>
                      <td> <b> <font face="Agency FB" size="3" color="#2c74ae"> Total Bid: </font> </b> <br> {{$auction->bids}} </td>
                      <td> <b> <font face="Agency FB" size="3" color="#2c74ae"> Current Price: </font> </b> <br> {{$auction->currentprice}} Kyats</td>
                  </tr>
                  <tr>
                      <td> <b> <font face="Agency FB" size="3" color="#2c74ae"> End Date: </font> </b> <br> {{$auction->enddate}} </td>
                      <td> <b> <font face="Agency FB" size="3" color="#2c74ae"> End Time: </font> </b> <br> {{$auction->endtime}}</td>
                  </tr>
                  <tr>
                        <td> 
                            @if($auction->finalsale==0)
                              <b> <font face="Agency FB" size="3" color="#2c74ae"> Final Sale Amount: </font> </b> <br> N/A
                            @else
                              <b> <font face="Agency FB" size="3" color="#2c74ae"> Final Sale Amount: </font> </b> <br> {{$auction->finalsale}}
                            @endif
                        </td>

                        <td> 
                            @if($auction->fixbid==0)
                              <b> <font face="Agency FB" size="3" color="#2c74ae"> Fix Bid Price: </font> </b> <br> N/A
                            @else
                              <b> <font face="Agency FB" size="3" color="#2c74ae"> Fix Bid Price: </font> </b> <br> {{$auction->fixbid}}
                            @endif
                        </td>
                  </tr>
                  <tr>
                      @if($auction->soldoPut=="Yes")
                        <td colspan="2" style="padding-top:25px;"> 
                          <font color="#9c27b0" face="Agency FB" size="4"> This item has been sold out ! </font>
                        </td>
                      @endif
                  </tr>
                  <tr>
                    <td style="height:30px"></td>
                  </tr>
                  <tr>
                      <td>
                            
                      </td>
                      <td>
                      <form style="margin-top:50px;" method="POST" action="{{ route('normalBid')}}" enctype="multipart/form-data" id="commentForm">
                        @csrf   
                            @if($auction->fixbid==0)
                                Enter Pay Amount: <br>
                                <input style="width:200px;" id="bidprice" name="bidprice" type="text" class="form-control">
                                <button type="submit" style="color:#ffffff; background-color:#2c74ae; font-weight: bold; margin-top:10px; margin-left:40px; padding: 7px 105px 7px 105px;">
                                        {{ __('Bid') }}
                                </button>
                            @else
                                <input value="{{$auction->fixbid}}" hidden style="width:200px;" id="bidprice" name="bidprice" type="text" class="form-control">                            
                                <button type="submit" style="color:#ffffff; background-color:#2c74ae; font-weight: bold; margin-top:10px; margin-left:40px; padding: 7px 105px 7px 105px;">
                                        {{ __('Bid') }}
                                </button>
                            @endif
                            <input type="text" value="{{$auction->id}}" name="postid" hidden>
                        </form>
                      </td>
                      @if($auction->finalsale!=0)
                      <td>
                        Direct Pay {{$auction->finalsale}} Kyats to win this auction <br> <br> 
                        <a href="{{ route('cities.show', $auction->id)}}"> 
                            <input value="Direct Buy" type="button" style="color:#ffffff; background-color:#2c74ae; font-weight: bold; margin-top:10px; margin-left:40px; padding: 7px 105px 7px 105px;">
                        </a>
                      </td>
                      @endif
                  </tr>
                  <tr>
                    <td style="height:30px"></td>
                  </tr>
                </table>
            </div>
          </div>
        </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
  </script>
@endpush