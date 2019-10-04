@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
  <div class="content">
    <div class="container-fluid">

      <div class="row">
        <div class="col-md-1 col-sm12">
        </div>
        
        <div class="col-md-5 col-sm12">
          <a href="{{route('shops.create')}}"> 
            <img src="/images/dashboard/shopregister.png" style="align:center; width:200px; height:200px;"> 
            <font color="#9c27b0" face="Agency FB" size="5">   Shop Register </font>
          </a>
        </div>

        <div class="col-md-5 col-sm12"> 
          <a href="{{route('customers.create')}}"> 
            <img src="/images/dashboard/customerregister.png" style="align:center; width:200px; height:200px;"> 
            <font color="#2c74ae" face="Agency FB" size="5">   Customer Register </font>
          </a>
        </div>

        <div class="col-md-1 col-sm12">
        </div>
      </div>

    </div>
  </div>
@endsection

@push('js')
  <script>
    $(document).ready(function() {
      // Javascript method's body can be found in assets/js/demos.js
      md.initDashboardPageCharts();
    });
  </script>
@endpush