@extends('layouts.master')

@section('title', 'Posts')


@section('content')
    <div class="row top-header">
        <div class="col-12">
            <h6 class="display-4">All posts list are given below:</h6>
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
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($posts as $key => $post)
                        <tr>
                            <td>{{++$key}}</td>
                            <td><a href="{{action('PostController@show', ['id' => $post->id])}}">{{$post->title}}</a>
                            </td>
                            <td>{{$post->description}}</td>
                            <td><img class="img-thumbnail img-fluid" src="{{$post->cover_image}}"
                                     alt="Posts related image"></td>
                            <td>{{$post->created_at}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </div>
@endsection


