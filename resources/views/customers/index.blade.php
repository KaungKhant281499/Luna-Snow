@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
<div class="content">
<h2> <font face="Agency FB" color="#2c74ae"> Search Items: </font> 
    </h2>
    <form action="">
      <div class="row justify-content-center">
          <div class="col-lg-8 col-md-8 col-sm-12">
            <input type="text" style="width=100%" class="form-control" id="searchbox" name="searchbox" placeholder="Enter keywords to search...">                    
          </div>

          <div class="col-lg-2 col-md-2 col-sm-6">
            <div class="btn-group">
              <button style="background-color:#2c74ae;" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Sorted By...
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#"> Nearest End Time </a>
                <a class="dropdown-item" href="#"> Furtherest End Time </a>
                <a class="dropdown-item" href="#"> Lowest Current Price </a>
                <a class="dropdown-item" href="#"> Highest Current Price </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#">Default</a>
              </div>
            </div>
          </div>

          <div class="col-lg-2 col-md-2 col-sm-6">
            <div class="btn-group">
              <button style="background-color:#2c74ae;" type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Item Condition
              </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="#"> New Items </a>
                <a class="dropdown-item" href="#"> Used Items </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#"> All </a>
              </div>
            </div>
          </div>
          
          <div class="col-lg-12 col-md-12 col-sm-12" >                        
            <button style="background-color:#2c74ae;" type="button" class="btn btn-primary"> Search </button>
          </div>
      </div>
    </form>

    <div class="row justify-content-center">
        @foreach($auctions as $auction)
        <div class="col-lg-3 col-md-3 col-sm-12">
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
                        <img src="{{Storage::url($auction->photo)}}" width="100%" height="100">
                      </td>
                  </tr>
                  <tr>
                      <td colspan="2"> 
                        <font face="Agency FB" size="3" color="#2c74ae"> Description: </font>
                        <br>
                        <?php
                          echo substr($auction->description,0,30);
                        ?>
                        @if((strlen($auction->description))>=30)
                        ...
                        @endif
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
                        <td colspan="2"> 
                            @if($auction->finalsale==0)
                              <b> <font face="Agency FB" size="3" color="#2c74ae"> Final Sale Amount: </font> </b> <br> N/A
                            @else
                              <b> <font face="Agency FB" size="3" color="#2c74ae"> Final Sale Amount: </font> </b> <br> {{$auction->finalsale}}
                            @endif
                        </td>
                  </tr>
                  <tr>
                  @php
                    date_default_timezone_set("Asia/Yangon");
                    $endyear = substr($auction->enddate, 0, 4); 
                    $endmonth = substr($auction->enddate, 5, 2); 
                    $endday = substr($auction->enddate, 8, 7); 
                    $endhour = substr($auction->endtime, 0, 2); 
                    $endminute = substr($auction->endtime, 3, 2); 

                    $currentyear = date('Y');
                    $currentmonth = date('m');
                    $currentday = date('d');
                    $currenthour = date('H');
                    $currentminute = date('i');
                  @endphp

                  @if(($endyear<=$currentyear)&&($endmonth<=$currentmonth)&&($endday<=$currentday)&&($endhour<=$currenthour)&&($endminute<=$currentminute))
                    <td colspan="2" style="padding-top:25px;"> 
                      <font color="#9c27b0" face="Agency FB" size="4"> This auction is ended! </font>
                    </td>
                  @else
                    @if($auction->soldout=="No")
                      <td colspan="2"> 
                        <a href="{{ route('auctions.show', $auction->id) }}">
                          <button class="btn btn-primary btn-round"> View Item</button>
                        </a>
                      </td>
                    @else
                      <td colspan="2" style="padding-top:25px;"> 
                        <font color="#9c27b0" face="Agency FB" size="4"> This item has been sold out! </font>
                      </td>
                    @endif
                  @endif
                  </tr>
                </table>
            </div>
          </div>
        </div>
        @endforeach
    </div>
  </div>
@endsection

@push('js')
  <script>
    //This line call the pageLoad() on pageload
    window.onload = pageLoad;
    
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });

  </script>
@endpush