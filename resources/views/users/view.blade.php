@extends('layouts.app')


@section('content')

    <div class="container">
        <div class="content">
            <div class="title m-b-md">
                {{ucwords(trans($user->name))}}
                @auth
                    @if($user == Auth::user())
                        <a href="/u_edit/{{$user->id}}"><i style="color:lightslategrey" class="fa fa-edit"></i></a>
                    @endif
                @endauth
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-2"><img style="width:inherit" src="{{$user->img}}"></div>
            <div class="col-md-6">{{$user->description}}</div>
            <div class="col-md-2"></div>
        </div>
    </div>

@endsection