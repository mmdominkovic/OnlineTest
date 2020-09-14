<nav style="  background-image: linear-gradient(to bottom right, red, yellow);" class="navbar navbar-expand-lg navbar-dark">
  <a class="navbar-brand text-white"></a>


<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
    <span class="navbar-toggler-icon"></span>
</button>
<div class="collapse navbar-collapse" id="navbarSupportedContent">

  <!-- Left Side Of Navbar -->
  <ul class="navbar-nav mr-auto" style="font-size: 16px;">
   
    <li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Predmeti
    </a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">      
           <a class="dropdown-item" href="predmeti/create">
              Dodaj predmet
           </a>
           <a class="dropdown-item" href="predmeti">
               Svi predmeti
           </a>
           </div>
    </li>
    <li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Pitanja
    </a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">      
           <a class="dropdown-item" href="pitanja/create">
              Dodaj pitanje
           </a>
           <a class="dropdown-item" href="pitanja">
               Sva pitanja
           </a>
           </div>
    </li>
    <li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
        Odgovori
    </a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">      
           <a class="dropdown-item" href="odgovori/create">
              Dodaj odgovor
           </a>
           <a class="dropdown-item" href="odgovori">
               Svi odgovori
           </a>
           </div>
    </li>
    <li class="nav-item dropdown">
    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
       Korisnici
    </a>
           <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">      
          
           <a class="dropdown-item" href="users">
               Svi korisnici
           </a>
           </div>
    </li>
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
