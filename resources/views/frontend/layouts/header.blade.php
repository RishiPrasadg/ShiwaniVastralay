<header class="header shop">
    <!-- Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-12 col-12">
                    <!-- Top Left -->
                    <div class="top-left">
                        <ul class="list-main">
                            @php
                                $settings=DB::table('settings')->get();
                            @endphp
                            <li><i class="ti-headphone-alt"></i>@foreach($settings as $data) {{$data->phone}} @endforeach</li>
                            <li><i class="ti-email"></i> @foreach($settings as $data) {{$data->email}} @endforeach</li>
                        </ul>
                    </div>
                    <!--/ End Top Left -->
                </div>
                <div class="col-lg-6 col-md-12 col-12">
                    <!-- Top Right -->
                    <div class="right-content">
                        <ul class="list-main">
                            @auth 
                                @if(Auth::user()->role=='admin')
                                <li><i class="fa fa-truck"></i> <a href="{{route('order.track')}}">Track Order</a></li>
                                <li><i class="ti-user"></i> <a href="{{route('admin')}}"  target="_blank">Dashboard</a></li>
                                @else 
                                <li><i class="fa fa-truck"></i> <a href="{{route('order.track')}}">Track Order</a></li>
                                <li><i class="ti-user"></i> <a href="{{route('user')}}"  target="_blank">Dashboard</a></li>
                                @endif
                                <li><i class="ti-power-off"></i> <a href="{{route('user.logout')}}">Logout</a></li>
                            @else
                                <li><i class="fa fa-sign-in"></i><a href="{{route('login.form')}}">Login /</a> <a href="{{route('register.form')}}">Register</a></li>
                            @endauth
                        </ul>
                    </div>
                    <!-- End Top Right -->
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->

    <div class="middle-inner">
        <div class="container">
            <div class="row align-items-center"> <!-- Added align-items-center to vertically center -->
                
                <div class="col-lg-2 col-md-3 col-6">
                    <!-- Logo -->
                    <div class="logo">
                        @php
                            $settings=DB::table('settings')->get();
                        @endphp                    
                        <a href="{{route('home')}}"><img src="@foreach($settings as $data) {{$data->logo}} @endforeach" alt="logo"></a>
                    </div>
                    <!--/ End Logo -->
                    <div class="mobile-nav"></div>
                </div>

                <!-- Search bar commented here -->
                <!--
                <div class="col-lg-8 col-md-7 col-12">
                    <div class="search-bar-top">
                        <div class="search-bar">
                            <select>
                                <option>All Category</option>
                                @foreach(Helper::getAllCategory() as $cat)
                                    <option>{{$cat->title}}</option>
                                @endforeach
                            </select>
                            <form method="POST" action="{{route('product.search')}}">
                                @csrf
                                <input name="search" placeholder="Search Products Here....." type="search">
                                <button class="btnn" type="submit"><i class="ti-search"></i></button>
                            </form>
                        </div>
                    </div>
                </div>
                -->
                <!-- End of commented search bar -->

                <div class="col-lg-10 col-md-9 col-6 d-flex justify-content-end">
                    <!-- Wishlist and Cart -->
                    <div class="right-bar d-flex">
                        <!-- Wishlist -->
                        <div class="sinlge-bar shopping mr-3">
                            @php 
                                $total_prod=0;
                                $total_amount=0;
                            @endphp
                            <a href="{{route('wishlist')}}" class="single-icon"><i class="fa fa-heart-o"></i> <span class="total-count">{{Helper::wishlistCount()}}</span></a>
                        </div>

                        <!-- Cart -->
                        <div class="sinlge-bar shopping">
                            <a href="{{route('cart')}}" class="single-icon"><i class="ti-bag"></i> <span class="total-count">{{Helper::cartCount()}}</span></a>
                        </div>
                    </div>
                    <!-- End Wishlist and Cart -->
                </div>

            </div>
        </div>
    </div>

    <!-- Header Inner -->
    <div class="header-inner">
        <div class="container">
            <div class="cat-nav-head">
                <div class="row">
                    <div class="col-lg-12 col-12">
                        <div class="menu-area">
                            <!-- Main Menu -->
                            <nav class="navbar navbar-expand-lg">
                                <div class="navbar-collapse">	
                                    <div class="nav-inner">	
                                        <ul class="nav main-menu menu navbar-nav">
                                            <li class="{{Request::path()=='home' ? 'active' : ''}}"><a href="{{route('home')}}">Home</a></li>
                                            <li class="{{Request::path()=='about-us' ? 'active' : ''}}"><a href="{{route('about-us')}}">About Us</a></li>
                                            <li class="@if(Request::path()=='product-grids'||Request::path()=='product-lists')  active  @endif"><a href="{{route('product-grids')}}">Products</a><span class="new">New</span></li>											
                                                {{Helper::getHeaderCategory()}}
                                            <li class="{{Request::path()=='contact' ? 'active' : ''}}"><a href="{{route('contact')}}">Contact Us</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </nav>
                            <!--/ End Main Menu -->	
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ End Header Inner -->
</header>
