@extends('layouts.app', ['class' => 'off-canvas-sidebar', 'activePage' => 'home', 'title' => __('Material Dashboard')])

@section('content')
<div class="container" style="height: auto;">
  <div class="row justify-content-center">
    <div class="col-lg-8 col-md-8 col-sm-8">
        <br>
        <h1 class="text-white text-center"> 
            <font color="white" face="Agency FB">            
                <b> " Bid Many At The Same Time, <br> Save Your Time! " </b>
            </font>
        </h1>
        <br>
        <p>        
            <font color="white" face="Arial" size="4">            
                    "Luna Snow" is the first auctions website in Myanmar. We're please to offer 24/7 auctions transations and we're offering delivery services to all States and Districts within Myanmar.
            </font>
        </p>

        <center> <iframe width="560" height="315" src="https://www.youtube.com/embed/Wic9cSoUjk0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe> </center>
        <h4 style="background-color:#a5d7ff; color:black;"> Advertise your video Ad <a href="" style="color:#2c74ae;"> <b> here </b> ! </a> </h4>
    </div>
      
    <div class="col-lg-4 col-md-4 col-sm-4">
        <br>
        <table>
            <tr>
                <td>
                    <a href="https://www.cbbank.com.mm/">                    
                        <img src="/images/contents/ad1.jpg" width="150px" height="300px">
                    </a>
                </td>
                <td>
                    <a href="http://www.wunzinn.com/">
                        <img src="/images/contents/ad2.jpg" width="150px" height="300px">
                    </a>
                </td>
                <td>
                    <a href="https://ooredoo.com.mm/portal/en/index">
                        <img src="/images/contents/ad3.jpg" width="150px" height="300px">
                    </a>
                </td>
            </tr>
            <tr style="background-color:#a5d7ff;">
                <td colspan="3"> <font color="#000000"> &nbsp Advertise your business </font> <a href="" style="color:#2c74ae;"> <b> here </b> ! </a> </td>
            </tr>
        </table>      
    </div>

  </div>
</div>
@endsection
