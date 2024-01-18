<!DOCTYPE html>
<html>
<head>
   <link href="{{ asset('css/login_and_register_page.css') }}" rel="stylesheet">
   <title>Game Review - @yield('title')</title>
   
</head>
<body>
    <div id="bg">
       <div class="body-container flex-box-row">
          <div class="flex-element flex-element-box">
            <h1 class="type">@yield('type')</h1>
            @yield('content')
          </div>
          <div class="flex-element flex-element-box second-box-bg">
             @yield('other-option')
          </div>
       </div>
    </div>
</body>
</html>