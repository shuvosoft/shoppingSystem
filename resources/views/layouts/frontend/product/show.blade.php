@extends('layouts.frontend.app')


@section('title')
    {{$product->title}}|Laravel ecommerce site
@endsection


@section('content')

    <div class="container margin-top-20">
        <div class="row">
            <div class="col-md-4">

                <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
                    <div class="carousel-inner">
                        @php $i=1 @endphp
                        @foreach($product->images as $image)


                        <div class="product-item carousel-item {{$i == 1 ? 'active' : ''}}">
                            <img  src="{!!asset('images/products/'.$image->image)!!}" class="d-block w-100" alt="{{$image->title}}" style="height: 400px">
                        </div>

                            @php
                            $i++
                            @endphp
                        @endforeach

                    </div>
                    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                    </a>
                    <div class="mt-3 ml-4 widget">
                       <p>Category  <span class="badge badge-info">in {{$product->category->name}}</span></p>
                       <p>Brand  <span class="badge badge-info">in {{$product->brand->name}}</span></p>

                    </div>
                </div>

            </div>

            <div class="col-md-8">
                <div class="widget">
                    <h4>{{$product->title}} </h4>
                    <p>{!! $product->description !!}</p>
                    <h3>{{$product->price}} Taka
                    <span class="badge badge-primary">
                        {{$product->quantity < 1 ? 'No item is available ' : $product->quantity.'Item In stock'}}
                    </span>

                    </h3>

                </div>
            </div>
        </div>
    </div>
@endsection