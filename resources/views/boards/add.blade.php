@extends('layouts.app')


@section('content')

    <div class="container">
        <h2>Create New Board</h2>

        <form method="POST" action="/b/create">

            <h3>Name</h3>
            <div class="form-group">
                <textarea name="name" class="form-control"></textarea>
            </div>

            <h3>Path</h3>
            <div class="form-group">
                <textarea name="path" class="form-control"></textarea>
            </div>

            <h3>Description</h3>
            <div class="form-group">
                <textarea name="description" class="form-control"></textarea>
            </div>


            <div class="form-group">
                <button type="submit" class="btn btn-primary">Create Board</button>
            </div>
            {{ csrf_field() }}
        </form>

    </div>

@endsection