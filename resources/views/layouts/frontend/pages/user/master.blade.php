@extends('layouts.frontend.app')


@section('title')

@endsection


@section('content')

<div class="container margin-top-20">


    <div class="row">


            <div class="col-md-4">
                <div class=" list-group">
                    <a href="" class="list-group-item">
                        <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" class="img rounded-circle" style="width:100px">

                    </a>
                    <a href="{{route('user.dashboard')}}" class="list-group-item {{route('user.dashboard') ? 'active' : ''}}">Dashboard</a>
                    <a href="{{route('user.profile')}}" class="list-group-item">Update Profile</a>
                    <a href="" class="list-group-item">Logout</a>

                </div>
            </div>

        <div class="col-md-8">
            <div class="card card-body">
                @yield('sub-content')
            </div>


        </div>
    </div>
    @yield('scripts')

</div>
    @endsection