@extends('admin.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Add Category
        </div>
        <div class="card-body">
          <form action="{{route('brand.store')}}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            @include('admin.partials.messages')


            <div class="form-group">
              <label for="exampleInputEmail1">Brand Name</label>
              <input type="text" class="form-control" name="name" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Title">
            </div>



            <div class="form-group">
              <label for="exampleInputPassword1">Description</label>
              <textarea name="description" rows="8" cols="80" class="form-control"></textarea>

            </div>

            <div class="form-group">
              <label for="product_image">Brand Image</label>

              <div class="row">
                <div class="col-md-4">
                  <input type="file" class="form-control" name="image" id="image" >
                </div>

              </div>
            </div>

            <button type="submit" class="btn btn-primary">Add Brand</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection
