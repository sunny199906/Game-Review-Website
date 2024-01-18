@extends('layouts.layout-for-game-details')
@section('bg', 'background-color: transparent;')
@section('title', 'Game Details')
@section('banner', 'url(/game-images/'.$game->banner_image.')')
@section('height', '70vh')
@section('banner-content')

    <div class="full-w flex-col justify-flex-start align-center h-45pr">
        <p class="color-white txt-bold game-title-txt">{{ $game->game_name }}</p>
        <p class="color-white game-txt-under-title">Published by: </p>
        <div class="w-20 flex-row justify-center align-center">
            <div class="bar-container">
                <div class="bar" style="width: {{ ($game->rating)*(5/100) }}"></div>
            </div>
            <p class="color-white margin-left">{{ $game->rating }}</p>
        </div>
    </div>
@endsection
@section('content')
<div class="flex-col justify-flex-start align-center full-w h-auto" id="commentapp">
    <p class="txt-bold font-4_5vh">Description</p>
    <p class="color-grey w-40">{{ $game->description }}</p>
    <p class="txt-bold font-4_5vh">In-game Images</p>
    <div class="grid-2-col gap-1vh">
        @foreach ($game_images as $game_image)
             <img class="img-width-20vw-25vh" src="{{ url('/in-game-images/'. $game_image->image) }}">
        @endforeach
    </div>
    <p class="txt-bold font-4_5vh">Review</p>
    <div class="w-40 h-auto">
        @auth
        <form method="GET" action="{{ route('comment.postComment') }}">
            @csrf
            <div class="full-w h-auto flex-col justify-flex-start align-flex-start border-grey border-radius-30pr padding-2pr">
                <input type="hidden" name="game_id" value="{{ $game->id }}">
                <input type="hidden" name="user_id" value="{{ Auth::id() }}">
                <label>Rating: </label><input type="range" min="0" max="5" value="3" name="rating">
                <input class="w-80 no-border border-bottom-purple font-2_5vh padding-1pr" type="text" name="content" placeholder="Comment">
                <input class="btn-purple no-border border-radius-25px margin-top-2-vh h-4vh" type="submit" value="comment">
            </div>
        </form>
        @endauth
        @if (!$comments->isEmpty())
        @foreach ($comments as $comment)
            <div class="full-w h-auto flex-col justify-flex-start align-flex-start border-grey border-radius-30pr padding-2pr">
                @if ($comment->user->id==Auth::id())
                <Button 
                v-on:click="editCommentBoxVisible = true, commentContent='{{$comment->content}}', comment_id='{{ $comment->id }}'" 
                class="a-edit bg-transparent no-border">
                Edit</Button>
                @endif
                <div class="flex-row justify-space-between align-center full-w">
                    <div class="flex-row justify-flex-start align-center w-60">
                        <p class="txt-bold font-2_5vh color-purple margin-right">{{ $comment->user->username }}</p>
                        @if ($comment->user->user_type==1)
                           <p class="no-txt-wrap reviewer-tag border-radius-25px color-white">Reviewer</p>
                        @else
                           <p class="no-txt-wrap game-dev-tag border-radius-25px color-white">Game Dev</p>
                        @endif
                    
                    </div>
                    <p class="margin-left color-grey">Reviewed in {{ $comment->comment_date }}</p>
                </div>
                <div class="w-20 flex-row justify-flex-start align-center">Rating: 
                    <div class="bar-container">
                        <div class="bar" style="width: {{ $comment->rating }}vw"></div>
                    </div>
                    <p class="margin-left">{{ $comment->rating }}</p>
                </div>
                <p class="color-grey">{{ $comment->content }}</p>
                
            </div>
        @endforeach
        
    </div>
    <div v-show="editCommentBoxVisible" class="edit-comment-box-position flex-col justify-center align-center edit-comment-box border-grey">
        <Button v-on:click="editCommentBoxVisible = false" class="close-edit-box color-white txt-bold no-border font-4_5vh">X</Button>
        <h1 class="txt-bold">Edit comment</h1>
        <form method="GET" action="{{ route('comment.editComment') }}">
            <input type="hidden" v-model="comment_id" name="commentId">
            <input v-model="commentContent" class="w-80 no-border border-bottom-purple font-2_5vh padding-1pr" type="text" name="content" placeholder="Edit Comment">
            <input class="btn-purple no-border border-radius-25px margin-top-2-vh h-4vh" type="submit" value="Update">
        </form>
    </div>
    @endif
</div>

<script>
    let app = Vue.createApp({
        data() {
            return {
                commentContent: '',
                editCommentBoxVisible: false,
                comment_id: '',
            }
        }
    })
    app.mount('#commentapp')
</script>
@endsection
