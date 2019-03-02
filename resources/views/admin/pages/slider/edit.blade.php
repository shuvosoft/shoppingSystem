@extends('admin.layouts.master')

@section('title','Division')

@push('css')

@endpush

@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    Edit Division
                </div>
                <div class="card-body">
                    <form action="{{ route('division.update',$division->id) }}" method="post" >
                        @csrf
                        @method('PUT')

                        {{--@include('backend.partial.messages')--}}
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control" id="exampleInputEmail1" value="{{$division->name}}">
                        </div>


                        <div class="form-group">
                            <label>Priority</label>
                            <input type="text" name="priority" class="form-control" id="exampleInputEmail1" value="{{$division->priority}}">
                        </div>



                        <button type="submit" class="btn btn-success">Update Division</button>
                    </form>

                </div>
            </div>


        </div>
    </div>
    <!-- main-panel ends -->

@endsection

@push('js')

@endpush