@extends('layouts.frontend.pages.user.master')


@section('title')

@endsection


@section('sub-content')

    <div class="container margin-top-20">


            <h2>welcome {{$user->first_name .' '. $user->last_name}}</h2>
            <p>You can change your profile and every information here..</p>
        <div class="card">
            <a href="{{route('user.profile')}}">update profile</a>

        </div>


    </div>
@endsection