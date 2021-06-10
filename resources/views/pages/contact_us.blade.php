@extends("pages.includes.main")

@section("content")

<!-- .page-title start -->
<div class="page-title-style01 page-title-negative-top pt-bkg08">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Contact us</h1>

                <div class="breadcrumb-container">
                    <ul class="breadcrumb clearfix">
                        <li>You are here:</li>
                        <li>
                            <a href="/contact_us">Contact Us</a>
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
            <div class="col-md-6">
                <div class="custom-heading">
                    <h3>your inquiry</h3>
                </div><!-- .custom-heading.left end -->

                <p>
                    Fill the following form to contuct us
                </p>

                <br />

                <!-- .contact form start -->
                <form class="wpcf7 clearfix" id="contact-form">
                    <fieldset>
                        <label>
                            <span class="required">*</span> Your request:
                        </label>

                        <select class="wpcf7-form-control-wrap wpcf7-select" id="contact-inquiry">
                            <option></option>
                            <option value="I need an offer for Metro deliveries">I need an offer for Metro deliveries</option>
                            <option value="I need an offer for Freight & Cargo">I need an offer for Freight & Cargo</option>
                            <option value="I need an offer for Packaging & Moves">I need an offer for Packaging & Moves</option>
                            <option value="I need an offer for Construction Logistics">I need an offer for Construction Logistics</option>
                            <option value="I want to become your partner">I want to become your partner</option>
                            <option value="I have some other request">I have some other request</option>
                        </select>
                        <span id="error-contact-inquiry" style="color:red;"></span>
                    </fieldset>

                    <fieldset>
                        <label>
                            <span class="required">*</span> First Name:
                        </label>

                        <input type="text" class="wpcf7-text" id="contact-name">
                        <span id="error-contact-name" style="color:red;"></span>
                    </fieldset>

                    <fieldset>
                        <label>
                            <span class="required">*</span> Last Name:
                        </label>

                        <input type="text" class="wpcf7-text" id="contact-last-name">
                        <span id="error-contact-last-name" style="color:red;"></span>
                    </fieldset>

                    <fieldset>
                        <label>
                            <span class="required">*</span> Email:
                        </label>

                        <input type="email" class="wpcf7-text" id="contact-email">
                        <span id="error-contact-email" style="color:red;"></span>
                    </fieldset>

                    <fieldset>
                        <label>
                            <span class="required">*</span> Message:
                        </label>

                        <textarea rows="8" class="wpcf7-textarea" id="contact-message"></textarea>
                        <span id="error-contact-message" style="color:red;"></span>
                    </fieldset>

                    <input type="submit" class="wpcf7-submit" id="contact-form-submit" value="send" />
                </form><!-- .wpcf7 end -->
            </div><!-- .col-md-6 end -->

            <div class="col-md-6">

                <div class="custom-heading">
                    <h4>company information</h4>
                </div><!-- .custom-heading end -->

                <address>
                    123 Westlands, <br />
                    Nairobi, Kenya
                </address>

                <span class="text-big colored">
                    +254 111 933 647
                </span>
                <br />

                <a href="mailto:">info@volantco.net</a>
            </div><!-- .col-md-6 end -->
        </div><!-- .row end -->
    </div><!-- .container end -->
</div><!-- .page-content end -->

@endsection
