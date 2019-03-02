
@extends('layouts.frontend.app')

@section('content')

    <!-- Start Sidebar + Content -->
    <div class='container margin-top-20'>
        <div class="row">
            @include('layouts.frontend.partial.sidebar')

            <div class="col-md-8">
                <div class="widget">
                    <h3> All Products in <span class="badge badge-info">{{ $category->name }} Category</span></h3>
                    @php
                        $products = $category->products()->paginate(9);
                    @endphp

                    @if ($products->count() > 0)

                        <div class="row">
                            @foreach($products as $product)

                                <div class="col-md-4">
                                    <div class="mt-5 card">
                                        @php $i = 1; @endphp

                                        @foreach ($product->images as $image)
                                            @if ($i > 0)
                                                <img class="card-img-top feature-img" src="{{ asset('images/products/'. $image->image) }}" alt="Card image" >

                                            @endif

                                            @php $i--; @endphp
                                        @endforeach
                                        <div class="card-body">
                                            <a href="{{route('products.show',$product->slug)}}"><h4 class="card-title">{{$product->title}}</h4></a>
                                            <p class="card-text">Taka - {{$product->price}}</p>


                                            @include('layouts.frontend.partial.cart-button')

                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>

                    @else
                        <div class="alert alert-warning">
                            No Products has added yet in this category !!
                        </div>
                    @endif


                </div>
                <div class="mt-4 pagination">
                    {{$products->links()}}

                </div>
            </div>


        </div>
    </div>

    <!-- End Sidebar + Content -->
@endsection