@extends('layouts.app')


@section('content')

    <div class="container">
        <h2>Edit Profile</h2>

        <form method="POST" action="/u_edit/{{$user->id}}">

            <h3>Name</h3>
            <div class="form-group">
                <textarea name="name" class="form-control">{{$user->name}}</textarea>
            </div>

            <h3>Image URL</h3>
            <div class="form-group">
                <textarea name="img" class="form-control">{{$user->img}}</textarea>
            </div>

            <h3>Description</h3>
            <div class="form-group">
                <textarea name="description" class="form-control">{{$user->description}}</textarea>
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
                <button type="submit" class="btn btn-primary">Update Profile</button>
            </div>
            {{ csrf_field() }}
        </form>
    </div>

@endsection