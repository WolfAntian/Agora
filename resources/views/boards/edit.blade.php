@extends('layouts.app')

@section('content')

    <div class="container">
        <h1>Edit the Board</h1>

        <form method="POST" action="/b_edit/{{ $board->id }}">

            <h3>Name</h3>
            <div class="form-group">
                <textarea name="name" class="form-control">{{$board->name}}</textarea>
            </div>

            <h3>Path</h3>
            <div class="form-group">
                <textarea name="path" class="form-control">{{$board->path}}</textarea>
            </div>

            <h3>Description</h3>
            <div class="form-group">
                <textarea name="description" class="form-control">{{$board->description}}</textarea>
            </div>

            <div class="form-group" style="float: left; margin-right:10px">
                <button type="submit" name="update" class="btn btn-primary">Update Board</button>
            </div>
            <div class="form-group" style="float: left">
                <button type="submit" name="delete" class="btn btn-danger">Delete Board</button>
            </div>
            {{ csrf_field() }}
        </form>

    </div>

@endsection