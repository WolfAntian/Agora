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

        @foreach ($thread->comments as $comment)
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
                            <div style="float: left">
                                <span style="padding-right:1em">
                                    - {{$comment->user->name}}
                                    @if($comment->user->hasRole('admin'))
                                        <i class="fi-crown" style="color: gold"></i>
                                    @elseif($comment->user->hasRole('mod'))
                                        <i class="fi-crown" style="color: silver"></i>
                                    @endif
                                    @if($thread->user == $comment->user)
                                        <span class="fi-pencil"></span>
                                    @endif
                                </span>
                                <span style="padding-right:1em">
                                    &commat;{{ str_pad($comment->id,8,'0',STR_PAD_LEFT) }}
                                </span>
                                <span>
                                    @if($currentTime->diffInDays($comment->updated_at))
                                        {{$currentTime->diffInDays($comment->updated_at)}} Days Ago
                                    @elseif($currentTime->diffInHours($comment->updated_at))
                                        {{$currentTime->diffInHours($comment->updated_at)}} Hours Ago
                                    @elseif($currentTime->diffInMinutes($comment->updated_at))
                                        {{$currentTime->diffInMinutes($comment->updated_at)}} Minutes Ago
                                    @else
                                        {{$currentTime->diffInSeconds($comment->updated_at)}} Seconds Ago
                                    @endif
                                            </span>
                            </div>

                            @auth
                                <div style="float: right">
                                    <form method="POST" action="/b/{{$board->path}}/t/{{$thread->id}}/c/{{$comment->id}}/star">
                                        <div class="form-group">
                                            <button type="submit" class="star-submit">
                                                @if($comment->stars()->where('user_id', $user->id)->first() != [])
                                                    <i class="fa fa-star" style="color: gold"></i>
                                                @else
                                                    <i class="far fa-star" style="color: silver;"></i>
                                                @endif
                                            </button>
                                        </div>
                                        {{ csrf_field() }}
                                    </form>
                                </div>
                            @endauth
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