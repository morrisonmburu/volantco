@extends("pages.includes.main")

@section("content")

	<div class="wrapper">
    <div class="page-header clear-filter" filter-color="orange">
      <div class="page-header-image" data-parallax="true" style="background-image:url('/images/back.png');">
      </div>
      <div class="container content">
        <div class="row">
        	<div class="col-md-6">
        		<div class="content-center brand">
		          <img class="n-logo rounded" src="/images/logo.jpg" alt="">
		          <h1 class="h1-seo">Volant courier</h1>
		          <h3>24 Hours delivery. Delivery that never stops with time.</h3>
		          <a href="/volantuser/register" class="btn btn-primary btn-round" style="font-size: 20px;" type="button">
			            <i class="now-ui-icons ui-1_check">Get Started</i> 
			        </a>
		        </div>
        	</div>
        	<div class="col-md-6">
        		<div style="background: transparent;" class="section section-images">
        			<div class="container">
		        		<div class="hero-images-container-1">
			               <img src="/images/volant.png" alt="">
			            </div>
		        		<div class="hero-images-container-2">
			               <img src="/images/volant2.jpg" alt="">
			            </div>
			        </div>
			    </div>
        	</div>
        </div>
      </div>
    </div>

@endsection