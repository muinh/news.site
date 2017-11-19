<?php
$settings = DB::table('styling')->get();
$backgroundColor = $settings->first()->background_color;
//?>

<!doctype html>
<html>
<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.css">
    <link rel="stylesheet" href="/news.site/public/css/style.css">
    <title>@yield('title')</title>
</head>
<body style="background-color: {{ $backgroundColor }}">
    <div class="container">
        @include('includes.header')
        @yield('content')
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script src="/news.site/public/js/script.js"></script>
    </div>
    <div id="bg_popup">
        <div id="popup">
            <a  id="setCookie" class="close" href="#" title="Close" onclick="document.getElementById('bg_popup').style.display='none'; return false;">X</a>
            <h1>Sign up for the newsletter!</h1>
            <p><input type="email">Email</p>
            <p><input type="text">Full name</p>
        </div>
    </div>
</body>
</html>
