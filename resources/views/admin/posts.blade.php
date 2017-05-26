@extends('layouts.admin_master')

@section('title', 'Posts')

@section('content')
    <div class="row top-header">
        <div class="col-12">
            <p class="text-muted">Your all posts list are given below:</p>
            <hr>
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead class="table-success">
                    <tr>
                        <th>#</th>
                        <th>Title</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Created_at</th>
                        <th>Edit</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($user->posts as $key => $post)
                        <tr>
                            <td>{{++$key}}</td>
                            <td><a href="{{action('PostController@show', ['id' => $post->id])}}">{{$post->title}}</a>
                            </td>
                            <td>{{$post->description}}</td>
                            <td><img class="img-thumbnail img-fluid" src="{{$post->cover_image}}"
                                     alt="Posts related image"></td>
                            <td ata-toggle="tooltip" data-placement="bottom" title="{{$post->created_at->toDayDateTimeString()}}">{{$post->created_at->diffForHumans(\Carbon\Carbon::now())}}</td>
                            <td><a href="{{route('admin.post.edit', ['id' => $post->id])}}">Edit</a></td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection