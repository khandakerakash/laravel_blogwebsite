@extends('layouts.master')

@section('title', 'Post')


@section('content')
    <div class="post-show-section">
        <div class="row d-flex justify-content-center">
            <div class="col-md-8 col-sm-12">
                <div class="panel panel-white post panel-shadow">
                    <div class="post-heading">
                        <div class="pull-left image">
                            <img class="img-circle avatar" src="{{$post->cover_image}}"
                                 alt="Posts related image">
                        </div>
                        <div class="pull-left meta">
                            <div class="title h5">
                                <a href="#"><b>{{$post->user->name }}</b></a>
                                made a post.
                            </div>
                            <h6 class="text-muted time" data-toggle="tooltip" data-placement="bottom" title="{{$post->created_at->toDayDateTimeString()}}">{{$post->created_at->diffForHumans(\Carbon\Carbon::now())}}</h6>
                        </div>
                    </div>
                    <div class="post-description">
                        <p>{{$post->description}}</p>
                        <div class="stats">
                            <a href="#" class="btn btn-default stat-item">
                                <i class="fa fa-thumbs-up icon"></i>2
                            </a>
                            <a href="#" class="btn btn-default stat-item">
                                <i class="fa fa-share icon"></i>12
                            </a>
                        </div>
                    </div>
                    <div class="post-footer">
                        <ul class="comments-list">
                            <li class="comment">
                                <a class="pull-left" href="#">
                                    <img class="avatar" src="http://bootdey.com/img/Content/user_1.jpg" alt="avatar">
                                </a>
                                <div class="comment-body">
                                    @foreach($post->comments as $comment)
                                        <div class="comment-heading">
                                            <h4 class="user">{{$comment->user->name}}</h4></p>
                                            <h5 class="time" data-toggle="tooltip" data-placement="bottom" title="{{$comment->created_at->toDayDateTimeString()}}">{{$comment->created_at->diffForHumans(\Carbon\Carbon::now())}}</h5>
                                        </div>
                                        <p>{{$comment->description}}</p>
                                    @endforeach
                                </div>
                            </li>
                        </ul>
                        @if(Auth::check())
                            {!! Form::open(['url' => 'comments']) !!}
                            <div class="input-group">
                                {{ Form::text('description', null, ['class' => 'form-control', 'placeholder' => 'Add a comment']) }}
                                {{ Form::hidden('post_id', $post->id)}}
                                <span class="input-group-addon">
                                    <a href="#"><i class="fa fa-edit"></i></a>
                                </span>
                            </div>
                            {!! Form::close() !!}
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
