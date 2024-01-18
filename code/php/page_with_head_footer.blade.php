<!DOCTYPE html>
<html>

<head>
    <link href="{{ asset('css/homepage.css') }}" rel="stylesheet">
    <link href="{{ asset('css/gamelist_page.css') }}" rel="stylesheet">
    <title>Game Review - @yield('title')</title>

</head>

<body>
    <div id="header-bar">

        <div id="header-title-text">Game Review</div>
        <div class="header-option">
            <a class="header-a-element header-item header-item-not-button" href="{{ route('home') }}"><div>
                Home
            </div></a>

            @if (Auth::check()&&Auth::user()->user_type==2)
            <a class="header-a-element header-item header-item-not-button" href="{{ route('game.create') }}"><div>
                Upload Game
            </div></a>
            @endif

            <a class="header-a-element header-item header-item-not-button" href="{{ route('game.list') }}"><div>
                Game List
            </div></a>
            
            <div class="header-item">
                
                @guest
                    <button id="header-login-button" onclick="window.location.href='{{ route('login') }}';">Login</button>
                @endguest
    
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <input type="submit" value="Logout" id="header-login-button">
                    </form>
                @endauth
            </div>
        </div>
    </div>
    @yield('content')
    <div id="footer">
        This website is created by Wan Fai Tong
    </div>
</body>

</html>
