@extends('layouts.master')
@section('title','create')
@Section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Add new content</h3>
            </div>
            @if (session('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            @if(count($errors)>0)
                |<div class="alert alert-danger">
                    <strong>Lỗi:</strong>Đã có lỗi xảy ra vui lòng kiểm tra lại<br>
                    <ul>
                        @foreach($errors->all() as $errors)
                            <li>{{$errors}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form action="{{route('contents.store')}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="col-md-12">
                    <label>Name:</label>
                    <input class="form-control" type="text" name="name" placeholder="Please Enter Name">
                </div>
                <div class="col-md-12">
                    <label>Content:</label>
                    <textarea class="form-control" placeholder="Please Enter content" name="content" rows="8" cols=""></textarea>
                </div>
                <div class="col-md-12">
                    <label>Image_path:</label>
                    <input class="form-control" type="file" name="image_path" placeholder="Please Choose Image">
                </div>
                <div class="col-md-12">
                    <a href="{{route('contents.index')}}" class="btn btn-sm bg-success">Back</a>
                    <button type="submit" class="btn btn-sm bg-primary">Add New</button>
                </div>

            </form>

        </div>
    </div>
@endsection
