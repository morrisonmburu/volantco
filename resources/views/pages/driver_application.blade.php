@extends("pages.includes.main")

@section("content")

<style type="text/css">
        /*.selected {
            background-color: green;
            color: #FFF;
        }*/

        .stepwizard-step p {
            margin-top: 10px;
        }

        .stepwizard-row {
            display: table-row;
        }

        .stepwizard {
            display: table;
            width: 100%;
            position: relative;
        }

        .stepwizard-step button[disabled] {
            opacity: 1 !important;
            filter: alpha(opacity=100) !important;
        }

        .stepwizard-row:before {
            top: 35px;
            bottom: 0;
            position: relative;
            content: " ";
            width: 100%;
            height: 1px;
            background-color: #ccc;
            z-order: 0;

        }

        .stepwizard-step {
            display: table-cell;
            text-align: center;
            position: relative;
        }

        .btn-circle {
            width: 60px;
            height: 60px;
            text-align: center;
            padding: 12px 0;
            font-size: 12px;
            line-height: 1.428571429;
            border-radius: 30px;
        }

        .avatar-wrapper{
            position: relative;
            height: 200px;
            width: 200px;
            margin: 50px auto;
            border-radius: 50%;
            overflow: hidden;
            box-shadow: 1px 1px 15px -5px black;
            transition: all .3s ease;
        }
        .avatar-wrapper:hover{
            transform: scale(1.05);
            cursor: pointer;
        }
        .avatar-wrapper:hover .profile-pic{
            opacity: .5;
        }
        .profile-pic {
            height: 100%;
            width: 100%;
            transition: all .3s ease;
        }
        .profile-pic:after{
            font-family: FontAwesome;
            content: "\f007";
            top: 80px; left: 0;
            width: 100%;
            height: 100%;
            position: absolute;
            font-size: 190px;
            background: #ecf0f1;
            color: #34495e;
            text-align: center;
        }

        .upload-button {
            position: absolute;
            top: 0; left: 0;
            height: 100%;
            width: 100%;
        }
        .upload-button .fa-arrow-circle-up{
            position: absolute;
            font-size: 234px;
            top: -17px;
            left: -17px;
            text-align: center;
            opacity: 0;
            transition: all .3s ease;
            color: #34495e;
        }
        .upload-button:hover .fa-arrow-circle-up{
            opacity: .9;
        }

        #drivers2:hover{
            background-color: #D7DBDD;
        }

        .actions:hover{
            background-color: #D7DBDD;
        }
    </style>

 <!-- .page-title start -->
 <div class="page-title-style01 page-title-negative-top pt-bkg15">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Become a part of our team</h1>

                <div class="breadcrumb-container">
                    <ul class="breadcrumb clearfix">
                        <li>You are here:</li>
                        <li>
                            <a href="/">Home</a>
                        </li>
                        <li>
                            <a href="/about_us">About Us</a>
                        </li>

                        <li>
                            <a href="/driver_application">Driver With Us</a>
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
                            <h3>Company</h3>
                        </div>

                        <ul class="menu">
                            <li class="menu-item">
                                <a href="/about_us">About us</a>
                            </li>

                            <li class="menu-item current-menu-item">
                                <a href="driver_application">Driver With Us</a>
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
                <div class="custom-heading">
                    <h2>want to become our driver?</h2>
                </div>

                <img class="float-right" src="/images/driver_app.jpg" width="360" alt=""/>

                <p>
                    ‘Keep up the Momentum’ The Volant unifying theme with  mission to keep Africa on the move.
                    Volant  has a vision to  be a lifestyle app with all supply chain solutions available easily through our smartphone application and website. Our Supply Chain Solutions optimizes logistics networks by providing fully integrated services that include packaging and moves, warehousing & Construction logistics, Cargo and Freight transportation, e-commerce fulfillment, & last mile delivery. Construction Logistics  will be our most popular, unique and anchor service.
                </p>

                <br />

                <div class="custom-heading">
                    <h2>Driver With Us</h2>
                </div><!-- .custom-heading end -->

                <form class="wpcf7 driver-app-form clearfix" id="driver_app" data-parsley-validate="">

                    <div class="row">
                        <span class="col-md-12" style="color: #ffffff; background-color:#C0392B;">
                            Drivers Personal Information
                        </span>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Name</label>
                                        <input  maxlength="100" type="text" required class="form-control" placeholder="Name" name="Name" id="Name"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                    <label class="control-label">Phone Number</label>
                                    <input type="text" data-country="KE" maxlength="15" placeholder="Phone Number" name="phoneNumber" class="form-control" id="phoneNumber"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">Email Address</label>
                                        <input  maxlength="100" type="text" required class="form-control" placeholder="Email Address" name="email_address" id="email_address"/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label class="control-label">License Number</label>
                                        <input  maxlength="100" type="text" required class="form-control" placeholder="License Number" name="license" id="license"/>
                                    </div> 
                                </div>
                                         
                                </div>
                            </div>

                    </div>

                    <div class="row">
                        <span class="col-md-12" style="color: #ffffff; background-color:#C0392B;">
                            Drivers Additional Information
                        </span>

                        <div class="row">

                                <div class="col-md-12">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Vehicle Type</label>
                                            <select maxlength="100" type="text" required class="form-control" placeholder="Vehicle Type" name="v_type" id="v-type">
                                                <option id="ve-type"></option>
                                                <option>Classic</option>
                                                <option>Business</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Model</label>
                                            <input type="text" name="Model" id="model" data-country="KE" maxlength="100" placeholder="Model" class="form-control" name="model">
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Color</label>
                                            <input  maxlength="100" type="text" required class="form-control" placeholder="Color" id="color" name="color" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Plate Number</label>
                                            <input  maxlength="100" type="text" required class="form-control" placeholder="Plate Number" id="plate-no" name="plate_no" />
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Production Year</label>
                                            <input  maxlength="100" type="text" required class="form-control" placeholder="Production Year" name="p_year" id="p-year"/>
                                        </div>
                                    </div>
                                      
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Board Number</label>
                                            <input  maxlength="100" type="text" required class="form-control" placeholder="Board Number" name="boardNo" id="boardNo"/>
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="control-label">Number of passanger seats</label>
                                            <select maxlength="100" type="text" required class="form-control" placeholder="Number of passanger seats" id="p-number" name="p_number">
                                                <option id="pa-number"></option>
                                                <?php for ($i=0; $i <= 50; $i++): ?>
                                                <option>{{ $i }}</option>
                                                <?php endfor; ?>
                                            </select>
                                            <input type="hidden" name="id" id="id_number">
                                        </div>
                                    </div>

                                </div>
                            </div>

                    </div>

                    <input type="submit" class="wpcf7-submit" id="driver_app_submit" value="apply now">
                </form><!-- .wpcf7 end -->
            </div><!-- .col-md-9 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content end -->

@endsection
