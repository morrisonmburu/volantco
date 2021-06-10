@extends("pages.includes.main")

@section("content")

<!-- .page-title start -->
<div class="page-title-style01 page-title-negative-top pt-bkg0cu">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Services - Consulting Services</h1>

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
                            <a href="/consult_services">Consulting Services</a>
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
                <div class="row">
                    <div class="col-md-5">
                        <img src="/images/img40.jpg" alt=""/>
                    </div><!-- .col-md-4 end -->

                    <div class="col-md-7">
                        <div class="custom-heading">
                            <h2>Consulting Services</h2>
                        </div>

                        <p>
                            volant Ltd Logistics provides Customers with the information, guidance and strategies to implement truly integrated supply chains that deliver bottom line results. See what our customers say Testimonials. This consulting services list will give you an idea of the types of services we provide, from top (strategy) to bottom (implementation)!
                        </p>

                    </div><!-- .col-md-5 end -->
                </div><!-- .row end -->

                <div class="row">
                    <div class="col-md-5">
                        <h3>Efficient supply chain</h3>

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
                        </ul><!-- .fa-ul end -->
                    </div><!-- .col-md-4 end -->

                    <div class="col-md-7 custom-bkg bkg-light-blue">
                        <div class="custom-heading">
                            <h3>your benefits</h3>
                        </div><!-- .custom-heading end -->

                        <ul class="fa-ul">
                            <li>
                                <i class="fa fa-li fa-long-arrow-right"></i>
                                Higher quality service by optimizing transport
                                routes, means of transportation and reducing costs
                            </li>

                            <li>
                                <i class="fa fa-li fa-long-arrow-right"></i>
                                Strong optimized supply chain infrastructure
                                that will make a competitive advantage to your business
                            </li>

                            <li>
                                <i class="fa fa-li fa-long-arrow-right"></i>
                                Synchronized demand and supply which will enable
                                easier and more accurate predictions of your
                                clients needs
                            </li>

                            <li>
                                <i class="fa fa-li fa-long-arrow-right"></i>
                                Effective quality measurement and monitoring
                                will enable you to reduce costs and optimize your business.
                            </li>
                        </ul><!-- .fa-ul end -->
                    </div><!-- .col-md-6 end -->
                </div><!-- .row end -->


            </div><!-- .col-md-9 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content end -->

@endsection
