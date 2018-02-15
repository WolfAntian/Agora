@extends('layouts.app')


@section('content')

    <div class="container">
        <h2>Create New Thread In {{$board->name}}</h2>

        <form method="POST" action="/b/{{$board->path}}/t/create">

            <h3>Title</h3>
            <div class="form-group">
                <textarea name="title" class="form-control"></textarea>
            </div>

            <h3>Post</h3>
            <div class="form-group">
                <textarea name="post" class="form-control"></textarea>
            </div>

            <h3>Image Address (e.g. https://i.imgur.com/ZlMqj25.png)</h3>
            <div class="form-group">
                <textarea name="img" class="form-control"></textarea>
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
                <button type="submit" class="btn btn-primary">Create Thread</button>
            </div>
            {{ csrf_field() }}
        </form>

    </div>

@endsection