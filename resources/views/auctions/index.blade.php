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
     body {
        background-image: url("/images/contents/login.jpg");
        background-repeat:no-repeat;
        background-size:cover;
      } 
  
      .card {
        box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
        transition: 0.3s;
        width: 100%%;
        border-radius: 5px;
      }

      .card:hover {
        box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
      }

      img {
        border-radius: 5px 5px 0 0;
      }

      .contents {
        padding: 2px 16px;
      }
    </style>
    </head>
    <body class="{{ $class ?? '' }}">
            


        <!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
  <div class="container">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="{{ route('welcome') }}">  
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
          <a href="{{ route('welcome') }}" class="nav-link">
            <i class="material-icons">face</i> {{ __('Go To Your Dashboard') }}
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('auctions') }}" class="nav-link">
            <i class="material-icons">store</i> {{ __('Auctions') }}
          </a>
        </li>

        @guest
        <li class="nav-item">
          <a href="{{ route('register') }}" class="nav-link">
            <i class="material-icons">person_add</i> {{ __('Register') }}
          </a>
        </li>
        <li class="nav-item">
          <a href="{{ route('login') }}" class="nav-link">
            <i class="material-icons">fingerprint</i> {{ __('Login') }}
          </a>
        </li>
        @endguest

        @auth
        <li class="nav-item dropdown">
          <a class="nav-link" href="#pablo" id="navbarDropdownProfile" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="material-icons">person</i>
            <p class="d-lg-none d-md-block">
              {{ __('Account') }}
            </p>
          </a>
          <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
            <a class="dropdown-item" href="{{ route('welcome') }}">{{ __('Dashboard') }}</a>
            <a class="dropdown-item" href="{{ route('profile.edit') }}">{{ __('Settings') }}</a>
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
            <div class="page-header login-page header-filter" style="padding:114px 0 0 0" filter-color="black" style="background-image: url('{{ asset('material') }}/img/login.jpg'); background-size: cover; background-position: top center;align-items: center;" data-color="purple">
            <!--   you can change the color of the filter page using: data-color="blue | purple | green | orange | red | rose " -->
            <div class="container">
                <h2> <font face="Agency FB" color="white"> Search Items: </font> 
                </h2>
                <form action="">
                  <div class="row justify-content-center">
                      <div class="col-lg-8 col-md-8 col-sm-12">
                        <input type="text" style="width=100%" class="form-control" id="searchbox" name="searchbox" placeholder="Enter keywords to search...">                    
                      </div>

                      <div class="col-lg-2 col-md-2 col-sm-6">
                        <div class="btn-group">
                          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                          <button type="button" class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                        <button type="button" class="btn btn-primary"> Search </button>
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
                                  @if($auction->soldout=="No")
                                    <td colspan="2"> 
                                      <a href="">
                                        <button class="btn btn-primary btn-round"> View Item </button>
                                      </a>
                                    </td>
                                  @else
                                    <td colspan="2" style="padding-top:25px;"> 
                                      <font color="#9c27b0" face="Agency FB" size="4"> This item has been sold out ! </font>
                                    </td>
                                  @endif
                              </tr>
                            </table>
                        </div>
                      </div>
                    </div>
                    @endforeach
                </div>
            </div>
                <footer class="footer">
                    <div class="container">
                        <nav class="float-left">
                        <ul>
                            <li>
                            <a href="{{ route('welcome') }}">
                                {{ __('Home') }}
                            </a>
                            </li>
                            <li>
                            <a href="{{ route('about') }}">
                                {{ __('About Us') }}
                            </a>
                            </li>
                            <li>
                            <a href="{{ route('auctions') }}">
                                {{ __('Auctions') }}
                            </a>
                            </li>
                            <li>
                            <a href="{{ route('contact') }}">
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
        @stack('js')
    </body>
</html>