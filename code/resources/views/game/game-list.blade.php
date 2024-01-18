@extends('layouts.page_with_head_footer')
@section('title', 'Homepage')
@section('content')
<div class="flex-col-start-center base-size margin-left-2vw">
        <div>
        <form class="small-long-div flex-row-center-center" method="POST" action="{{route('game.search')}}">
            @csrf
            <input id="search-txt-box" type="text" placeholder="Search" name="search_game">
            <input class="search-game-btn" type="submit" value="Search">
        <form>
        </div>
        <div class="max-width list-box-top-margin grid-4-col gap-1vh">
            @foreach ($games as $game)
            <a class="no-txt-underline" href="{{route('game.show', ['game'=>$game])}}">
                <div class="flex-col-start-center game-box">
                    <img class="image-fit-contain icon-size" src="{{ url('/game-images/' . $game->icon_image) }}">
                    <p class="game-title">{{ $game->game_name }}</p>
                    <div class="block-rating flex-row-center-center">
                        <div class="bar-container">
                            <div class="bar" style="width: {{ ($game->rating)*(5/100) }}"></div>
                        </div>
                        <p>{{ $game->rating }}</p>
                    </div>
                </div>
                </a>
            @endforeach
        </div>
</div>
@endsection