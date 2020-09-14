@extends('layouts.app')


@section('content')
<div class="container">

    <div class="row justify-content-center">
        <div class="col">
            <div class="card">
                <div class="card-header"> <h4>Dobro došli {{auth()->user()->name}} {{auth()->user()->lastname}}</h4></div>

                <div class="card-body">
                    <div class="text-center">
                        @if (auth()->user()->role == 'Profesor' )
                        @include('inc.menu')
                           

                        @else 
                            <h4>Dobro došli {{auth()->user()->name}} {{auth()->user()->lastname}}</h4>
                            <nav style="  background-image: linear-gradient(to bottom right, red, yellow);" class="navbar navbar-expand-lg navbar-dark">
  <a class="navbar-brand text-white"></a>


<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">

  <!-- Left Side Of Navbar -->
  <ul class="navbar-nav mr-auto" style="font-size: 16px;">
   
   
    <li class="nav-item ">
    <a id="navbarDropdown" href="testovi" class="nav-link " href="#" role="button"  aria-haspopup="true" aria-expanded="false" v-pre>
       Testovi
    </a>
    </li>
    <li class="nav-item ">
    <a id="navbarDropdown" href="rezultati" class="nav-link " href="#" role="button"  aria-haspopup="true" aria-expanded="false" v-pre>
       Rezultati
    </a>
    </li>
    


  
  </ul>

    
    @guest
       
     
     
  </div>
  </li>
    @endguest
  </ul>
</div>
</nav>

                        @endif
                    </div>
                    <div class="text-center">
                        @if ((auth()->user()->role == 'Profesor'))
                        @else 
                        @endif
                    </div>
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <br>

  
</div>
@endsection
