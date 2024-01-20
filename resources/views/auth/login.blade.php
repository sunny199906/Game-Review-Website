@extends('layouts.page_for_login_register')
@section('title', 'Login')
@section('type', 'Login')
@section('content')


    <form method="POST" action="{{route('login.auth')}}">
        @csrf
        <label>Username</label><br>
        <input type="text" name="username" placeholder="Username" value="{{old('username')}}"><br>
        <label>Password</label><br>
        <input type="password" name="password" placeholder="Password"><br>
        <input type="submit" value="Login" class="submit-button">
    </form>

    <button class="back-btn" onclick="window.location.href='{{ route('home') }}';">Back to home</button>


@endsection
@section('other-option')
        <h1 class="other-option-text-col other-option-header">First time using this website?</h1>
        <p class="other-option-text-col">Register an account to unlock more functionalities!</p>
        <button class="other-option-btn" onclick="window.location.href='{{ route('register') }}';">register an account</button>


@endsection