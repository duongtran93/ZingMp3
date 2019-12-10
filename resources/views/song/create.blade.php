@extends('layouts.app')
@section('content')

    <div class="container">
        <div class="card mt-3">
            <div class="card-header">
                Create Song
            </div>
            <div class="card-body">
                <form method="post" action="{{route('song.store')}}"  enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control" name="name" id="name">
                    </div>
                    <div class="form-group">
                        <label for="description">Description</label>
                        <input type="text" class="form-control" name="description" id="description">
                    </div>
                    <div class="form-group">
                        <label for="image">Image</label>
                        <input type="file" class="form-control" name="image" accept=".png, .jpg, .jpeg">
                    </div>
                    <div class="form-group">
                        <label for="song">Song</label>
                        <input type="file" class="form-control" name="file" >
                    </div>
                    <input value="{{$user_id}}" style="display: none" name="user_id">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection