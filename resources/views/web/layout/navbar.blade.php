<header id="default_header" class="header_style_1">
    <div class="header_top">
        <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="full">
                        <div class="topbar-left">
                            <ul class="list-inline">
                                <li>
                                    <span class="topbar-label"><i class="fa  fa-home"></i></span>
                                    <span class="topbar-hightlight">540 Lorem Ipsum New York, AB 90218</span>
                                </li>
                                <li>
                                    <span class="topbar-label"><i class="fa fa-envelope-o"></i></span>
                                    <span class="topbar-hightlight"><a href="mailto:info@yourdomain.com">info@yourdomain.com</a></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 right_section_header_top">
                    <div class="float-left">
                        <div class="social_icon">
                            <ul class="list-inline">
                                <li><a class="fa fa-facebook" href="https://www.facebook.com/" title="Facebook" target="_blank"></a></li>
                                <li><a class="fa fa-google-plus" href="https://plus.google.com/" title="Google+" target="_blank"></a></li>
                                <li><a class="fa fa-twitter" href="https://twitter.com" title="Twitter" target="_blank"></a></li>
                                <li><a class="fa fa-linkedin" href="https://www.linkedin.com" title="LinkedIn" target="_blank"></a></li>
                                <li><a class="fa fa-instagram" href="https://www.instagram.com" title="Instagram" target="_blank"></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="float-right">
                        <div class="make_appo">
                            <a class="btn white_btn" href="make_appointment.html">Make Appointment</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="header_bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-12 col-sm-12 col-xs-12">
                    <div class="logo">
                        <a href="it_home.html"><img src="{{ asset('assets/images/logos/it_logo.png') }}" alt="logo" /></a>
                    </div>
                </div>
                <div class="col-lg-9 col-md-12 col-sm-12 col-xs-12">
                    <div class="menu_side">
                        <div id="navbar_menu">
                            <ul class="first-ul">
                                <li>
                                    <a class="active" href="{{ url('') }}">Home</a>
                                </li>
                                {{-- <li>
                                    <a href="it_about.html">About Us</a>
                                </li> --}}
                                {{-- <li>
                                    <a href="it_service.html">Service</a>
                                    <ul>
                                        <li><a href="it_service_list.html">Services list</a></li>
                                        <li><a href="it_service_detail.html">Services Detail</a></li>
                                    </ul>
                                </li> --}}
                                <li>
                                    <a href="{{ url('/news') }}">News</a>
                                </li>
                                <li>
                                    <a href="{{ url('/contactus') }}">Contact Us</a>
                                </li>
                                <li>
                                    <a href="{{ url('/aboutus') }}">About Us</a>
                                </li>
                                {{-- <li>
                                    <a href="#">Pages</a>
                                    <ul>
                                        <li><a href="it_career.html">Career</a></li>
                                        <li><a href="it_price.html">Pricing</a></li>
                                        <li><a href="it_faq.html">Faq</a></li>
                                        <li><a href="it_privacy_policy.html">Privacy Policy</a></li>
                                        <li><a href="it_error.html">Error 404</a></li>
                                    </ul>
                                </li> --}}
                                {{-- <li>
                                    <a href="it_shop.html">Shop</a>
                                    <ul>
                                        <li><a href="it_shop.html">Shop List</a></li>
                                        <li><a href="it_shop_detail.html">Shop Detail</a></li>
                                        <li><a href="it_cart.html">Shopping Cart</a></li>
                                        <li><a href="it_checkout.html">Checkout</a></li>
                                    </ul>
                                </li> --}}
                                {{-- <li>
                                    <a href="it_contact.html">Contact</a>
                                    <ul>
                                        <li><a href="it_contact.html">Contact Page 1</a></li>
                                        <li><a href="it_contact_2.html">Contact Page 2</a></li>
                                    </ul>
                                </li> --}}
                            </ul>
                        </div>
                        <div class="search_icon">
                            <ul>
                                <li>
                                    <a href="#" data-toggle="modal" data-target="#search_bar">
                                        <i class="fa fa-search" aria-hidden="true"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
