@extends('layouts.admin_master')

@section('title', 'Edit post')

@section('content')
    <div class="row">
        <div class="col-md-9">
            <h6 class="display-4">Edit post:</h6>
            <hr>
        </div>
        <div class="col-md-9">
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            {!! Form::model($post, ['files' => true, 'route' => ['admin.post.update', $post->id]]) !!}
            <div class="form-group row">
                {{Form::label('title', 'Title', ['class' => 'col-sm-12 col-md-3 col-form-label'])}}
                <div class="col-sm-12 col-md-9">
                    {{ Form::text('title', null, ['class' => 'form-control', 'placeholder' => 'Write a post title']) }}
                </div>
            </div>
            <div class="form-group row">
                {{Form::label('description', 'Description', ['class' => 'col-sm-12 col-md-3 col-form-label'])}}
                <div class="col-sm-12 col-md-9">
                    {{ Form::textarea('description', null, ['class' => 'form-control', 'rows' => '5', 'placeholder' => 'Write a post description']) }}
                </div>
            </div>
            <div class="form-group row">
                {{Form::label('cover_image', 'Upload an image', ['class' => 'col-sm-12 col-md-3 col-form-label'])}}
                <dev class="col-sm-12 col-md-9">
                    <label class="custom-file">
                        {{ Form::file('cover_image', ['class' => 'custom-file-input']) }}
                        <span class="custom-file-control"></span>
                    </label>
                </dev>
            </div>
            <div class="form-group row">
                <div class="offset-3 col-9">
                    <button type="submit" class="btn btn-default">Save</button>
                </div>
            </div>
            {!! Form::close() !!}
        </div>
    </div>
@endsection