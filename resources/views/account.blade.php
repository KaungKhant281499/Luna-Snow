<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ __('Material Dashboard Laravel - Free Frontend Preset for Laravel') }}</title>
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('material') }}/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{ asset('material') }}/img/favicon.png">
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{ asset('material') }}/css/material-dashboard.css?v=2.1.1" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('material') }}/demo/demo.css" rel="stylesheet" />
    <style>
        ::placeholder{
            color:black;
        }
    </style>
    </head>
    <body class="{{ $class ?? '' }}">
            


        <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
  <div class="container">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="{{ route('home') }}">  
        <img src="/images/contents/logopng.png" width="90px" height="90px" alt="Luna Snow">
      </a>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
      <span class="sr-only">Toggle navigation</span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
      <span class="navbar-toggler-icon icon-bar"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end">
      <ul class="navbar-nav">
        
        <li class="nav-item">
          <a href="{{ route('auctions') }}" class="nav-link">
            <i class="material-icons">store</i> {{ __('Auctions') }}
          </a>
        </li>

        @auth
        <li class="nav-item dropdown">
          <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">person</i>
            <p class="d-lg-none d-md-block">
              {{ __('Account') }}
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
            <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Profile') }}</a>
            <a class="dropdown-item" href="#">{{ __('Settings') }}</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">{{ __('Log out') }}</a>
          </div>
        </li>
        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        @endauth
       
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->
        <div class="wrapper wrapper-full-page">
            <div class="page-header login-page header-filter" style="padding:114px 0 0 0" filter-color="black" style="background-image: url('/images/login.jpg'); background-size: cover; background-position: top center;align-items: center;" data-color="purple">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="container">
                    <div class="row justify-content-center">
                    <form style="margin-top:50px;" method="POST" action="{{ route('banks.store')}}" enctype="multipart/form-data" id="commentForm">
                    @csrf
                            <div class="col-md-12 col-sm-12" style="margin-bottom:15px;">
                                <hr>
                                <font size="4">
                                    <b> Payment Information: </b>
                                </font>
                            </div>
                            
                            <div class="col-md-6 col-sm-12 form-group" style="float:left;">                                
                                CARD NO: <input  style="color:black" id="cardno" name="cardno" type="text" maxlength="19" class="form-control" placeholder="1111 1111 1111 1111">
                            </div>

                            <div class="col-md-1 col-sm-6 col-6 form-group" style="float:left;">                                
                                CVV: <input  style="color:black" id="cvv" name="cvv" type="text" maxlength="3" class="form-control" placeholder="123">
                            </div>

                            <div class="col-md-1 col-sm-6 col-6 form-group" style="float:left;">                                
                                EXP:<input  style="color:black" id="accountexp" name="accountexp" type="text" maxlength="5" class="form-control" placeholder="11/11">
                            </div>

                            <div class="col-md-3 col-sm-12 form-group" style="float:left;">                                
                                <img id="master" src="/images/master.jpg" style="width:50px; height;15px;">
                                <img id="visa" src="/images/visa.jpeg" style="width:50px; height;15px;">
                                <img id="paypal" src="/images/paypal.jpg" style="width:50px; height;15px;">
                                <img id="jcb" src="/images/jcb.jpg" style="width:50px; height;15px;">                                
                            </div>
                        </div>

                        <input id="type" name="type" type="text" hidden/>

                        <div class="form-group row-md-4 row-sm-12">
                            <div class="form-check form-check-radio">
                                <label class="form-check-label" style="color:black">
                                    <input class="form-check-input" type="radio" name="role" id="role1" value="shop" >
                                    Shop
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                            <div class="form-check form-check-radio">
                                <label class="form-check-label"  style="color:black">
                                    <input class="form-check-input" type="radio" name="role" id="role2" value="customer" checked>
                                    Customer
                                    <span class="circle">
                                        <span class="check"></span>
                                    </span>
                                </label>
                            </div>
                        </div>

                        <div class="form-group row-md-8 row-sm-12">
                            <div class="col-md-6 offset-md-4">
                            <button  type="submit" class="btn btn-info">{{ __('Finish Set-Up') }}</button>
                            </div>
                        </div>
                        </form>
            </div>
                <footer class="footer">
                    <div class="container">
                        <nav class="float-left">
                        <ul>
                            <li>
                            <a href="">
                                {{ __('About Us') }}
                            </a>
                            </li>
                            <li>
                            <a href="">
                                {{ __('Auctions') }}
                            </a>
                            </li>
                            <li>
                            <a href="">
                                {{ __('Contact Us') }}
                            </a>
                            </li>
                        </ul>
                        </nav>
                        <div class="copyright float-right">
                        &copy;
                        <script>
                            document.write(new Date().getFullYear())
                        </script>, copyright by LUNA SNOW Co Ltd.
                    </div>
                </footer>
            </div>
        </div>

        <!--   Core JS Files   -->
        <script src="{{ asset('material') }}/js/core/jquery.min.js"></script>
        <script src="{{ asset('material') }}/js/core/popper.min.js"></script>
        <script src="{{ asset('material') }}/js/core/bootstrap-material-design.min.js"></script>
        <script src="{{ asset('material') }}/js/plugins/perfect-scrollbar.jquery.min.js"></script>
        <!-- Plugin for the momentJs  -->
        <script src="{{ asset('material') }}/js/plugins/moment.min.js"></script>
        <!--  Plugin for Sweet Alert -->
        <script src="{{ asset('material') }}/js/plugins/sweetalert2.js"></script>
        <!-- Forms Validations Plugin -->
        <script src="{{ asset('material') }}/js/plugins/jquery.validate.min.js"></script>
        <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
        <script src="{{ asset('material') }}/js/plugins/jquery.bootstrap-wizard.js"></script>
        <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
        <script src="{{ asset('material') }}/js/plugins/bootstrap-selectpicker.js"></script>
        <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
        <script src="{{ asset('material') }}/js/plugins/bootstrap-datetimepicker.min.js"></script>
        <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
        <script src="{{ asset('material') }}/js/plugins/jquery.dataTables.min.js"></script>
        <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
        <script src="{{ asset('material') }}/js/plugins/bootstrap-tagsinput.js"></script>
        <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
        <script src="{{ asset('material') }}/js/plugins/jasny-bootstrap.min.js"></script>
        <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
        <script src="{{ asset('material') }}/js/plugins/fullcalendar.min.js"></script>
        <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
        <script src="{{ asset('material') }}/js/plugins/jquery-jvectormap.js"></script>
        <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
        <script src="{{ asset('material') }}/js/plugins/nouislider.min.js"></script>
        <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
        <!-- Library for adding dinamically elements -->
        <script src="{{ asset('material') }}/js/plugins/arrive.min.js"></script>
        <!--  Google Maps Plugin    -->
        <script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE'"></script>
        <!-- Chartist JS -->
        <script src="{{ asset('material') }}/js/plugins/chartist.min.js"></script>
        <!--  Notifications Plugin    -->
        <script src="{{ asset('material') }}/js/plugins/bootstrap-notify.js"></script>
        <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
        <script src="{{ asset('material') }}/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
        <!-- Material Dashboard DEMO methods, don't include it in your project! -->
        <script src="{{ asset('material') }}/demo/demo.js"></script>
        <script src="{{ asset('material') }}/js/settings.js"></script>
        <script>
            //Payment Textboxes Functions (Start)
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
                    mlogo.style.opacity = "0.2";
                    vlogo.style.opacity = "0.2";
                    plogo.style.opacity = "0.2";
                    $('#type').val('JCB');
                }else if(card==51||card==55||card==22){ //Mastercard Starting Number Check
                    jlogo.style.opacity = "0.2";
                    vlogo.style.opacity = "0.2";
                    plogo.style.opacity = "0.2";
                    $('#type').val('MSC');
                }else if(card==41||card==40||card==42){ //Visa Card Starting Number Check
                    mlogo.style.opacity = "0.2";
                    jlogo.style.opacity = "0.2";
                    plogo.style.opacity = "0.2";
                    $('#type').val('VSC');
                }else if(card==54||card==52||card==12){ //Paypal Card Starting Number Check
                    mlogo.style.opacity = "0.2";
                    vlogo.style.opacity = "0.2";
                    jlogo.style.opacity = "0.2";
                    $('#type').val('PPC');
                }else{
                    $(cardno).css("background-color", "#ffe0e0");
                }
            }
            
            //This line call the pageLoad() on pageload
            window.onload = pageLoad;
            //Payment Textboxes Functions (End)
        </script>
    </body>
</html>