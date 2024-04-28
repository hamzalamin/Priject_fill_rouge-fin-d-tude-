@include('base')
{{-- <script src="{{ asset('jss/main1.js') }}"></script> --}}
@php
    use Illuminate\Support\Facades\Auth;
    use App\Models\cart;

    $user_id = Auth::id();
    $countNotif = cart::where('user_id', $user_id)
                      ->where('check', 0)
                      ->count();
@endphp

<body>
        <nav class="navbar">
          <div class="navbar-logo"><img class="navLogo" src="{{ asset('img/logolibeup_backno.png') }}" alt=""></div>
          <ul class="navbar-links">
            <li><a class="homenav" href="{{ route('home') }}">Home</a></li>
            <li><a class="homenav" href="{{ route('Books') }}">Books</a></li>
            <li><a class="homenav" href="{{ route('services') }}">Services</a></li>
            @if (Route::has('login')) 
          @auth
          <a href="{{ route('Profile') }}" class="dozihna" style="text-decoration: none; color:white;">Profile</a>
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
          <a style="text-decoration: none;" href="{{ route('getCart') }}">
            <span class="notif">{{ $countNotif }}</span>
            <img id="cartIcon" src="../../img/panieC.png" alt="">
          </a>
          
          @endauth
          @endif
        
          {{-- <a href="#"><img id="cartIcon" src="img/panieC.png" alt=""></a> --}}
          <div class="burger-menu" onclick="toggleMenu()">
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
          </div>
        </nav>
          
        {{-- <script src="{{ asset('jss/main1.js') }}"></script> --}}