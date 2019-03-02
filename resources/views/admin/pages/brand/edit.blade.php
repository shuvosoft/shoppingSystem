@extends('admin.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Add Brand
        </div>
        <div class="card-body">
          <form action="{{route('brand.update',$brand->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @include('admin.partials.messages')

            <div class="form-group">
              <label for="exampleInputEmail1">Brand Name</label>
              <input type="text" class="form-control" name="name" id="exampleInputEmail1" value="{{$brand->name}}" placeholder="Enter name">
            </div>


            <div class="form-group">
              <label for="exampleInputPassword1">Description</label>
              <textarea name="description" rows="8" cols="80" class="form-control">{{$brand->description}}</textarea>

            </div>

            <div class="form-group">
              <label for="product_image">Category old Image</label><br>
              <img src="{{ Storage::disk('public')->url('brand/'.$brand->image) }}" alt="{{ $brand->title }} " width="100"><br><br>

              <div class="row">
                <div class="col-md-4">
                  <label for="product_image">Brand New Image</label><br>
                  <input type="file" class="form-control" name="image" id="image" >
                </div>

              </div>
            </div>

            <button type="submit" class="btn btn-primary">update Brand</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection
