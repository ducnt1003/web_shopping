<!-- Start Top Header Bar -->
<section class="top-header">
    <div class="container">
        <div class="row">
            <div class="col-md-4 col-xs-12 col-sm-4">
                <div class="contact-number">
                    <i class="tf-ion-ios-telephone"></i>
                    <span>0129- 12323-123123</span>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-4">
                <!-- Site Logo -->
                <div class="logo text-center">
                    <a href="{{route('home')}}">
                        <!-- replace logo here -->
                        <svg width="135px" height="29px" viewBox="0 0 155 29" version="1.1" xmlns="http://www.w3.org/2000/svg"
                             xmlns:xlink="http://www.w3.org/1999/xlink">
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd" font-size="40"
                               font-family="AustinBold, Austin" font-weight="bold">
                                <g id="Group" transform="translate(-108.000000, -297.000000)" fill="#000000">
                                    <text id="AVIATO">
                                        <tspan x="108.94" y="325">RHUST</tspan>
                                    </text>
                                </g>
                            </g>
                        </svg>
                    </a>
                </div>
            </div>
            <div class="col-md-4 col-xs-12 col-sm-4">
                
                <!-- Cart -->
                <ul class="top-menu text-right list-inline">
                
                    @include('cart')
                    
                    <!-- Languages -->
                    <li class="commonSelect">
                        <select class="form-control">
                            <option>EN</option>
                            <option>VI</option>
                        </select>
                    </li><!-- / Languages -->
                    @if(Auth::User())
                    <?php $customer = \App\Models\Customer::where('id',Auth::user()->id )->first()?>
                
                    <div >Hi {{$customer->name}} ,
                    <a  href="{{ route('logout') }}">Log out</a>
                    </div>
                    @endif

                </ul><!-- / .nav .navbar-nav .navbar-right -->
            </div>
        </div>
    </div>
</section><!-- End Top Header Bar -->


<!-- Main Menu Section -->
<section class="menu">
    <nav class="navbar navigation">
        <div class="container">
            <div class="navbar-header">
                <h2 class="menu-title">Main Menu</h2>
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                        aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div><!-- / .navbar-header -->

            <!-- Navbar Links -->
            <div id="navbar" class="navbar-collapse collapse text-center">
                <ul class="nav navbar-nav">

                    <!-- Home -->
                    <li class="dropdown ">
                        <a href="{{route('home')}}">Home</a>
                    </li><!-- / Home -->

                    <!-- Elements -->
                    <li class="dropdown dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
                           role="button" aria-haspopup="true" aria-expanded="false">Shop <span
                                class="tf-ion-ios-arrow-down"></span></a>
                        <div class="dropdown-menu">
                                <!-- Basic -->
                                <div>
                                    <ul>
                                        <li><a href="{{route('shop')}}">All Product</a></li>
                                        {!! \App\Helpers\Helper::categories($categories) !!}
                                    </ul>
                                </div>
                            </div><!-- / .row -->
                    </li><!-- / Elements -->


                    <li class="dropdown dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
                           role="button" aria-haspopup="true" aria-expanded="false">Carts<span
                                class="tf-ion-ios-arrow-down"></span></a>
                        <div class="dropdown-menu">
                            <!-- Basic -->
                            <div>
                                <ul>
                                    <li><a href="{{route('checkout')}}">Checkout</a></li>
                                    <li><a href="{{route('cart')}}">Cart</a></li>
                                </ul>
                            </div>
                        </div><!-- / .row -->
                    </li><!-- / Elements -->


                    <li class="dropdown dropdown-slide">
                        <a href="#!" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-delay="350"
                           role="button" aria-haspopup="true" aria-expanded="false">Pages <span
                                class="tf-ion-ios-arrow-down"></span></a>
                        <div class="dropdown-menu">
                            <div class="row">

                                <!-- Basic -->
                                <div class="col-lg-6 col-md-6 mb-sm-3">
                                    <ul>
                                        <li class="dropdown-header">Introduction</li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="{{route('contact')}}">Contact Us</a></li>
                                        <li><a href="{{route('about')}}">About Us</a></li>

                                    </ul>
                                </div>

                                <!-- Layout -->
                                <div class="col-lg-6 col-md-6 mb-sm-3">
                                    <ul>
                                        <li class="dropdown-header">Utility</li>
                                        <li role="separator" class="divider"></li>
                                        <li><a href="{{route('login')}}">Login</a></li>
                                        <li><a href="{{route('register')}}">Register</a></li>

                                    </ul>
                                </div>

                            </div><!-- / .row -->
                        </div><!-- / .dropdown-menu -->
                    </li><!-- / Elements -->

                </ul><!-- / .nav .navbar-nav -->

            </div>
            <!--/.navbar-collapse -->
        </div><!-- / .container -->
    </nav>
</section>
