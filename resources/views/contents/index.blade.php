@extends('layouts.master')
@section('title','Danh sách content')
@section('content')
    <div class="container">
{{--        @if($message=Session::get('success'))--}}
{{--            <div class="alert alert-success">--}}
{{--                <p>{{$message}}</p>--}}
{{--            </div>--}}
{{--        @endif--}}
        @if (session('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
        @endif
        <div class="row">
            <div class="col-md-10">
                <h3>list Content</h3>
            </div>
            <div class="col-ms-2">
                <a class="btn btn-sm bg-primary" href="{{route('contents.create')}}">Create New Content</a>
            </div>
        </div>
        <table class="table table-hover text-sm">
            <tr>
                <th>ID</th>
                <th>ID_User</th>
                <th>Name</th>
                <th>Content</th>
                <th>Image_path</th>
                <th width="200px">Acttion</th>
            </tr>
            @foreach($contents as $content)
                <tr>
                    <td ><<b>{{++$i}}</b></td>
                    <td>{{$content->id_user}}</td>
                    <td >{{$content->name}}</td>
                    <td >{{$content->content}}</td>
                    <td >
                        @if(!empty($content['image_path']))
                            <img src="{{ asset('uploads/' . $content['image_path']) }}"
                                 width="80px"/>
                        @endif</td>
                    <td >
{{--                        <form action="{{route('contents.destroy',$content->id)}}" method="post">--}}
                        <form action="#" method="post">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <a class="btn btn-sm bg-success" href="{{route('contents.show',$content->id)}}">Show</a>
                            <a class="btn btn-sm bg-warning" href="{{route('contents.edit',$content->id)}}">Edit</a>
                            <a class="btn btn-sm bg-danger" href="{{route('contents.destroy',$content->id)}}">Delete</a>
                        </form>
                    </td>
                </tr>

                @endforeach
        </table>
        {!! $contents->links() !!}
    </div>
    @endsection
