@extends('admin.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Add Product
        </div>
        <div class="card-body">
          <table class="table table-hover table-striped">
            <tr>
              <th>Brand Id</th>
              <th>Brand Name</th>
              <th>Brand Description</th>
              <th>Brand Image</th>
              <th>Action</th>
            </tr>

              @foreach($brands as $key=> $brand)
              <tr>
                <td>{{$key + 1}}</td>
                <td>{{$brand->name}}</td>
                <td>{{$brand->description}}</td>
                <td>{{$brand->image}}</td>

                  <td>
                      <img src="{{ Storage::disk('public')->url('brand/'.$brand->image) }}" alt="{{ $brand->title }} " width="100">
                  </td>


                <td>
                  <a href="{{ route('brand.edit',$brand->id) }}" class="btn btn-info waves-effect">
                    <i class="material-icons">edit</i>
                  </a>

                  <a href="#deleteModal{{$brand->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>

                  <!-- Delete Modal -->
                  <div class="modal fade" id="deleteModal{{$brand->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Are you sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{route('brand.destroy',$brand->id)}}" method="post">
                            {{csrf_field()}}
                            @method('DELETE')
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
