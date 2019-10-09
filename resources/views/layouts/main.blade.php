<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('page_title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.7 -->
    <link rel="stylesheet" href="{{ asset('backend/css/bootstrap.min.css') }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('backend/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/AdminLTE.min.css') }}">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="{{ asset('backend/css/_all-skins.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/css/style.css') }}">
    <!-- Google Font -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini">

{{--nếu đăng nhập rồi mới cho hiển thị--}}
{{--@if(session()->get('admin'))--}}
<div class="wrapper">
{{--HEADER--}}
@include('layouts.header')
<!-- Left side column. contains the logo and sidebar -->
{{--SIDEBAR LEFT--}}
@include('layouts.sidebar-left')
<!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <section class="content-header">
                @if (session()->get('error'))
                    <div class="alert alert-danger" role="alert">
                        {{--nơi hiển thị thông báo lỗi nếu có--}}
                        {{--sau khi thông báo lỗi xong cần xóa session này đi, để tránh việc hiển thị lại sau mỗi lần--}}
                        {{--refresh trang--}}
                        {{ session()->get('error') }}
                        @php(session()->forget('error'))
                    </div>
                @endif
                @if (session()->get('success'))
                    <div class="alert alert-success" role="alert">
                        {{--nơi hiển thị thông báo thành công nếu có--}}
                        {{--sau khi thông báo lỗi xong cần xóa session này đi, để tránh việc hiển thị lại sau mỗi lần--}}
                        {{--refresh trang--}}
                        {{ session()->get('success') }}
                        @php(session()->forget('success'))
                    </div>
                @endif
                <h1>
                    Dashboard
                    <small>Control panel</small>
                </h1>
                <ol class="breadcrumb">
                    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                    <li class="active">Dashboard</li>
                </ol>
            </section>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @yield('content')
        </section>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    @include('backend.layouts.footer')
    {{--@endif--}}
</div>
</body>
</html>

