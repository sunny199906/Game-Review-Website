@extends('layouts.page_for_login_register')
@section('title', 'Register')
@section('type', 'Register')
@section('content')
@if($errors->any())
    @foreach ($errors->all() as $error)
        <p class="error-msg">*{{$error}}</p><br>
    @endforeach
@endif
<form method="POST" action="{{route('register.store')}}">
   @csrf
   <label>User type</label><br>
   <select name="usertype" value="{{old('usertype')}}">
      <option value="1">Reviewer</option>
      <option value="2">Game Developer</option>
   </select><br>
   <label>Username</label><br>
   <input type="text" placeholder="Username" name="username" value="{{old('username')}}"><br>
   <label>Password</label><br>
   <input type="password" placeholder="Password" name="password"><br>
   <label>Confirm Password</label><br>
   <input type="password" placeholder="Confirm password" name="password_confirmation"><br>
   <input type="submit" value="Register" class="submit-button">
</form>
<button class="back-btn" onclick="window.location.href='{{ route('home') }}';">Back to home</button>
@endsection
@section('other-option')

        <p class="other-option-text-col other-option-header">Already have an account?</p>
        <p class="other-option-text-col">Log on to your account and enjoy our website!</p>
        <button class="other-option-btn" onclick="window.location.href='{{ route('login') }}';">login</button>

@endsection