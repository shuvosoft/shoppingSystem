@extends('admin.layouts.master')

@section('title','Division')

@push('css')

@endpush

@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    Add Division
                </div>
                <div class="card-body">
                    <form action="{{ route('division.store') }}" method="post" >
                        @csrf

                        {{--@include('backend.partial.messages')--}}
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1"  placeholder="Enter Name">
                        </div>


                        <div class="form-group">
                            <label>Priority</label>
                            <input type="text" name="priority" class="form-control" id="exampleInputEmail1"  placeholder="Enter priority">
                        </div>



                        <button type="submit" class="btn btn-primary">Add Division</button>
                    </form>

                </div>
            </div>


        </div>
    </div>
    <!-- main-panel ends -->

@endsection

@push('js')

@endpush