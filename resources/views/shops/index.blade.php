@extends('layouts.app', ['activePage' => 'dashboard', 'titlePage' => __('Dashboard')])

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
          <h2 style="color:#9c27b0;"> Your Created Auction Posts: </h2>
          <table class="table">
            <thead>
                <tr>
                    <th class="text-center">Post Id:</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">End Date</th>
                    <th class="text-center">Current Price</th>
                    <th class="text-center">Last Bid</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
              @foreach($ownauctions as $ownauction)
                <tr>
                    <td class="text-center"> {{$ownauction->id}} </td>
                    <td class="text-center"> {{$ownauction->title}} </td>
                    <td class="text-center"> {{$ownauction->enddate}} </td>
                    <td class="text-center"> {{$ownauction->currentprice}} Kyats </td>
                    <td class="text-center"> {{$ownauction->updated_at}} </td>
                    <td class="td-actions text-right">
                        <button type="button" rel="tooltip" class="btn btn-success">
                        <i class="material-icons"> dashboard </i> View
                        </button>
                    </td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <h2 style="color:#9c27b0;"> Your Sold Out Items: </h2>
          <table class="table">
            <thead>
                <tr>
                    <th class="text-center">Post Id:</th>
                    <th class="text-center">Title</th>
                    <th class="text-center">Current Price</th>
                    <th class="text-center">Last Bid</th>
                    <th class="text-center">Buyer</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
              @foreach($soldauctions as $soldauction)
                <tr>
                    <td class="text-center"> {{$soldauction->id}} </td>
                    <td class="text-center"> {{$soldauction->title}} </td>
                    <td class="text-center"> {{$soldauction->currentprice}} Kyats </td>
                    <td class="text-center"> {{$soldauction->updated_at}} </td>
                    <td class="text-center"> 
                        <button type="button" rel="tooltip" class="btn btn-success">
                          <i class="material-icons">phone</i> Contact Customer
                        </button>
                    </td>
                    <form method="POST" action="{{ route('banks.store')}}" enctype="multipart/form-data" id="commentForm">
                    @csrf    
                      <input type="text" id="customerid" name="customerid" value="{{$soldauction->customer_id}}" hidden>
                      <input type="text" id="price" name="price" value="{{$soldauction->currentprice}}" hidden>
                      <td class="td-actions text-right">
                          @if($soldauction->delivered=="Delivered")
                            <button type="button" rel="tooltip" class="btn btn-red" disabled>
                              <i class="material-icons"> done </i> Delivered
                            </button>
                          @else
                            <button type="submit" rel="tooltip" class="btn btn-success">
                              <i class="material-icons"> done </i> Delivered
                            </button>
                          @endif
                      </td>
                    </form>
                </tr>
              @endforeach
            </tbody>
          </table>
      </div>
    </div>
  </div>
@endsection

@push('js')
  <script>
    
  </script>
@endpush