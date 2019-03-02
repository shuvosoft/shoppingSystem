@extends('admin.layouts.master')

@section('title','Division')

@push('css')

@endpush

@section('content')

    <div class="main-panel">
        <div class="content-wrapper">
            <div class="card">
                <div class="card-header">
                    Manage Slider
                </div>


                <div class="container">

                    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ADD SLIDER</button>

                    <!-- Modal -->
                    <div class="modal fade" id="myModal" role="dialog">
                        <div class="modal-dialog">

                            <!-- Modal content-->
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Add new Slider</h4>
                                    <button type="button" class="close" data-dismiss="modal">&times;</button>

                                </div>
                                <div class="card-body">
                                    <form action="{{ route('slider.store') }}" method="post" enctype="multipart/form-data">
                                        @csrf

                                        {{--@include('backend.partial.messages')--}}
                                        <div class="form-group">
                                            <label>Slider Title</label>
                                            <input type="text" name="title" class="form-control" id="exampleInputEmail1"  placeholder="Enter Title">
                                        </div>

                                        <div class="form-group">
                                            <label>Slider Image</label>
                                            <input type="file" name="image" class="form-control" id="exampleInputEmail1"  placeholder="Enter Image">
                                        </div>


                                        <div class="form-group">
                                            <label>Slider Button Text</label>
                                            <input type="text" name="button_text" class="form-control" id="exampleInputEmail1"  placeholder="Enter button text">
                                        </div>

                                        <div class="form-group">
                                            <label>Slider Button Link</label>
                                            <input type="url" name="button_link" class="form-control" id="exampleInputEmail1"  placeholder="Enter button Link">
                                        </div>

                                        <div class="form-group">
                                            <label>Priority</label>
                                            <input type="number" name="priority" class="form-control" id="exampleInputEmail1" value="10"  placeholder="Enter priority">
                                        </div>



                                        <button type="submit" class="btn btn-primary">Add Slider</button>
                                    </form>

                                </div>

                            </div>

                        </div>
                    </div>

                </div>


                <div class="card-body">
                    {{--@include('backend.partial.messages')--}}
                    <table class="table table-hover table-striped">
                        <tr>
                            <th>#</th>
                            <th>Slider Title</th>
                            <th>Slider Image</th>
                            <th>Slider Priority</th>

                            <th>Action</th>
                        </tr>
                        @foreach ($sliders as $slider)
                            <tr>
                                <td>#</td>
                                <td>{{$slider->title}}</td>
                                <td>
                                    <img src="{{ Storage::disk('public')->url('slider/'.$slider->image) }}" alt="{{ $slider->title }} " width="100">
                                </td>
                                <td>
                                    {{$slider->priority}}
                                </td>



                                <td><a href="{{ route('slider.edit',$slider->id) }}" class="btn btn-success">Edit</a>
                                    <a href="#deleteModal{{$slider->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>

                                    <!-- Delete Modal -->
                                    <div class="modal fade" id="deleteModal{{$slider->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Are you sure to delete?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="#" method="post">
                                                        {{csrf_field()}}
                                                        <button type="subnit" class="btn btn-danger">Permanent Delete</button>

                                                    </form>

                                                </div>
                                                <div class="modal-footer">

                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </td>
                            </tr>
                        @endforeach

                    </table>


                </div>
            </div>


        </div>
    </div>
    <!-- main-panel ends -->
@endsection

@push('js')

@endpush