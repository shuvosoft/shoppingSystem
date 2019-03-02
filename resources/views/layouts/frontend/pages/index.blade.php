
@extends('layouts.frontend.app')

@section('content')


    <div class="slider">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach($sliders as $slider)
                    <li data-target="#carouselExampleIndicators" data-slide-to="{{$loop->index}}" class="{{$loop->index == 0? 'active' : ''}}"></li>

                @endforeach

            </ol>
            <div class="carousel-inner">
                @foreach($sliders as $slider)
                    <div class="carousel-item {{$loop->index == 0? 'active' : ''}}">
                        <img src="{{ Storage::disk('public')->url('slider/'.$slider->image) }}" alt="{{ $slider->title }}" class="d-block w-100" alt="...">
                    </div>
                    <div class="carousel-caption d-none d-md-block">
                        <h5>{{$slider->title}}</h5>

                       @if($slider->button_text)
                           <p>
                               <a href="{{$slider->button_link}}" target="_blank" class="btn " style="background-color: #8DC461">
                                   {{$slider->button_text}}
                               </a>
                           </p>
                           @endif

                    </div>


                @endforeach


            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>

    </div>


<!-- Start Sidebar + Content -->
<div class='container margin-top-20'>
    <div class="row">




        @include('layouts.frontend.partial.sidebar')

        <div class="col-md-8">
            <div class="widget">
                <h3>Featured Products</h3>
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
                                <div class="front card-body ">
                                    <a href="{{route('products.show',$product->slug)}}"><h4 class="card-title">{{str_limit($product->title,'30')}}</h4></a>
                                    <p class="card-text">Taka - {{$product->price}}</p>
                                    @include('layouts.frontend.partial.cart-button')
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
            <div class="mt-4 pagination">
                {{$products->links()}}

            </div>
        </div>


    </div>
</div>
@yield('scripts')
<!-- End Sidebar + Content -->
@endsection