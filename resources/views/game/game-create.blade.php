@extends('layouts.layout-for-game-details')
@section('bg', 'background-image: linear-gradient(to right, rgba(167,129,255,1) 25%, rgba(176,109,228,1) 50%, rgba(237,212,255,1));')
@section('title', 'Game Details')
@section('banner', 'linear-gradient(to right, rgba(167,129,255,1) 25%, rgba(176,109,228,1) 50%, rgba(237,212,255,1))')
@section('height', '70vh')
@section('banner-content')
    <h1 class="margin-top title">Game Upload</h1>
    <div class="base grid-2col gap-1vh padding-bottom-10vh" id="game_upload">

        <div class="input-area">
            <form method="POST" action="{{ route('game.store') }}" enctype="multipart/form-data">
                @csrf
                <label class="txt-bold font-2_5vh margin-bottom-1vh">Game name:</label><br>
                <input type="text" name="gname" value="{{ old('gname') }}" v-model="game_name"><br>
                <label class="txt-bold font-2_5vh margin-bottom-1vh">Description:</label><br>
                <input type="text" name="des" value="{{ old('des') }}" v-model="description"><br>
                <label class="txt-bold font-2_5vh margin-bottom-1vh">Icon upload:</label><br>
                <input type="file" name="icon_image" value="{{ old('icon_image') }}"><br><br>
                <label class="txt-bold font-2_5vh margin-bottom-1vh">Banner upload:</label><br>
                <input type="file" name="banner_image" value="{{ old('banner_image') }}" @change="onFileChange"><br><br>
                <label class="txt-bold font-2_5vh margin-bottom-1vh">Game images upload:</label><br>
                <input type="file" name="ingame_images[]" multiple value="{{ old('ingame_images[]') }}"><br><br>

                <input class="no-border border-radius-30pr w-60 purple-bg color-white" type="submit" value="Submit">

                @foreach ($errors->all() as $error)
                    <p>{{ $error }}</p><br>
                @endforeach

            </form>
        </div>
        <div class="padding-5pr flex-col justify-flex-start align-center">
            <div class="full-w h-70pr flex-col justify-space-between align-center banner-image-bg"
                v-bind:style="{ backgroundImage: 'url(' + image + ')' }">
                <p class="preview-title color-white font-2_5vh txt-bold">@{{ game_name }}</p>
            </div>
            <p class="txt-bold">Description</p>
            <p class="color-grey">@{{ description }}</p>

        </div>
    </div>


    <script>
        let app = Vue.createApp({
            data() {
                return {
                    game_name: '',
                    description: '',
                    image: '',
                }
            },
            methods: {
                onFileChange(e) {
                    const file = e.target.files[0];
                    this.image = URL.createObjectURL(file);
                }
            }

        })
        app.mount('#game_upload')
    </script>

@endsection
@section('content')





@endsection
