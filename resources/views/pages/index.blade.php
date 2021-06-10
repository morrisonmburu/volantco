@extends("pages.includes.main")

@section("content")

<div id="masterslider" class="master-slider ms-skin-default">
    <!-- first slide -->
    <div class="ms-slide">
        <video data-autopause="false" data-mute="false" data-loop="true" data-fill-mode="fill" class="ms-slide-bgvideo"
               style="left: 0; top:0;">
            <source src="{{ url('/images/front_video.mp4') }}" type="video/mp4">
        </video>
        <img class="ms-layer" src="{{ url('/front/masterslider/blank.gif') }}" data-src="{{ url('/images/theme_color.jfif') }}" alt=""
             style="left: 0; top: 310px;"
             data-type="image" 
             data-effect="left(short)" 
             data-duration="300"
             data-hide-effect="fade" 
             data-delay="0" 
             />
        <h2 class="ms-layer pi-caption01"
             style="left: 0; top: 340px;"
             data-type="text"
             data-effect="left(short)"
             data-duration="300"
             data-hide-effect="fade"
             data-delay="300"
             >
             strongest
         </h2>
         <h2 class="ms-layer pi-caption01"
             style="left: 0; top: 400px;"
             data-type="text"
             data-effect="left(short)"
             data-duration="300"
             data-hide-effect="fade"
             data-delay="600"
             >
             distribution
         </h2>
         <h2 class="ms-layer pi-caption01"
             style="left: 0; top: 460px;"
             data-type="text"
             data-effect="left(short)"
             data-duration="300"
             data-hide-effect="fade"
             data-delay="900"
             >
             network
         </h2>
    </div><!-- .ms-slide end -->
    <!-- slide start -->
    <div class="ms-slide">
        <!-- slide background -->
        <img src="{{ url('/front/masterslider/blank.gif') }}" data-src="{{ url('/images/freight_front.jpg') }}" alt="Worldwide freight services"/>
        <h2 class="ms-layer pi-caption01"
            style="left: 258px; top: 420px;"
            data-type="text"
            data-effect="top(short)"
            data-duration="300"
            data-hide-effect="fade"
            data-delay="0"
            >
            Freight services
        </h2>
        <img class="ms-layer" src="{{ url('/front/masterslider/blank.gif') }}" data-src="{{ url('/images/theme_color.jfif') }}" alt=""
             style="left: 540px; top: 480px;"
             data-type="image"
             data-effect="bottom(short)"
             data-duration="300"
             data-hide-effect="fade"
             data-delay="100"
             />
        <p class="ms-layer pi-text"
           style="left: 278px; top: 500px;"
           data-type="text"
           data-effect="top(short)"
           data-duration="300"
           data-hide-effect="fade"
           data-delay="300"
           >
            By Road. We got it covered!
        </p>
    </div><!-- .ms-slide end -->
    <!-- slide start -->
    <div class="ms-slide">
        <!-- slide background -->
        <img src="{{ url('/front/masterslider/blank.gif') }}" data-src="{{ url('/images/slide01.jpg') }}" alt="Worldwide freight services"/>
        <h2 class="ms-layer pi-caption01" 
            style="left: 388px; top: 390px;" 
            data-type="text" 
            data-effect="top(short)" 
            data-duration="300"
            data-hide-effect="fade" 
            data-delay="00" 
            >
            Trucking
        </h2>
        <img class="ms-layer" src="{{ url('/front/masterslider/blank.gif') }}" data-src="{{ url('/images/theme_color.jfif') }}" alt=""
             style="left: 540px; top: 450px;"
             data-type="image"
             data-effect="bottom(short)"
             data-duration="300"
             data-hide-effect="fade"
             data-delay="100"
             />
             <p class="ms-layer pi-text"
                 style="left: 265px; top: 470px;"
                 data-type="text" 
                 data-effect="top(short)" 
                 data-duration="300"
                 data-hide-effect="fade" 
                 data-delay="600"      
                 >
                 Powerful Transport & Logistics Web Solution
             </p>
    </div><!-- .ms-slide end -->
</div><!-- #masterslider end -->

<div class="page-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8 clearfix">
                <ul class="tabs">
                    <li class="active">
                        <a href="#tab1">about us</a>
                    </li><!-- .active end -->

                    <li>
                        <a href="#tab2">contact information</a>
                    </li>

                    <li>
                        <a href="#tab3">our locations</a>
                    </li>
                </ul><!-- .tabs end -->

                <div class="tab-content-wrap">
                    <div id="tab1" class="tab-content">
                        <img src="{{ url('/images/illustration01.png') }}" alt="" class="float-left"/>

                        <br />

                        <p class="text-big">
                            Welcome, we are volant Ltd, A precise and logical delivery & Logistics Solution
                        </p>

                        <p>
                            ‘Keep up the Momentum’ The Volant unifying theme with  mission to keep Africa on the move.
                        </p>

                        <p>
                            Volant  has a vision to  be a lifestyle app with all supply chain solutions available easily through our smartphone application and website. Our Supply Chain Solutions optimizes logistics networks by providing fully integrated services that include packaging and moves, warehousing & Construction logistics, Cargo and Freight transportation, e-commerce fulfillment, & last mile delivery. Construction Logistics  will be our most popular, unique and anchor service.
                        </p>

                        <a class="read-more" href="/about_us">
                            <span>
                                Read more
                                <i class="fa fa-chevron-right"></i>
                            </span>
                        </a>
                    </div><!-- #tab1.tab-content end -->

                    <div id="tab2" class="tab-content">
                        <img src="{{ url('/images/illustration02.png') }}" alt="" class="float-right"/>

                        <br />

                        <p class="text-big">
                            This is volant Ltd, A precise and logical delivery & Logistics Solution
                        </p>

                        <p>
                            volant Ltd offers a detailed contact Form Where you can freely contact us.
                        </p>

                        <p>
                            Recieve immediate feedback from our customer support team
                        </p>

                        <a class="read-more" href="/contact_us">
                            <span>
                                contact us
                                <i class="fa fa-chevron-right"></i>
                            </span>
                        </a>
                    </div><!-- #tab2.tab-content end -->

                    <div id="tab3" class="tab-content">
                        <img src="{{ url('/images/locations.jpg') }}" alt="" class="float-left"/>

                        <br />

                        <p class="text-big">
                            Unique, reliable and secure - volant Ltd
                        </p>

                        <p>
                            volant Ltd is located at westlands, Nairobi city

                        </p>

                        <p>
                            You can visit our offices or out warehouses anytime,
                        </p>

                        <a class="read-more" href="#">
                            <span>
                                view all locations
                                <i class="fa fa-chevron-right"></i>
                            </span>
                        </a>
                    </div><!-- #tab3.tab-content end -->
                </div><!-- .tab-content-wrap end -->
            </div><!-- .col-md-8 end -->

            <div class="col-md-4 clearfix">

                    <div class="custom-heading">
                        <h2 style="color: #ffffff;">join our team</h2>
                    </div><!-- .custom-heading end -->

                    <div class="promo-box promo-bkg01">
                        <h4 style="color: #ffffff;">Drivers needed</h4>
                        <p style="color: #ffffff; font-weight:bolder;">
                            We are hiring drivers and have multiple opened
                            positions. See what we offer and what we need
                            and apply today!
                        </p>

                        <a href="/driver_application" class="btn btn-medium btn-yellow">
                            <span>apply now</span>
                        </a>
                    </div><!-- .promo-box end -->

            </div><!-- .col-md-4 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content end -->

<div class="page-content parallax parallax01 dark mb-70">
    <div class="container">
        <div class="row">
            <div class="custom-heading02">
                <h2>Our services</h2>
                <p>
                    More than just a logistics company
                </p>
            </div><!-- .custom-heading02 end -->
        </div><!-- .row end -->

        <div class="row mb-30">
            <div class="col-md-6">
                <div class="service-icon-left">
                    <div class="icon-container triggerAnimation animated" data-animate="zoomIn">
                        <img src="{{ url('/front/img/svg/pi-truck-6.svg') }}" alt="checklist icon">
                    </div><!-- .icon-container end -->

                    <div class="service-details">
                        <h3>Metro Deliveries</h3>

                        <p>
                            E-commerce moves fast. At Volant, we can help you keep up no matter the size of your business or whether you are a start-up or Establishes Entreprises.
                        </p>
                    </div><!-- .service-details end -->
                </div><!-- .service-icon-left end -->
            </div><!-- .col-md-6 end -->

            <div class="col-md-6">
                <div class="service-icon-left">
                    <div class="icon-container triggerAnimation animated" data-animate="zoomIn">
                        <img src="{{ url('/front/img/svg/pi-globe-5.svg') }}" alt="globe icon">
                    </div><!-- .icon-container end -->

                    <div class="service-details">
                        <h3>Freight & Cargo</h3>

                        <p>
                            Industry challenges like the driver shortage, capacity constraints, increased freight rates, regulations, and visibility make investing in logistics and supply chain management more expensive and time-consuming.
                        </p>
                    </div><!-- .service-details end -->
                </div><!-- .service-icon-left end -->
            </div><!-- .col-md-6 end -->
        </div><!-- .row.mb-30 end -->

        <div class="row">
            <div class="col-md-6">
                <div class="service-icon-left">
                    <div class="icon-container triggerAnimation animated" data-animate="zoomIn">
                        <img src="{{ url('/front/img/svg/pi-forklift-truck-5.svg') }}" alt="forklift truck icon">
                    </div><!-- .icon-container end -->

                    <div class="service-details">
                        <h3>Packaging & Moves</h3>

                        <p>
                            Volant will consider transparency in pricing, security of the goods by providing a cover and economy moves (move as per your budget) by providing a wider range of the Mover Associates that will be assigned to the client at their budget.
                        </p>
                    </div><!-- .service-details end -->
                </div><!-- .service-icon-left end -->
            </div><!-- .col-md-6 end -->

            <div class="col-md-6">
                <div class="service-icon-left">
                    <div class="icon-container triggerAnimation animated" data-animate="zoomIn">
                        <img src="{{ url('/front/img/svg/pi-touch-desktop.svg') }}" alt="touch icon">
                    </div><!-- .icon-container end -->

                    <div class="service-details">
                        <h3>Construction Logistics</h3>

                        <p>
                            While this model continues to be our flagship service, Volant  is  experimenting the partnership with the existing suppliers, importers, retailers and manufacturers.
                        </p>
                    </div><!-- .service-details end -->
                </div><!-- .service-icon-left end -->
            </div><!-- .col-md-6 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content.parallax end -->

<div class="page-content custom-bkg bkg-grey">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="custom-heading02 simple">
                    <h2>Clients & Awards</h2>
                </div>
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->

        <div class="row">
            <div class="col-md-12">
                <div class="carousel-container">
                    <div id="client-carousel" class="owl-carousel owl-carousel-navigation">
                        <div class="owl-item"><img src="{{ url('/images/part1.jpg') }}" alt=""/></div>
                        <div class="owl-item"><img src="{{ url('/images/part2.jpg') }}" alt=""/></div>
                        <div class="owl-item"><img src="{{ url('/images/part3.jpg') }}" alt=""/></div>
                        <div class="owl-item"><img src="{{ url('/images/part4.jpg') }}" alt=""/></div>
                        <div class="owl-item"><img src="{{ url('/images/part5.jpg') }}" alt=""/></div>
                    </div><!-- .owl-carousel.owl-carousel-navigation end -->
                </div><!-- .carousel-container end -->
            </div><!-- .col-md-12 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content end -->


@endsection
