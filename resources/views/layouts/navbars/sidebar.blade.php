<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a class="simple-text logo-normal">
    @role('customer')
      <font color="#2c74ae"> 
        <i class="material-icons">person</i> &nbsp
        {{ __('Customer Panel') }} 
      </font>
    @endrole
      
    @role('admin')
      <font color="black"> 
        <i class="material-icons">person</i> &nbsp
        {{ __('Admin Panel') }} 
      </font>
    @endrole

    @role('shop')
      <font color="#9c27b0"> 
        <i class="material-icons">person</i> &nbsp
        {{ __('Shop Panel') }} 
      </font>
    @endrole
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">

    @hasanyrole('admin|shop|customer')
      @role('customer')
        <center>
          <a href="{{ route('customers.index') }}">
            <i class="material-icons" style="padding-left:30px;">dashboard</i>
            <p style="color:#2c74ae"> View Auctions </p>
          </a>
          <hr>
          <a href="{{ route('profile.edit') }}">
            <i class="material-icons" style="padding-left:30px;"> UP </i>
            <p style="color:#2c74ae"> Edit User Profile </p>
          </a>
          <hr>
          <a href="{{ route('customers.index') }}">
            <i class="material-icons" style="padding-left:30px;">payment</i>
            <p style="color:#2c74ae"> Manage Payment </p>
          </a>
        <center>
      @endrole

      @role('shop')
        <center>
          <a href="{{ route('shops.index') }}">
            <i class="material-icons" style="padding-left:30px;">dashboard</i>
            <p> Dashboard </p>
          </a>
          <hr>
          <a href="{{ route('auctions.create') }}">
            <i class="material-icons" style="padding-left:30px;"> add </i>
            <p> Add New Listing </p>
          </a>
          <hr>
          <a href="{{ route('profile.edit') }}">
            <i class="material-icons" style="padding-left:30px;"> UP </i>
            <p> Edit User Profile </p>
          </a>
          <hr>
          <a href="{{ route('shops.index') }}">
            <i class="material-icons" style="padding-left:30px;">payment</i>
            <p> Manage Payment </p>
          </a>
        <center>
      @endrole
      
      @role('admin')
      <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i class="material-icons">ac_unit</i>
          <p>{{ __('Manage Admin Account') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item">
              <a class="nav-link" href="{{ route('profile.edit') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('Edit User Profile') }} </span>
              </a>
            </li>

            <li class="nav-item">
              <a class="nav-link" href="">
                <i class="material-icons">payment</i>
                <span class="sidebar-normal">{{ __('Manage Payment') }} </span>
              </a>
            </li>
            </ul>
            </div>
      </li> 

      <li class="nav-item{{ $activePage == 'user-management' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('user.index') }}">
          <span class="sidebar-mini"> UM </span>
          <span class="sidebar-normal"> {{ __('User Management') }} </span>
        </a>
      </li>
      @endrole
    @else
      <li class="nav-item">
        <a class="nav-link">
          <i class="material-icons"> SU </i>
            <p>{{ __('Set-up Account') }}</p>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons"> CT </i>
          <p>{{ __('Change Account Type') }}</p>
        </a>
      </li>
    @endhasanyrole
    </ul>
  </div>
</div>