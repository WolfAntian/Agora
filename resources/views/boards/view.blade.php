@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content">
            <div class="title m-b-md">
                {{$board->name}}
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
                    <div class="row">
                @endif
                    <div class="col-md-4">
                        <h3><a href="/b/{{$board->path}}/t/{{$thread->id}}">{{ucwords(trans($thread->title))}}</a></h3>
                        <small>
                            - {{$board->user->name}}
                            @if($board->user->hasRole('admin'))
                                <i class="fi-crown" style="color: gold"></i>
                            @elseif($board->user->hasRole('mod'))
                                <i class="fi-crown" style="color: silver"></i>
                            @endif
                        </small>
                    </div>

            @endforeach
        </div>
    </div>
@endsection