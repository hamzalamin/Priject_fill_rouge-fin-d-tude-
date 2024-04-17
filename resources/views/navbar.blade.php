@include('base')
<style>

</style>
<body>

    {{-- <nav class="navbar">
      <div class="container">
        <h1><img src="../../img/logo.png" alt="log" class="logo"></h1>
        <ul class="nav-links">
          <li><a href="{{ route('home') }}">Home</a></li>
          <li><a href="#">About</a></li>
          <li><a href="{{ route('Books') }}">Books</a></li>
          <li><a href="#">Contact</a></li>
          @if (Route::has('login')) 
          @auth
          @if (auth()->check() && auth()->user()->hasRole('Admin'))  
          <li><a href="{{ route('AdminDash') }}">Dashboard</a></li>
          @elseif (auth()->check() && auth()->user()->hasRole('Operatuer'))
          <li><a href="{{ route('OperatuerDash') }}">Dashboard</a></li>
          @endif
          <li><a href="{{ route('ticketForm') }}">Tickets</a></li>
          <li><a href="{{ route('getCart') }}"><img id="cartIcon" src="../../img/panie.png" alt=""></a></li>
          <li>
           <a><form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" style="background-color: #b7450a; border: none;
            border-radius: 5px;
            height: 25px;
            width: 50px;
            color: #ffffff;
            background-color: #a03209;
            transition: background-color 0.3s, transform 0.2s ease-out;" >Logout</button>
          </form></a>
         </li>   
          @endauth
          @endif
        </ul>
      </div>
    </nav>
    <div id="bookCart">
    </div> --}}
    {{-- @if (Route::has('login')) 
                          @auth  
                          <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
                          @else
                          <li><a href="{{ route('login') }}">Log In</a></li>
                           @if (Route::has('register'))
                          <li><a href="{{ route('register') }}">register</a></li>
                          @endif
                          @endauth
                          @endif
                          <li><a href="#contact">Contact</a></li>
                        </ul>
        </nav> --}}


        <nav class="navbar">
          <div class="navbar-logo">Logo</div>
          <ul class="navbar-links">
            <li><a href="{{ route('home') }}">Home</a></li>
            <li><a href="{{ route('Books') }}">Books</a></li>
            <li><a href="#">Services</a></li>
            @if (Route::has('login')) 
          @auth

        
          <div class="dropdown">
            <button class="dropbtn">Account 
              <i class="fa fa-caret-down"></i>
            </button>
            <div class="dropdown-content">
              <a><form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" style=" background: none;
                color:rgb(0, 0, 0);
                border: none;
                padding: 0;
                font: inherit;
                cursor: pointer;
                outline: inherit;
                ">Logout</button>
              </form></a>
            
                @if (auth()->check() && auth()->user()->hasRole('Admin'))  
                <a href="{{ route('AdminDash') }}">Dashboard</a>
                @elseif (auth()->check() && auth()->user()->hasRole('Operatuer'))
                <a href="{{ route('OperatuerDash') }}">Dashboard</a>
                @endif
                <a href="{{ route('ticketForm') }}">Tickets</a>
              
            </div>
          </div>
        </a>
      </ul>
    </ul>
          <a href="{{ route('getCart') }}"><img id="cartIcon" src="../../img/panieC.png" alt=""></a>
          
          @endauth
          @endif
        
          {{-- <a href="#"><img id="cartIcon" src="img/panieC.png" alt=""></a> --}}
        
          <div class="burger-menu" onclick="toggleMenu()">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
          </div>
        </nav>
        <script src="{{ asset('js/main1.js') }}"></script>
