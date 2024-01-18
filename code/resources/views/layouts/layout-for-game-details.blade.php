<!DOCTYPE html>
<html>

<head>
    <link href="{{ asset('css/game_details_page.css') }}" rel="stylesheet">
    <link href="{{ asset('css/game_create_page.css') }}" rel="stylesheet">
    <script src="https://unpkg.com/vue@next"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <title>Game Review - @yield('title')</title>
</head>

<body style="@yield('bg')">

    <div class="full-w flex-col justify-space-between align-center banner-image-bg" style="background-image: 
    @yield("banner");height:@yield("height");">
        <div class="flex-row h-10pr justify-space-between txt-align-left align-center bg-transparent full-w">
            <div class="margin-left color-white font-2_5vh padding-1pr">Game Review</div>
            <div class="flex-row justify-flex-end align-center flex-basis-50">
                <a class="header-item header-item-not-button color-white txt-deco-none txt-bold no-txt-wrap"
                    href="{{ route('home') }}">
                    <div>
                        Home
                    </div>
                </a>

                @if (Auth::check() && Auth::user()->user_type == 2)
                    <a class="header-item header-item-not-button color-white txt-deco-none txt-bold no-txt-wrap" href="{{ route('game.create') }}">
                        <div>
                            Upload Game
                        </div>
                    </a>
                @endif

                <a class="header-item header-item-not-button color-white txt-deco-none txt-bold no-txt-wrap"
                    href="{{ route('game.list') }}">
                    <div>
                        Game List
                    </div>
                </a>

                <div class="float-right header-item">

                    @guest
                        <button id="header-login-button"
                            onclick="window.location.href='{{ route('login') }}';">Login</button>
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
        @yield('banner-content')
    </div>
    @yield('content')

</body>

</html>
