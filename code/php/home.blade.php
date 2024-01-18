@extends('layouts.page_with_head_footer')
@section('title', 'Homepage')
@section('content')
    <div class="div-section1">
        @if (!Auth::check()||Auth::check()&&Auth::user()->user_type==1)
        <div class="flexbox-item1">
            <div class="title1">
                <h1>Want to say something about a game?</h1>
                <p>This is a website which you can find many games on. You can rate any game you like and leave a
                    comment</p>
            </div>
            
            <form method="POST" action="{{route('game.search')}}">
                @csrf
                <div class="search-bar">
                    <input placeholder="Find the game" type="text" name="search_game">
                    <input class="search-bar-button" type="submit" value="Search">
                </div>
            </form>
        </div>
        @else
        <div class="flexbox-item1">
            <div class="title1">
                <h1>Upload your game now</h1>
                <p>This is your chance to show your masterpiece to public!</p>
            </div>
            
            <button class="upload-game-btn" onclick="window.location.href='{{ route('game.create') }}';">Upload game</button>
        </div>

        @endif
        
        <div class="flexbox-item2">
            <img class="image-icon1" src="{{ url('/design-images/game-controller.png') }}">
        </div>
    </div>

    <div class="div-section2">
        <div class="header2">What's new</div>
        <div class="game-des-container">

                    <img class="game-icon1" src="{{ url('/game-images/' . $game->icon_image) }}">

                    <div class="des1">
                        <h1>{{ $game->game_name }}</h1>
                        <div>{{ $game->description }}</div>
                    </div>

    </div>
</div>

<div class="div-section3">
    <div class="div-flex3-child1">
        <h1 class="title2">Want to know if the game is good or not?</h1>
        <p class="text1">Search it, we have record every rating and opinion provided by all users</p>
    </div>
    <div class="div-flex3-child2">
        <img class="game-image1" src="{{ url('/design-images/games.png') }}">
    </div>
</div>

<div class="div-section4">
    <h1 class="title2 header-topmargin">You can find games from different platforms</h1>
    <div class="platform">
        <img src="{{ url('/design-images/platform-icons.png') }}">
    </div>
</div>

@endsection
