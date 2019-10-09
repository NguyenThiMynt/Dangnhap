@extends('layouts.master')
@section('title','Chi tiết')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h3>Detail Content</h3>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Name : </strong>{{$content->name}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Content : </strong>{{$content->content}}
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <strong>Image_path : </strong>
                    @if(!empty($content['image_path']))
                        <img src="{{ asset('uploads/' . $content['image_path']) }}"
                             width="80px"/>
                        @endif</td>
                </div>
            </div>
            <div class="col-md-12">
                <a href="{{route('contents.index')}}" class="btn btn-sm bg-success">Back</a>
            </div>
        </div>
    </div>
@endsection
