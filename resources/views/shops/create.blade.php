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
                    <font size="4" color="#ffffff"> Shop Account Set-Up  </font>
            </div>

            <form onsubmit="return cardSave();" style="margin-top:50px;" method="POST" action="{{ route('shops.store')}}" enctype="multipart/form-data" id="commentForm">
                @csrf    
                <div class="row">
                    <!-- Address -->
                    <div class="card" style="margin-top:50px; margin-left:250px; width:150px; height:auto;">                                
                        <img id="imgholder" src="/images/contents/logo.jpg" style="width:150px; height:150px;">
                        <input id="imgholderInput" style="" name="photo" type='file' onchange="readURL(this);" hidden/>
                    </div>    
                </div>
                <div class="row">
                    <!-- Shop Name -->
                    <div class="col-md-12 col-sm-12 col-12 form-group"> 
                        <font size="5" face="Agency FB" color="#9c27b0">
                            <b> Name: </b>
                        </font>
                        <div>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>                            
                    </div>  

                    <!-- Address -->
                    <div class="col-md-12 col-sm-12 col-12 form-group"> 
                        <font size="5" face="Agency FB" color="#9c27b0">
                            <b> Address: </b>
                        </font>
                        <div>
                            <input type="text" name="address" id="address" class="form-control">
                        </div>                            
                    </div>  
                    <div class="col-md-12 col-sm-12 col-12 form-group" style="float:left">                    
                        <font size="5" face="Agency FB" color="#9c27b0">
                            <b> Township: </b>
                        </font>
                        <div>
                            <select name="township" id="township" class="form-control" style="width:100%; margin-right:10px; float:left;">                                
                                <option disabled selected>Select A Township</option>
                                @foreach($townships as $township)
                                <option value="{{$township->id}}"> {{$township->name}} </option>
                                @endforeach
                            </select>
                        </div>                            
                    </div>                        
                </div>

                <div class="row">
                    <!-- Address -->
                    <div class="col-md-6 col-sm-12 col-12 form-group">
                        <font size="5" face="Agency FB" color="#9c27b0">
                            <b> City: </b>
                        </font> 
                        <div>
                            <select name="city" id="city" class="autoselectCombo form-control" style="width:100%; margin-right:10px; float:left;">                                                                        
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-12 col-12 form-group" style="float:left">
                        <font size="5" face="Agency FB" color="#9c27b0">
                            <b> District: </b>
                        </font>   
                        <div>
                            <select name="district" id="district" class="autoselectCombo form-control" style="width:100%; margin-right:15px;">                                                                    
                            </select>
                        </div>                            
                    </div>                        
                </div>

                <!-- Payments -->
                <div class="row">
                    <div class="col-md-12 col-sm-12" style="margin-bottom:15px;">
                        <hr>
                        <font size="5" face="Agency FB" color="#9c27b0">
                            <b> Payment Information: </b>
                        </font> 
                    </div>
                    
                    <div class="col-md-6 col-sm-12 form-group" style="float:left;">                                
                        <input id="cardno" name="cardno" type="text" maxlength="19" class="form-control" placeholder="1111 1111 1111 1111">
                    </div>

                    <div class="col-md-1 col-sm-6 col-6 form-group" style="float:left;">                                
                        <input id="cvv" name="cvv" type="text" maxlength="3" class="form-control" placeholder="123">
                    </div>

                    <div class="col-md-1 col-sm-6 col-6 form-group" style="float:left;">                                
                        <input id="accountexp" name="accountexp" type="text" maxlength="5" class="form-control" placeholder="11/11">
                    </div>

                    <div class="col-md-3 col-sm-12 form-group" style="float:left;">                                
                        <img id="master" src="/images/contents/master.jpg" style="width:50px; height;15px;">
                        <img id="visa" src="/images/contents/visa.jpeg" style="width:50px; height;15px;">
                        <img id="paypal" src="/images/contents/paypal.jpg" style="width:50px; height;15px;">
                        <img id="jcb" src="/images/contents/jcb.jpg" style="width:50px; height;15px;">                                
                    </div>
                </div>

                <input id="type" name="type" type="text" class="form-control" hidden>

                <div class="form-group row-md-12 row-sm-12">
                    <div class="col-md-6 offset-md-4">
                        <button onClick="cardSave()" type="submit" style="color:#ffffff; background-color:#9c27b0; font-weight: bold; margin-top:10px; margin-left:40px; padding: 7px 105px 7px 105px;">
                                {{ __('Finish Set-Up') }}
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

    //JQuery for auto selecting addresses
    $(document).ready(function () {
        $('#district').prop("disabled", true);
        $('#city').prop("disabled", true);
        $('.autoselectCombo').select2();
        $("#township").change(function () {
            var township = $("#township").val();
            var url="{{route('selectTownship')}}";
            axios.post(url,{
                township: township
            })
            .then(function(response){
                $('#city').html("<option>"+response.data.city.name+"</option>")
                $('#district').html("<option>"+response.data.district.name+"</option>")
            })
            .catch(function(error){
                alert(error);
            });
        });
    });

    $('#imgholder').click(function(){
        $('#imgholderInput').click();
    });
        
    //Function for monitoring the textboxes changes
    function pageLoad(){
        //Block Clipboard Permission To Payment System
        $('#cardno').bind("cut copy paste",function(e) {
            e.preventDefault();
        });
        $('#cvv').bind("cut copy paste",function(e) {
            e.preventDefault();
        });
        $('#expdate').bind("cut copy paste",function(e) {
            e.preventDefault();
        });
        
        jQuery('#cardno').on('input propertychange paste', function() {
            cardSpacing();        
            setTimeout(checkCard, 1000);
        });

        jQuery('#accountexp').on('input propertychange paste', function() {
            expSelect();       
        });
    }

    //Payment Textboxes Functions (Start)
    //Function for card number spacing each 4 characters
    function cardSpacing(){
        var input = $('#cardno').val();
        var cardlength = input.length;
        
        if(cardlength==5){
            document.getElementById("cardno").value = input.substring(0,4);
        }else if(cardlength==10){
            document.getElementById("cardno").value = input.substring(0,9);
        }else if(cardlength==15){
            document.getElementById("cardno").value = input.substring(0,14);
        }else if(cardlength==4||cardlength==9||cardlength==14){
            input = input + " ";
            document.getElementById("cardno").value = input;
        }
    }

    //Function for adding / in between expired month and expired year 
    function expSelect(){
        var input = $('#accountexp').val();
        var explength = input.length;

        if(explength==3){
            document.getElementById("accountexp").value = input.substring(0,2);
        }else if(explength==2){
            input = input + "/";
            document.getElementById("accountexp").value = input;
        }
    }

    //Function for validation the card
    function checkCard(){
        var input = $('#cardno').val();    

        var card = input.substring(0,2);
        
        var jlogo = document.getElementById('jcb');
        var mlogo = document.getElementById('master');
        var vlogo = document.getElementById('visa');
        var plogo = document.getElementById('paypal');
        
        jlogo.style.opacity = "1";
        mlogo.style.opacity = "1";
        vlogo.style.opacity = "1";
        plogo.style.opacity = "1";
        
        if(card==""){
            $(cardno).css("background-color", "white");
        }else if(card==35){ //JCB Card Starting Number Check  
            $('#type').val('JCB');         
            mlogo.style.opacity = "0.2";
            vlogo.style.opacity = "0.2";
            plogo.style.opacity = "0.2";
        }else if(card==51||card==55||card==22){ //Mastercard Starting Number Check
            $('#type').val('MSC');  
            jlogo.style.opacity = "0.2";
            vlogo.style.opacity = "0.2";
            plogo.style.opacity = "0.2";
        }else if(card==41||card==40||card==42){ //Visa Card Starting Number Check
            $('#type').val('VSC');  
            mlogo.style.opacity = "0.2";
            jlogo.style.opacity = "0.2";
            plogo.style.opacity = "0.2";
        }else if(card==54||card==52||card==12){ //Paypal Card Starting Number Check
            $('#type').val('PPC');  
            mlogo.style.opacity = "0.2";
            vlogo.style.opacity = "0.2";
            jlogo.style.opacity = "0.2";
        }else{
            $(cardno).css("background-color", "#ffe0e0");
        }
    }
    //Payment Textboxes Functions (End)

    //Save Bank ID (Start)
    function cardSave(){
        var input = $('#cardno').val();    
        var cvv = $('#cvv').val();

        if(input=="3522 1111 2222 3333"){
            if(cvv!="124")
            { 
                alert("Input Card Is Invalid");
                return false;
            }else{
                document.getElementById("bankid").value = "5";
                return true;
            }

        }else if(input=="5111 1111 2222 3333"){
            document.getElementById("bankid").value = "6";
        }else if(input=="5522 1111 2222 3333"){
            document.getElementById("bankid").value = "7";
        }else if(input=="2211 1111 2222 3333"){
            document.getElementById("bankid").value = "8";
        }else if(input=="4111 1111 2222 3333"){
            document.getElementById("bankid").value = "9";
        }else if(input=="4011 1111 2222 3333"){
            document.getElementById("bankid").value = "10";
        }else if(input=="4211 1111 2222 3333"){
            document.getElementById("bankid").value = "11";
        }else if(input=="5411 1111 2222 3333"){
            document.getElementById("bankid").value = "12";
        }else if(input=="5211 1111 2222 3333"){
            document.getElementById("bankid").value = "13";
        }else if(input=="1211 1111 2222 3333"){
            document.getElementById("bankid").value = "14";
        }
    }
    //Save Bak ID (End)

    //This line call the pageLoad() on pageload
    window.onload = pageLoad;
    
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });


  </script>
@endpush