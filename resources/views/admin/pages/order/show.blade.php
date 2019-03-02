@extends('admin.layouts.master')

@section('content')
  <div class="main-panel">
    <div class="content-wrapper">

      <div class="card">
        <div class="card-header">
          View Order {{$order->id}}
        </div>
        <div class="card-body" style="background-color: #06a313">
            <div class="row">
                <div class="col-md-6 border-right">
                    <p><strong>Order Name : </strong>{{$order->name}}</p>
                    <p><strong>Order Phone Number : </strong>{{$order->phone_no}}</p>
                    <p><strong>Order Email : </strong>{{$order->email}}</p>
                    <p><strong>Order Shipping Adderss : </strong>{{$order->shipping_address}}</p>

                </div>
                <div class="col-md-6 ">
                    <p><strong>Order Payment Name : </strong>{{$order->payment->name}}</p>
                    <p><strong>Order Payment transaction : </strong>{{$order->transaction_id}}</p>

                </div>

            </div>



            <hr>


        </div>
      </div>

        <div class="card mt-5">
            <div class=" order " style="background-color: #f1f6ff">

                <div class='container margin-top-20'>
                    <h2>Order Cart Items</h2>
                    @if ($order->carts->count() > 0)
                        <table class="table table-bordered table-stripe">
                            <thead>
                            <tr>
                                <th>No.</th>
                                <th>Product Title</th>
                                <th>Product Image</th>
                                <th>Product Quantity</th>
                                <th>Unit Price</th>
                                <th>Sub total Price</th>
                                <th>
                                    Delete
                                </th>
                            </tr>
                            </thead>
                            <tbody>

                            @php
                                $total_price = 0;
                            @endphp
                            @foreach($order->carts as $cart)


                                <tr>
                                    <td>
                                        {{ $loop->index + 1 }}
                                    </td>

                                    <td>
                                        <a href="{{route('products.show',$cart->product->slug)}}"> {{$cart->product->title}}</a>
                                    </td>
                                    <td>
                                        @if ($cart->product->images->count() > 0)
                                            <img src="{{ asset('images/products/'. $cart->product->images->first()->image) }}" width="60px">
                                        @endif
                                    </td>

                                    <td>
                                        <form class="form-inline" action="{{route('carts.update',$cart->id)}}" method="post">
                                            @csrf
                                            <input type="number" name="product_quantity" class="form-control" value="{{ $cart->product_quantity }}"/>
                                            <button type="submit" class="btn btn-success ml-1">Update</button>
                                        </form>
                                    </td>
                                    <td>
                                        {{ $cart->product->price }} Taka

                                    </td>
                                    <td>
                                        @php
                                            $total_price += $cart->product->price * $cart->product_quantity  ;
                                        @endphp
                                        {{ $cart->product->price * $cart->product_quantity }} Taka
                                    </td>
                                    <td>
                                        <form class="form-inline" action="{{route('carts.delete',$cart->id)}}" method="post">
                                            @csrf
                                            <input type="hidden" name="cart_id" />
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach

                            <tr>
                                <td colspan="4"></td>
                                <td>
                                    Total Amount:
                                </td>
                                <td colspan="2">
                                    <strong>  {{ $total_price }} Taka</strong>
                                </td>
                            </tr>

                            </tbody>

                        </table>
                    @endif
                </div>
            </div>
        </div>

        <form action="{!! route('order.completed', $order->id) !!}" class="form-inline" method="post" >
            {{ csrf_field() }}
            @if($order->is_completed)
                <button type="submit" class="btn btn-danger">Complite Order</button>
                @else
                <button type="submit" class="btn btn-success">Complite Order</button>
            @endif
        </form>
        <form action="{!! route('order.paid', $order->id) !!}"  method="post">
            {{ csrf_field() }}
            @if($order->is_paid)
                <button type="submit" class="btn btn-danger"> Order Paid</button>
                @else
                <button type="submit" class="btn btn-success"> Order Paid</button>
            @endif
        </form>

    </div>
  </div>
  <!-- main-panel ends -->
@endsection
