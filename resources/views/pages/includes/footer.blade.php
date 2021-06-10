
        <div id="footer-wrapper" class="footer-dark">
            <footer id="footer">
                <div class="container">
                    <div class="row">
                        <ul class="col-md-3 col-sm-6 footer-widget-container clearfix">
                            <!-- .widget.widget_text -->
                            <li class="widget widget_newsletterwidget">
                                <div class="title">
                                    <h3>newsletter subscribe</h3>
                                </div>

                                <p>
                                    Subscribe to our newsletter and we will
                                    inform you about newest projects and promotions.
                                </p>

                                <br />

                                <form class="newsletter">
                                    <input class="email" type="email" placeholder="Your email...">
                                    <input type="submit" class="submit" value="">
                                </form>
                            </li><!-- .widget.widget_newsletterwidget end -->
                        </ul><!-- .col-md-3.footer-widget-container end -->

                        <ul class="col-md-3 col-sm-6 footer-widget-container">
                            <!-- .widget-pages start -->
                            <li class="widget widget_pages">
                                <div class="title">
                                    <h3>quick links</h3>
                                </div>

                                <ul>
                                    <li><a href="/about_us">About us</a></li>
                                    <li><a href="/driver_application">Driver With Us</a></li>
                                </ul>
                            </li><!-- .widget-pages end -->
                        </ul><!-- .col-md-3.footer-widget-container end -->

                        <ul class="col-md-3 col-sm-6 footer-widget-container">
                            <!-- .widget-pages start -->
                            <li class="widget widget_pages">
                                <div class="title">
                                    <h3>Industry solutions</h3>
                                </div>

                                <ul>
                                    <li><a href="/metro_services">Metro Deliveries</a></li>
                                    <li><a href="/freight_services">Freight & Cargo</a></li>
                                    <li><a href="/packaging_services">Packaging & Moves</a></li>
                                    <li><a href="/construction_services">Construction Logistics</a></li>
                                    <li><a href="/consult_services">Consulting services</a></li>
                                </ul>
                            </li><!-- .widget-pages end -->
                        </ul><!-- .col-md-3.footer-widget-container end -->

                        <ul class="col-md-3 col-sm-6 footer-widget-container">
                            <li class="widget widget-text">
                                <div class="title">
                                    <h3>contact us</h3>
                                </div>

                                <address>
                                    00100 Westlands, <br />
                                    Nairobi, Kenya
                                </address>

                                <span class="text-big">
                                    +254 111 933 647
                                </span>
                                <br />

                                <a href="mailto:">info@volantco.net</a>
                                <br />
                                <ul class="footer-social-icons">
                                    <li><a href="#" class="fa fa-facebook"></a></li>
                                    <li><a href="#" class="fa fa-twitter"></a></li>
                                    <li><a href="#" class="fa fa-google-plus"></a></li>
                                </ul><!-- .footer-social-icons end -->
                            </li><!-- .widget.widget-text end -->
                        </ul><!-- .col-md-3.footer-widget-container end -->
                    </div><!-- .row end -->
                </div><!-- .container end -->
            </footer><!-- #footer end -->

            <div class="copyright-container">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <p>VOLANT LTD 2020. All RIGHTS RESERVED.</p>
                        </div><!-- .col-md-6 end -->

                        <div class="col-md-6">
                            <p class="align-right">DESIGNED AND DEVELOPED BY <a href="www.pixel-industry.com">OBSPACE AFRICA.</a></p>
                        </div><!-- .col-md-6 end -->
                    </div><!-- .row end -->
                </div><!-- .container end -->
            </div><!-- .copyright-container end -->

            <a href="#" class="scroll-up">Scroll</a>
        </div><!-- #footer-wrapper end -->

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script><!-- jQuery library -->
        <script src="/front/js/bootstrap.min.js"></script><!-- .bootstrap script -->
        <script src="/front/js/jquery.srcipts.min.js"></script><!-- modernizr, retina, stellar for parallax -->
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
        <script src="/front/owl-carousel/owl.carousel.min.js"></script><!-- Carousels script -->
        <script src="/front/masterslider/masterslider.min.js"></script><!-- Master slider main js -->
        <script src="/front/js/jquery.dlmenu.min.js"></script><!-- for responsive menu -->
        <script src="/front/js/include.js"></script><!-- custom js functions -->

        <script>
            /* <![CDATA[ */
            jQuery(document).ready(function ($) {
                'use strict';
                // MASTER SLIDER START
                var slider = new MasterSlider();
                slider.setup('masterslider', {
                    width: 1140, // slider standard width
                    height: 854, // slider standard height
                    space: 0,
                    speed: 50,
                    layout: "fullwidth",
                    centerControls: false,
                    loop: true,
                    autoplay: false
                            // more slider options goes here...
                            // check slider options section in documentation for more options.
                });
                // adds Arrows navigation control to the slider.
                slider.control('arrows');

                $('#client-carousel').owlCarousel({
                    items: 6,
                    loop: true,
                    margin: 30,
                    responsiveClass: true,
                    mouseDrag: true,
                    dots: false,
                    responsive: {
                        0: {
                            items: 2,
                            nav: true,
                            loop: true,
                            autoplay: true,
                            autoplayTimeout: 3000,
                            autoplayHoverPause: true,
                            responsiveClass: true
                        },
                        600: {
                            items: 3,
                            nav: true,
                            loop: true,
                            autoplay: true,
                            autoplayTimeout: 3000,
                            autoplayHoverPause: true,
                            responsiveClass: true
                        },
                        1000: {
                            items: 6,
                            nav: true,
                            loop: true,
                            autoplay: true,
                            autoplayTimeout: 3000,
                            autoplayHoverPause: true,
                            responsiveClass: true,
                            mouseDrag: true
                        }
                    }
                });
            });
            /* ]]> */
        </script>
        <script>
        /* <![CDATA[ */

            $('#driver_app #driver_app_submit').on('click', function (event) {
                event.preventDefault();

                var Name =  $("#Name").val()
                var phoneNumber =   $("#phoneNumber").val()
                var email_address = $("#email_address").val()
                var license =   $("#license").val()
                var v_type =    $('option:selected', '#v-type').val()
                var model = $("#model").val()
                var color = $("#color").val()
                var plate_no =  $("#plate-no").val()
                var p_year =    $("#p-year").val()
                var boardNo =   $("#boardNo").val()
                var p_number =  $('option:selected', '#p-number').val()               

                jQuery.ajax({
                    url:'{{ route("addDriver.front") }}',
                    method:"POST",
                    data:{ Name: Name, phoneNumber: phoneNumber, email_address: email_address, license: license, v_type: v_type, model: model, color: color, plate_no: plate_no, p_year: p_year, boardNo:boardNo, p_number: p_number, _token: '{{csrf_token()}}'},
                    success:function(result)
                    {
                        swal('Driver'+result, "has been updated successfully!", "success").then(function(){ 
                            window.location.reload()
                        }
                        );
                    },
                    error : function(){alert("Something Went Wrong.");},
                });

            }); // ONLINE DRIVER APPLICATION  SUBMIT END
        /* ]]> */

        $('#contact-form #contact-form-submit').on('click', function (event) {
                event.preventDefault();

                var contact_inquiry = $('#contact-inquiry').val();
                if(contact_inquiry == ""){
                    $("#error-contact-inquiry").text("Field is required");
                }

                var contact_name = $('#contact-name').val();
                if(contact_name == ""){
                    $("#error-contact-name").text("Field is required");
                }

                var contact_last_name = $('#contact-last-name').val();
                if(contact_last_name == ""){
                    $("#error-contact-last-name").text("Field is required");
                }

                var contact_email = $('#contact-email').val();
                if(contact_email == ""){
                    $("#error-contact-email").text("Field is required");
                }

                var contact_message = $('#contact-message').val();
                if(contact_message == ""){
                    $("#error-contact-message").text("Field is required");
                }

                $.ajax({
                    type: 'POST',
                    url: "{{ route("contact") }}",
                    data: ({'action': 'driverApp', 'contact_inquiry': contact_inquiry, 'contact_name': contact_name, 'contact_last_name': contact_last_name, 'contact_email': contact_email, 'contact_message': contact_message,  _token: '{{csrf_token()}}'}),
                    success:function(result)
                    {
                            swal('Message', "has been successfully Sent To the Admin, Regards Volant Ltd!", "success").then(function(){ 
                                window.location = "https://volantco.net/";
                            }
                        );
                    },
                    error : function(){alert("Something Went Wrong.");},
                });


        });
        </script>
    </body>
</html>
