<nav style="  background-image: linear-gradient(to bottom right, red, yellow);" class="navbar navbar-expand-lg navbar-dark">
  <a class="navbar-brand text-white">
    <b> {{ config('app.name', 'FPMOZ') }}</b>
</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
    <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <!-- Left Side Of Navbar -->
  <ul class="navbar-nav mr-auto" style="font-size: 16px;">
    <li class="nav-item">
      <a class="nav-link" href="dashboard">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="about">About</a>
    </li>
    
    <li class="nav-item">
        <a class="nav-link" href="predmeti">Predmeti</a>
      </li>
     
     
  </ul>

    <!-- Right Side Of Navbar -->
  <ul class="navbar-nav ml-auto navbar-right">
    <!-- Authentication Links -->
    @guest
    <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
      
    @else
    <li class="nav-item dropdown">
      <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        {{ Auth::user()->name }}
    </a>
  
    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
      <a class="dropdown-item" href="{{ route('logout') }}"
          onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
          {{ __('Logout') }}
      </a>

      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
        @csrf
    </form>
  </div>
  </li>
    @endguest
  </ul>
</div>
</nav>
