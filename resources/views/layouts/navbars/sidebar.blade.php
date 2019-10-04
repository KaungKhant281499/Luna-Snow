<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a class="simple-text logo-normal">
      <font color="#2c74ae"> 
        <i class="material-icons">person</i> &nbsp
        {{ __('Customer Panel') }} 
      </font>
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">

    @hasanyrole('admin|shop|customer')
      @role('customer')
        <li class="">
          <a class="nav-link" href="">
            <i class="material-icons"> add_shopping_cart</i>
              <p>{{ __('Purchased & Bookmarks') }}</p>
          </a>
        </li>
      
        <li class="nav-item {{ ($activePage == 'profile' || $activePage == 'user-management') ? ' active' : '' }}">
          <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
            <i class="material-icons">ac_unit</i>
            <p>{{ __('Manage Customer Account') }}
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
        </li> 
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
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons"> SU </i>
            <p>{{ __('Set-up Account') }}</p>
        </a>
      </li>
    @endhasanyrole
    </ul>
  </div>
</div>