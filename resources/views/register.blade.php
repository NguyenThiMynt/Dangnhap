@extends('layouts.master')
@section('title','')
@section('content')
    <div class="container box">
        <h3 style="text-align:center;">Simple Register System in Laravel</h3>
        @if(session('message'))
            <div class="alert alert-danger">{{session('message')}}</div>
        @endif
        @if(count($errors)>0)
            <div class="alert alert-danger">
                <strong>Lỗi</strong> Đã có lỗi xảy ra vui lòng kiểm tra<br>
                <ul>
                    @foreach($errors->all() as $errors)
                        <li style="color: red;">{{ $errors}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form action="{{route('register')}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <label for="exampleInputusername">Username</label>
                <input type="text" class="form-control" id="exampleInputusername" name="name" placeholder="Username" value="{{old('name')}}">
                {{--            @if($errors->has('email'))--}}
                {{--                <p class="alert alert-danger">{{$errors->first('name')}}</p>--}}
                {{--            @endif--}}
            </div>
            <div class="form-group">
                <label for="exampleInputusername">Email</label>
                <input type="text" class="form-control" id="exampleInputusername" name="email" placeholder="Email" value="{{old('email')}}">
                {{--            @if($errors->has('email'))--}}
                {{--                <p class="alert alert-danger">{{$errors->first('email')}}</p>--}}
                {{--            @endif--}}
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                {{--            @if($errors->has('email'))--}}
                {{--                <p class="alert alert-danger">{{$errors->first('password')}}</p>--}}
                {{--            @endif--}}
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password Confirm</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password_confirm" placeholder="Password">
                {{--            @if($errors->has('email'))--}}
                {{--                <p class="alert alert-danger">{{$errors->first('password_confirm')}}</p>--}}
                {{--            @endif--}}
            </div>
            <button type="submit" class="btn btn-primary" style="margin-left: 250px;">Register</button>
        </form>
    </div>

@endsection
