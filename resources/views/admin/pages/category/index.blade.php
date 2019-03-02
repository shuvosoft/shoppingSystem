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
              <th>Category Id</th>
              <th>Category Name</th>
              <th>Parent Category </th>
              <th>Category Image</th>
              <th>Action</th>
            </tr>

              @foreach($categories as $key=> $category)
              <tr>
                <td>{{$key + 1}}</td>
                <td>{{$category->name}}</td>
                <td>
                  @if($category->parent_id == NULL)
                    Primary Category
                    @else
                  {{$category->parent->name}}
                    @endif
                </td>
                  <td>
                      <img src="{{ Storage::disk('public')->url('category/'.$category->image) }}" alt="{{ $category->title }} " width="100">
                  </td>


                <td>
                  <a href="{{ route('category.edit',$category->id) }}" class="btn btn-info waves-effect">
                    <i class="material-icons">edit</i>
                  </a>

                  <a href="#deleteModal{{$category->id}}" data-toggle="modal" class="btn btn-danger">Delete</a>

                  <!-- Delete Modal -->
                  <div class="modal fade" id="deleteModal{{$category->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="exampleModalLongTitle">Are you sure to delete?</h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <form action="{{route('category.destroy',$category->id)}}" method="post">
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
