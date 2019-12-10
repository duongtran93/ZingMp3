@extends('layouts.app')
@section('content')
    <div class="user-profile-top-menu">
        <div class="wrap">
            <div class="content-wrap">
                <ul>
                    <li>
                        <a href="{{ route('welcome') }}" class="active">
                            <img class="icon-home" src="{{ asset('storage/images/home.png') }}" alt="">
                        </a>
                    </li>
                    <li>
                        <a href="">Playlist</a>
                    </li>
                    <li>
                        <a href="{{ route('song.create') }}">Upload</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container mt-3">
        <div class="card mb-3 " style="max-width: 540px"  >
            <div class="row no-gutters">
                <div class="col-md-4">
                    <img src="{{asset('storage/images/user3.png')}}" style="width: 100px" class="mt-3 m-md-3">
                </div>
                <div class="col-md-8">
                    <div class="card-body">
                        <h5 class="card-title">Thông tin chi tiết :</h5>
                        <p class="card-text"> Name : {{ Auth::user()->name }}</p>
                        <p class="card-text"> Email : {{ Auth::user()->email}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
