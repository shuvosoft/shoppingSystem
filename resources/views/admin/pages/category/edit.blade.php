@extends('admin.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Add Category
        </div>
        <div class="card-body">
          <form action="{{route('category.update',$category->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            @include('admin.partials.messages')

            <div class="form-group">
              <label for="exampleInputEmail1">Category Name</label>
              <input type="text" class="form-control" name="name" id="exampleInputEmail1" value="{{$category->name}}" placeholder="Enter name">
            </div>

            <div class="form-group">
              <label for="exampleInputPassword1">Parent Category</label>
              <select class="form-control" name="parent_id">

                @foreach($main_categories as $cat)

                  <option value="{{$cat->id}}" {{$cat->id == $category->parent_id ? 'selected' : ''}} >

                    {{$cat->name}}
                  </option>
                  @endforeach

              </select>


            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Description</label>
              <textarea name="description" rows="8" cols="80" class="form-control"></textarea>

            </div>

            <div class="form-group">
              <label for="product_image">Category old Image</label><br>
              <img src="{{ Storage::disk('public')->url('category/'.$category->image) }}" alt="{{ $category->title }} " width="100"><br><br>

              <div class="row">
                <div class="col-md-4">
                  <label for="product_image">Category New Image</label><br>
                  <input type="file" class="form-control" name="image" id="image" >
                </div>

              </div>
            </div>

            <button type="submit" class="btn btn-primary">update Category</button>
          </form>
        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection
