@extends('admin.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          Order Product
        </div>
        <div class="card-body">
          <table class="table table-hover table-striped" id="dataTable">
              <thead>
              <tr>
                  <th>Order Id</th>
                  <th>Order Name</th>
                  <th>Order Phone No </th>
                  <th>Order Status</th>
                  <th>Action</th>
              </tr>

              </thead>


              <tbody>
              @foreach($orders as $key=> $order)
                  <tr>
                      <td>{{$key + 1}}</td>
                      <td>{{$order->name}}</td>
                      <td>{{$order->phone_no}}</td>
                      <td>
                          <p>
                              @if($order->is_seen_by_admin)

                                  <button type="button" class="btn btn-success btn-sm">Seen</button>

                              @else
                                  <button type="button" class="btn btn-danger btn-sm">UnSeen</button>


                              @endif

                          </p>

                          <p>
                              @if($order->is_paid)

                                  <button type="button" class="btn btn-success btn-sm">Paid</button>

                              @else
                                  <button type="button" class="btn btn-danger btn-sm">Not Paid</button>


                              @endif

                          </p>

                          <p>
                              @if($order->is_completed)

                                  <button type="button" class="btn btn-success btn-sm">Completed</button>

                              @else
                                  <button type="button" class="btn btn-danger btn-sm">Not Completed</button>


                              @endif

                          </p>

                      </td>



                      <td>

                          <a href="{{route('order.show',$order->id)}}" class="btn btn-behance waves-effect">
                              <i class="material-icons">View Order</i>
                          </a>

                      <td>
                          <form class="form-inline" action="{{route('order.delete',$order->id)}}" method="post">
                              @csrf
                              <input type="hidden" name="cart_id" />
                              <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                      </td>
                      </td>
                  </tr>
              @endforeach
              </tbody>

              <tfoot>
              <tr>
                  <th>Order Id</th>
                  <th>Order Name</th>
                  <th>Order Phone No </th>
                  <th>Order Status</th>
                  <th>Action</th>
              </tr>

              </tfoot>

          </table>


        </div>
      </div>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection
