<nav class="navbar navbar-expand-lg navbar-light bg-light">



        <a class="navbar-brand" href="#">E-commerce</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{route('home')}}">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('products')}}">Products</a>
                </li>

                @foreach(App\Category::latest()->where('parent_id', NULL )->get() as $parent)

                    <li class="nav-item">
                    <a class="nav-link" href=""  data-toggle="collapse">

                        {{str_limit($parent->name)}}
                    </a>
                    </li>


                  @endforeach




            </ul>
            <ul class="navbar-nav ml-auto">
                <li>
                    <a class="nav-link" href="{{ route('carts') }}">

                        <button class="btn btn-danger">
                            <span class="mt-1">Cart</span>
                            <span class="badge badge-warning">
                {{ App\Cart::totalItems() }}
              </span>
                        </button>

                    </a>
                    <form action="{!! route('search')!!}" method="get">
                        <div class="input-group mb-2 ml-lg-3">

                            <input type="text" class="form-control" name="search" aria-label="Text input with dropdown button">

                            <button class="btn "style="background-color:#2471A3; color:white;" type="submit">Search</button>

                        </div>
                    </form>

                </li>


                {{--<div class="col-md-2 col-lg-3  "style=" ">--}}
                    {{--<form action="{!! route('search')!!}" method="get">--}}
                        {{--<div class="input-group mb-2 ml-lg-3">--}}

                            {{--<input type="text" class="form-control" name="search" aria-label="Text input with dropdown button">--}}

                            {{--<button class="btn "style="background-color:#2471A3; color:white;" type="submit">Search</button>--}}

                        {{--</div>--}}
                    {{--</form>--}}
                {{--</div>--}}

                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">

                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>

                            <img src="{{ App\Helpers\ImageHelper::getUserImage(Auth::user()->id) }}" class="img rounded-circle" style="width:40px">


                            {{ Auth::user()->first_name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="nav-link" href="{{ route('user.dashboard') }}">{{ __('Dashboard') }}</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest



            </ul>




        </div>

</nav>
<!-- End Navbar Part -->
