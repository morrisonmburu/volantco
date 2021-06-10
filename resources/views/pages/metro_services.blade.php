@extends("pages.includes.main")

@section("content")

<!-- .page-title start -->
<div class="page-title-style01 page-title-negative-top pt-bkg04">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Services - Metro Deliveries</h1>

                <div class="breadcrumb-container">
                    <ul class="breadcrumb clearfix">
                        <li>You are here:</li>
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <li>
                            <a href="#">Services</a>
                        </li>

                        <li>
                            <a href="/metro_deliveries">Metro Deliveries</a>
                        </li>
                    </ul><!-- .breadcrumb end -->
                </div><!-- .breadcrumb-container end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-title-style01.page-title-negative-top end -->


<div class="page-content">
    <div class="container">
        <div class="row">
            <aside class="col-md-3 aside aside-left">
                <ul class="aside-widgets">
                    <li class="widget widget_nav_menu clearfix">
                        <div class="title">
                            <h3>services</h3>
                        </div>

                        <ul class="menu">
                            <li class="{{ (Route::is('metro_services') ? 'menu-item current-menu-item' : 'menu-item') }}">
                                <a href="/metro_services">Metro Deliveries</a>
                            </li>

                            <li class="{{ (Route::is('freight_services') ? 'menu-item current-menu-item' : 'menu-item') }}">
                                <a href="/freight_services">Freight & Cargo</a>
                            </li>

                            <li class="{{ (Route::is('packaging_services') ? 'menu-item current-menu-item' : 'menu-item') }}">
                                <a href="/packaging_services">Packaging & Moves</a>
                            </li>

                            <li class="{{ (Route::is('construction_services') ? 'menu-item current-menu-item' : 'menu-item') }}">
                                <a href="/construction_services">Construction Logistics</a>
                            </li>

                            <li class="{{ (Route::is('consult_services') ? 'menu-item current-menu-item' : 'menu-item') }}">
                                <a href="/consult_services">Consulting services</a>
                            </li>
                        </ul><!-- .menu end -->
                    </li><!-- .widget.widget_nav_menu end -->

                    <!-- .widget.widget-text start -->
                    <li class="widget widget-text">
                        <div class="title">
                            <h3>contact us</h3>
                        </div>

                        <img src="/images/locations2.jpg" alt="contact us"/>

                        <br />

                        <p>
                            Let us know what can we do for you. Contact
                            us today!
                        </p>

                        <a href="/contact_us" class="read-more">
                            <span>
                                Contact us
                                <i class="fa fa-chevron-right"></i>
                            </span>
                        </a>
                    </li><!-- .widget-text end -->
                </ul><!-- .aside-widgets end -->
            </aside><!-- .aside.aside-left end -->

            <div class="col-md-9">
                <img src="/images/img27.jpg" alt=""/>

                <br />

                <div class="custom-heading">
                    <h2>Metro Deliveries</h2>
                </div>

                <p>
                    E-commerce moves fast. At Volant, we can help you keep up no matter the size of your business or whether you are a start-up or Establishes Entreprises. We’ve built a best-in-class network made up of strategically placed fulfillment centers, advanced technology, and a fleet of trusted carriers(Associates) . And, thanks to highly developed processes, we do it with unmatched accuracy, reliability, and network visibility.
                    Our last mile logistics solution for individuals, businesses and shippers of big and bulky products includes home delivery and a network of carriers throughout the Nairobi Metropolitan Region.
                </p>

                <br />

                <br />

                <h3>Your benefits</h3>

                <br />

                <img class="float-right" width="360" src="/images/slide_3.jpg" alt=""/>

                <ul class="fa-ul">
                    <li>
                        <i class="fa fa-li fa-long-arrow-right"></i>
                        Providing high quality transportation services to all of our clients
                    </li>

                    <li>
                        <i class="fa fa-li fa-long-arrow-right"></i>
                        Invest in our employees to provide better service and company growth
                    </li>

                    <li>
                        <i class="fa fa-li fa-long-arrow-right"></i>
                        Worry about enviroment according to latest industry standards
                    </li>

                    <li>
                        <i class="fa fa-li fa-long-arrow-right"></i>
                        Safety as top priority in assuring safe work procedures
                    </li>

                    <li>
                        <i class="fa fa-li fa-long-arrow-right"></i>
                        Investing in technology to provide fast, acurate and cost-effective service
                    </li>

                    <li>
                        <i class="fa fa-li fa-long-arrow-right"></i>
                        Living up to highest industry standards
                    </li>
                </ul><!-- .fa-ul end -->

                <br />
                <br />

                <div class="custom-heading">
                    <h3>industries covered</h3>
                </div><!-- .custom-heading end -->

                <ul class="service-list-big-icons clearfix">
                    <li>
                        <div class="icon-container">
                            <img src="/front/img/svg/pi-cargo-retail.svg" alt="retail svg icon"/>
                        </div>

                        <h4>Textile Logistics</h4>
                    </li>

                    <li>
                        <div class="icon-container">
                            <img src="/front/img/svg/pi-food-beverage.svg" alt="food and beverage svg icon"/>
                        </div>

                        <h4>Retail Logistics</h4>
                    </li>

                </ul><!-- .service-list-big-icons end -->
            </div><!-- .col-md-9 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content end -->

@endsection
