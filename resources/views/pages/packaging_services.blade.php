@extends("pages.includes.main")

@section("content")

<!-- .page-title start -->
<div class="page-title-style01 page-title-negative-top pt-bkg0p">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Services - Packaging & Moves</h1>

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
                            <a href="/packaging_services">Packaging & Moves</a>
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

                        <a href="contact-simple.html" class="read-more">
                            <span>
                                Contact us
                                <i class="fa fa-chevron-right"></i>
                            </span>
                        </a>
                    </li><!-- .widget-text end -->
                </ul><!-- .aside-widgets end -->
            </aside><!-- .aside.aside-left end -->

            <div class="col-md-9">
                <img src="/images/img35.jpg" alt=""/>

                <br />

                <div class="custom-heading">
                    <h2>Packaging & Moves</h2>
                </div>

                <p>
                    Specialized Relocation/Movers Solution
                    Volant will consider transparency in pricing, security of the goods by providing a cover and economy moves (move as per your budget) by providing a wider range of the Mover Associates that will be assigned to the client at their budget.
                    Customers will schedule a relocation/move via the app, text, e-mail, or phone; Real-time order tracking with Volant View; Convenient 4-hour delivery window; Automated call-ahead notification to customer 30 minutes prior to the Move; Two-man delivery teams; Convenient pick-up and repackaging of customer returns; and Item placement into any room of the house or business as instructed by the customer.
                </p>
                <br />
                <br />
                <img src="/images/packaging2.jpg" alt=""/>
                <br /><br />
                <div class="table-responsive">
                    <table class="table">
                        <caption>packaging options table</caption>

                        <thead>
                            <tr>
                                <th>package size</th>
                                <th>small</th>
                                <th>medium</th>
                                <th>large</th>
                            </tr>
                        </thead>

                        <tbody>
                            <tr>
                                <td>Package dimensions</td>
                                <td>120 x 150 x 178</td>
                                <td>120 x 150 x 178</td>
                                <td>120 x 150 x 178</td>
                            </tr>

                            <tr>
                                <td>Weight</td>
                                <td>35 kg</td>
                                <td>45kg</td>
                                <td>65kg</td>
                            </tr>

                            <tr>
                                <td>Capacity</td>
                                <td>approx 158 units of textile</td>
                                <td>approx 258 units of textile</td>
                                <td>approx 258 units of textile</td>
                            </tr>
                        </tbody>
                    </table><!-- .table end -->
                </div><!-- .table-responsive end -->
            </div><!-- .col-md-9 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content end -->

@endsection
