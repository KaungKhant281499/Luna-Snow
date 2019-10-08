<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top text-white">
  <div class="container">
    <div class="navbar-wrapper">
      <a class="navbar-brand" href="{{ route('welcome') }}">  
        <img src="/images/contents/logo.png" width="90px" height="90px" alt="Luna Snow">
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
            <i class="material-icons">home</i> {{ __('Home') }}
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('about') }}" class="nav-link">
            <i class="material-icons">person</i> {{ __('About Us') }}
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('auctions') }}" class="nav-link">
            <i class="material-icons">store</i> {{ __('Auctions') }}
          </a>
        </li>

        <li class="nav-item">
          <a href="{{ route('contact') }}" class="nav-link">
            <i class="material-icons"> phone </i> {{ __('Contact Us') }}
          </a>
        </li>

        <li class="nav-item{{ $activePage == 'register' ? ' active' : '' }}">
          <a href="{{ route('register') }}" class="nav-link">
            <i class="material-icons">person_add</i> {{ __('Register') }}
          </a>
        </li>
        <li class="nav-item{{ $activePage == 'login' ? ' active' : '' }}">
          <a href="{{ route('login') }}" class="nav-link">
            <i class="material-icons">fingerprint</i> {{ __('Login') }}
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>
<!-- End Navbar -->