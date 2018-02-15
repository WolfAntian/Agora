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
                                        - {{$board->user->name}}
                                        @if($board->user->hasRole('admin'))
                                            <i class="fi-crown" style="color: gold"></i>
                                        @elseif($board->user->hasRole('mod'))
                                            <i class="fi-crown" style="color: silver"></i>
                                        @endif
                                    </small>
                                </div>
                            </div>
                        </div>






                    </div>

            @endforeach
        </div>
    </div>

    <a href="/b/{{$board->path}}/t/create" class="btn btn-default btn-circle" id="fixedbutton"><h1><i style="color: lightslategrey" class="fa fa-plus"></i></h1></a>
@endsection