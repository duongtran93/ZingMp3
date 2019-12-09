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
                        <a href="">Upload</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
