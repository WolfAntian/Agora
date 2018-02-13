@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="content">
            <div class="title m-b-md">
                {{ucwords(trans($thread->title))}}
            </div>
            <p>{{$thread->post}}</p>
        </div>

        @foreach ($thread->comment as $comment)
            <div class="m-b-md" id="{{$comment->id}}">
                <h3>{{$comment->post}}</h3>
                <small> - {{$comment->user->name}}</small>
            </div>
        @endforeach


        <form method="POST" action="/b/{{$board->path}}/t/{{$thread->id}}/c/create">

            <h3>Post</h3>
            <div class="form-group">
                <textarea name="post" class="form-control"></textarea>
            </div>

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            {{ csrf_field() }}
        </form>
    </div>

@endsection