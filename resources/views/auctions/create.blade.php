@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
<div class="content">
    <div class="container-fluid">
    <div class="row">
        <div class="col-md-12 col-sm-12" style="box-shadow: 0 0 10px 3px rgba(100, 100, 100, 0.7); background-color: #ffffff; margin-top:60px; padding-bottom:15px; text-align:center; height:auto; width:100%">
            <!-- Account Set-Up -->
            <div style="position: absolute; height: 50px; width: 280px;
                margin-top: -30px; margin-right: 15px; padding-top: 10px; border-radius: 10px;
                box-shadow: 0 0 10px 3px rgba(100, 100, 100, 0.7);                
                background-color:#9c27b0 !important;">                
                    <font size="4" color="#ffffff"> Create An Auction  </font>
            </div>

            <form style="margin-top:50px;" method="POST" action="{{ route('auctions.store')}}" enctype="multipart/form-data" id="commentForm">
                @csrf    
                <div class="row">
                    <!-- Address -->
                    <div class="card" style="margin-top:50px; margin-left:250px; width:150px; height:auto;">                                
                        <img id="imgholder" src="/images/contents/logo.jpg" style="width:150px; height:150px;">
                        <input id="imgholderInput" style="" name="photo" type='file' onchange="readURL(this);" hidden/>
                    </div>    
                </div>

                <div class="row">
                    <!-- Address -->
                    <div class="col-md-12 col-sm-12 col-12 form-group"> 
                        <font size="5" face="Agency FB" color="#9c27b0">
                            <b> Post Title: </b>
                        </font>
                        <input type="text" name="title" id="title" class="form-control">
                    </div>      
                    
                    <br> <br>

                    <!-- Description -->
                    <div class="col-md-12 col-sm-12 col-12 form-group"> 
                        <font size="5" face="Agency FB" color="#9c27b0">
                            <b> Post Description: </b>
                        </font>
                        <input type="text" name="description" id="description" style="height:150px;" class="form-control">
                    </div>      
                    
                    <br> <br>

                    <!-- End Date & Time-->
                    <div class="col-md-12 col-sm-12 col-12 form-group"> 
                        <font size="5" face="Agency FB" color="#9c27b0">
                            <b> End Date & Time: </b>
                        </font>
                        <input type="date" name="enddate" id="enddate" class="form-control">
                        <input type="time" name="endtime" id="endtime" class="form-control">
                    </div>   

                    <br> <br>

                    <!-- Final Sale -->
                    <div class="col-md-12 col-sm-12 col-12 form-group"> 
                        <font size="5" face="Agency FB" color="#9c27b0">
                            <b> Final Sale Amount: </b>
                        </font>
                        <input type="text" name="finalsale" id="finalsale" class="form-control">
                    </div>  

                    <!-- Fix Bid -->
                    <div class="col-md-12 col-sm-12 col-12 form-group"> 
                        <font size="5" face="Agency FB" color="#9c27b0">
                            <b> Fix Bid Amount: </b>
                        </font>
                        <input type="text" name="fixbid" id="fixbid" class="form-control">
                    </div> 

                    <!-- Condition -->
                    <div class="col-md-12 col-sm-12 col-12 form-group"> 
                        <font size="5" face="Agency FB" color="#9c27b0">
                            <b> Condition: </b>
                        </font>
                        <select name="condition" id="condition">
                            <option value="New"> New Item </option>
                            <option value="Used"> Used Item </option>
                        </select>
                    </div>            
                </div>          

                <div class="form-group row-md-12 row-sm-12">
                    <div class="col-md-6 offset-md-4">
                        <button onClick="cardSave()" type="submit" style="color:#ffffff; background-color:#9c27b0; font-weight: bold; margin-top:10px; margin-left:40px; padding: 7px 105px 7px 105px;">
                                {{ __('Create') }}
                        </button>
                    </div>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    //Java Script For End Date Defining
    var today = new Date();
    var dd = today.getDate();
    var maxdd = today.getDate()+9;
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();
        if(dd<10){
            dd='0'+dd
        } 

        if(maxdd<10){
            maxdd='0'+maxdd
        }

        if(mm<10){
            mm='0'+mm
        } 

    today = yyyy+'-'+mm+'-'+dd;
    maxday = yyyy+'-'+mm+'-'+maxdd;

    document.getElementById("enddate").setAttribute("min", today);
    document.getElementById("enddate").setAttribute("max", maxday);


     //Javascript For Image Preview
     function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#imgholder')
                    .attr('src', e.target.result)
                    .width(150)
                    .height(150);
            };

            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#imgholder').click(function(){
        $('#imgholderInput').click();
    });
    
    //This line call the pageLoad() on pageload
    window.onload = pageLoad;
    
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush