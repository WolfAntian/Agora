@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="content">
            <div class="title m-b-md">
                {{$board->name}}
            </div>
            <div class="center-block">
                {{$board->description}}
            </div>
        </div>

        <div class="row">

        </div>
    </div>
@endsection