@extends('layouts.master')
@section('title','Sửa thông tin')
@Section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Update content</h3>
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
            <form action="{{route('contents.edit',$content->id)}}" method="post" enctype="multipart/form-data">
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                @method('PUT')
                <div class="col-md-12">
                    <label>Name:</label>
                    <input class="form-control" type="text" name="name" value="{{$content->name}}">
                </div>
                <div class="col-md-12">
                    <label>Content:</label>
                    <textarea class="form-control" name="content" rows="8" cols="80" >{{$content->content}}</textarea>
                </div>
                <div class="col-md-12">
                    <label>Image_path:</label>
                    <input class="form-control" type="file" name="image_path">
                    @if(!empty($content['image_path']))
                        <img src="{{ asset('uploads/' . $content['image_path']) }}"
                             width="80px"/>
                        @endif
                </div>
                <div class="col-md-12">
                    <a href="{{route('contents.index')}}" class="btn btn-sm bg-success">Back</a>
                    <button type="submit" class="btn btn-sm bg-primary">Update</button>
                </div>

            </form>

        </div>
    </div>
@endsection
