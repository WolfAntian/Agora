@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="content">
            <div class="title m-b-md">
                {{ucwords(trans($thread->title))}}
            </div>
            <p>{{$thread->post}}</p>
        </div>
    </div>

@endsection