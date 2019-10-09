@extends('layouts.master')
@section('title','')
@section('content')
    <div class="container box">
        <h3 style="text-align:center;">Simple login System in Laravel</h3>
        <legend>Login</legend>
        @if($errors->has('errorlogin'))
            <div class="alert alert-danger">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{$errors->first('errorlogin')}}
            </div>
        @endif
        <form action="{{route('login')}}" method="post" enctype="multipart/form-data">
            <input type="hidden" name="_token" value="{{csrf_token()}}">
            <div class="form-group">
                <label for="exampleInputusername">Email</label>
                <input type="text" class="form-control" id="exampleInputusername" name="email" placeholder="Email">
                @if($errors->has('email'))
                    <p style="color:red">{{$errors->first('email')}}</p>
                @endif
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1" name="password" placeholder="Password">
                @if($errors->has('password'))
                    <p style="color:red">{{$errors->first('password')}}</p>
                @endif
            </div>
            <button type="submit" class="btn btn-primary" style="margin-left: 250px;">Login</button>
        </form>
    </div>
@endsection

