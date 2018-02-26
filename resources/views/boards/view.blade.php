@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content">
            <div class="title m-b-md">
                {{$board->name}}
                @auth
                    @if($user->hasRole('mod'))
                        <a href="/b_edit/{{$board->path}}"><i style="color:lightslategrey" class="fa fa-edit"></i></a>
                    @endif
                @endauth
            </div>
            <div class="m-b-md">
                {{$board->description}}
            </div>
        </div>

        <div class="row">
            @foreach ($board->threads as $thread)
                @if ($loop->index % 3 == 0 && !$loop->first)
                    </div>
                    <div style="margin-bottom: 30px"></div>
                    <div class="row ">
                @endif
                    <div class="col-md-4 d-flex align-items-stretch">
                        <div class="m-b-md d-flex align-items-stretch" id="{{$thread->id}}">
                            <div class="card card-default card">

                                <div class="card-img-top">
                                    <img style="width: inherit" src="{{$thread->img}}">
                                </div>
                                <div class="card-body">
                                    <h3><a href="/b/{{$board->path}}/t/{{$thread->id}}">{{ucwords(trans(str_limit($thread->title, $limit = 40, $end = '...')))}}</a></h3>
                                </div>
                                <div class="card-footer">
                                    <small>
                                        <div style="float: left">
                                            - {{$thread->user->name}}
                                            @if($thread->user->hasRole('admin'))
                                                <i class="fi-crown" style="color: gold"></i>
                                            @elseif($thread->user->hasRole('mod'))
                                                <i class="fi-crown" style="color: silver"></i>
                                            @endif
                                        </div>

                                        @auth
                                            <div style="float: right">
                                                <form method="POST" action="/b/{{$board->path}}/t/{{$thread->id}}/star">
                                                    <div class="form-group">
                                                        <button type="submit" class="star-submit">
                                                            @if($thread->stars()->where('user_id', $user->id)->first() != [])
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






                    </div>

            @endforeach
        </div>
    </div>
    @auth
        <a href="/b/{{$board->path}}/t/create" class="btn btn-default btn-circle" id="fixedbutton">
            <h1><i style="color: lightslategrey" class="fa fa-plus"></i></h1>
        </a>
    @endauth
@endsection