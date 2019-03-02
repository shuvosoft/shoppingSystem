<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
        <li class="nav-item nav-profile">
            <div class="nav-link">
                <div class="profile-image"> <img src="/images/faces/face4.jpg" alt="image"/> <span class="online-status online"></span> </div>
                <div class="profile-name">
                    <p class="name">Richard V.Welsh</p>
                    <p class="designation">Manager</p>
                    <div class="badge badge-teal mx-auto mt-3">Online</div>
                </div>
            </div>
        </li>


        <li class="nav-item {{ Request::is('admin*') ? 'active' : '' }}"><a class="nav-link" href="{{route('admin.index')}}">
                <img class="menu-icon" src="{{asset('images/menu_icons/01.png')}}" alt="menu icon"><span class="menu-title">Dashboard</span></a>

        </li>



        {{-- Manage all product --}}


        <li class="nav-item {{ Request::is('admin/products') ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#general-pages" aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="{{asset('images/menu_icons/01.png')}}">
                <span class="menu-title" >MANAGE ALL PRODUCTS </span><i class="menu-arrow"></i>
            </a>

            <div class="collapse" id="general-pages">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{route('admin.products')}}">
                            <img class="menu-icon" src="/images/menu_icons/01.png" alt="menu icon"><span class="menu-title">Product Pages</span></a>

                    </li>

                    <li class="nav-item"><a class="nav-link" href="{{route('admin.product.create')}}">
                            <img class="menu-icon" src="/images/menu_icons/01.png" alt="menu icon"><span class="menu-title">Create Product</span></a>

                    </li>
                </ul>
            </div>
        </li>

        {{-- Manage all Category --}}

        <li class="nav-item {{ Request::is('category/category') ? 'active' : '' }}">
            <a class="nav-link" data-toggle="collapse" href="#general-pages1" aria-expanded="false" aria-controls="general-pages"> <img class="menu-icon" src="{{asset('images/menu_icons/01.png')}}">
                <span class="menu-title" >MANAGE ALL CATEGORY </span><i class="menu-arrow"></i>
            </a>

            <div class="collapse" id="general-pages1">
                <ul class="nav flex-column sub-menu">
                    <li class="nav-item"><a class="nav-link" href="{{route('category.index')}}">
                            <img class="menu-icon" src="{{asset('images/menu_icons/01.png')}}" alt="menu icon"><span class="menu-title">All Category</span></a>

                    </li>
                    <li class="nav-item"><a class="nav-link" href="{{route('category.create')}}">
                            <img class="menu-icon" src="{{asset('images/menu_icons/01.png')}}" alt="menu icon"><span class="menu-title">Create Category</span></a>

                    </li>


                </ul>
            </div>
        </li>










        <li class="nav-item"><a class="nav-link" href="{{route('brand.index')}}">
                <img class="menu-icon" src="{{asset('images/menu_icons/01.png')}}" alt="menu icon"><span class="menu-title">All Brand</span></a>

        </li>

        <li class="nav-item"><a class="nav-link" href="{{route('brand.create')}}">
                <img class="menu-icon" src="{{asset('images/menu_icons/01.png')}}" alt="menu icon"><span class="menu-title">Create Brand</span></a>

        </li>

        <li class="nav-item"><a class="nav-link" href="{{route('order.index')}}">
                <img class="menu-icon" src="{{asset('images/menu_icons/01.png')}}" alt="menu icon"><span class="menu-title">Product Order</span></a>

        </li>

        <li class="nav-item"><a class="nav-link" href="{{route('division.index')}}">
                <img class="menu-icon" src="{{asset('images/menu_icons/01.png')}}" alt="menu icon"><span class="menu-title">All Division</span></a>

        </li>

        <li class="nav-item"><a class="nav-link" href="{{route('division.create')}}">
                <img class="menu-icon" src="{{asset('images/menu_icons/01.png')}}" alt="menu icon"><span class="menu-title">Create Division</span></a>

        </li>

        <li class="nav-item"><a class="nav-link" href="{{route('district.index')}}">
                <img class="menu-icon" src="{{asset('images/menu_icons/01.png')}}" alt="menu icon"><span class="menu-title">All District</span></a>

        </li>

        <li class="nav-item"><a class="nav-link" href="{{route('district.create')}}">
                <img class="menu-icon" src="{{asset('images/menu_icons/01.png')}}" alt="menu icon"><span class="menu-title">Create District</span></a>

        </li>

        <li class="nav-item"><a class="nav-link" href="{{route('slider.index')}}">
                <img class="menu-icon" src="{{asset('images/menu_icons/01.png')}}" alt="menu icon"><span class="menu-title">ALL SLIDERS</span></a>

        </li>



        <li class="nav-item">
            <a class="nav-link"  href="#district-pages">
                <form class="form-inline" action="{{ route('admin.logout') }}" method="post">
                    @csrf
                    <input type="submit" value="Logout Now" class="btn btn-danger">
                </form>
            </a>

        </li>


    </ul>
</nav>