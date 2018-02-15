@extends('layouts.app')


@section('content')

    <div class="container">
        <small>
            <a href="/b/{{$board->path}}">
                 <i class="fi-arrow-left"></i> {{$board->name}}
            </a>
        </small>
        <div class="content">
            <div class="title m-b-md">
                {{ucwords(trans($thread->title))}}
                @auth
                    @if($user->hasRole('mod') || $user == $thread->user)
                        <a href="/b/{{$board->path}}/t_edit/{{$thread->id}}"><i style="color:lightslategrey" class="fa fa-edit"></i></a>
                    @endif
                @endauth
            </div>
        </div>

        @foreach ($thread->comment as $comment)
            <div class="m-b-md" id="{{$comment->id}}">
                <div class="card card-default">
                    <div class="card-body">
                        @if($loop->first)
                            <img class="small-img" src="{{$thread->img}}">
                        @endif
                        <div class="mdr">{!! nl2br(e($comment->post)) !!}</div>
                    </div>
                    <div class="card-footer">
                        <small>
                            - {{$comment->user->name}}
                            @if($comment->user->hasRole('admin'))
                                <i class="fi-crown" style="color: gold"></i>
                            @elseif($comment->user->hasRole('mod'))
                                <i class="fi-crown" style="color: silver"></i>
                            @endif
                            @if($thread->user == $comment->user)
                                <span class="fi-pencil"></span>
                            @endif
                        </small>
                    </div>
                </div>


            </div>
        @endforeach

        @if(Auth::check())
        <form method="POST" action="/b/{{$board->path}}/t/{{$thread->id}}/c/create">

            <h3>Post</h3>
            <div class="form-group">
                <textarea name="post" class="form-control" id="mde"></textarea>
            </div>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-group">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            {{ csrf_field() }}
        </form>
        @endif
    </div>

@endsection