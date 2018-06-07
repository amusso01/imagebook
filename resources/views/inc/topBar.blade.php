<nav id="topBar" class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">

            <!-- Collapsed Hamburger -->
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                <span class="sr-only">Toggle Navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

             <!-- Branding Image -->
        <img id="main_logo" alt="Brand" src="{{asset('images/imagebook-logo.png')}}">
        <a class="navbar-left" href="{{ url('/') }}">
            <h2 >{{ config('app.name', 'Image Book') }}</h2>
        </a>  
        </div>

        <div class="collapse navbar-collapse" id="app-navbar-collapse">
            <!-- Left Side Of Navbar -->
            <ul class="nav navbar-nav">
                &nbsp;
            </ul>

            <!-- Right Side Of Navbar -->
            <ul class="nav navbar-nav navbar-right">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li>
                        <a id="user">
                            {{ Auth::user()->name }}
                        </a>
                        
                        {{-- <ul class="dropdown-menu">
                            <li>
                                    <a href="{{ route('logout') }}" 
                                        onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();"> 
                                    put some option
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul> --}}

                    </li>

                    <li>
                        <a href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                            Logout
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>    
                    </li>

                        
                    
                @endguest
            </ul>
        </div>
    </div>
</nav>