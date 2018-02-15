@extends('layouts.app')


@section('content')

    <div class="container">
        <h2>Edit Thread - {{$thread->title}}</h2>

        <form method="POST" action="/b/{{$thread->board_path}}/t_edit/{{$thread->id}}">

            <h3>Title</h3>
            <div class="form-group">
                <textarea name="title" class="form-control">{{$thread->title}}</textarea>
            </div>

            <h3>Post</h3>
            <div class="form-group">
                <textarea name="post" class="form-control">{{$thread->post}}</textarea>
            </div>

            <h3>Image Address (e.g. https://i.imgur.com/ZlMqj25.png)</h3>
            <div class="form-group">
                <textarea name="img" class="form-control">{{$thread->img}}</textarea>
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

            <div class="form-group" style="float: left; margin-right:10px">
                <button type="submit" class="btn btn-primary">Update Thread</button>
            </div>
            <div class="form-group" style="float: left">
                <button type="submit" name="delete" class="btn btn-danger">Delete Thread</button>
            </div>
            {{ csrf_field() }}
        </form>

    </div>

@endsection