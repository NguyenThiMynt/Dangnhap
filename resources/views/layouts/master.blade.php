
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
    <body>
    <nav class="navbar navbar-default" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{URL('\master')}}">Trang chủ</a>
            </div>
            <div class="nav navbar-nav">
                <li><a href="{{route('contents.create')}}">Đăng bài viết</a></li>
            </div>
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav navbar-right">
                    @if(Auth::check())
                        <li><a href="#">Xin chào bạn {{Auth::user()->name}}</a></li>
                        <li><a href="{{route('logout')}}">Logout</a></li>
                    @else
                        <li><a href="{{route('register')}}"><i class="fas fa-user"></i>Sign up</a></li>
                        <li><a href="{{route('login')}}"><span class="glyphicon glyphicon-log-in"></span>Login</a></li>
                    @endif
                </ul>
            </div><!-- /.navbar-collapse -->
        </div>
    </nav>
<div class="container">
    @yield('content')
</div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
    </body>
<html>
