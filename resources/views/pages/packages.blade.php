@extends("pages.includes.main")

@section("content")

	<div class="wrapper">
    <div class="page-header-2">
    	<div class="page-header-image-2" data-parallax="true" style="background: linear-gradient(-70deg, #2ca8ff 40%, rgba(0, 0, 0, 0) 40%), url('/images/home2.jpg');">
      </div>
      <div class="content">
        <div class="row">
        	<div class="col-md-6"></div>
        	<div class="col-md-6">
        		<div style="margin-bottom: 20px;">
        			<img class="n-logo rounded-circle" style="width: 10em; height: 10em;" src="/images/packages.png" alt="">
        		</div>
        		<h3 class="text-center">Our Packages</h3>
        		<p class="container text-center package" style="width: 450px;">No Haste. Your deliveries in time.
        		Explore amazing packages that suite your business needs.
        		</p>
        	</div>
        </div>
      </div>
    </div>

    <div class="section section-tabs">
        <div class="container">
          <div class="row">
            <div class="col-md-12 ml-auto col-xl-12 mr-auto">
              <p class="category text-center">Packages</p>
              <!-- Tabs with Background on Card -->
              <div class="card">
                <div class="card-header">
                  <ul class="nav nav-tabs nav-tabs-neutral justify-content-center" role="tablist" data-background-color="black">
                    <li class="nav-item">
                      <a class="nav-link active" data-toggle="tab" href="#home1" role="tab">Metro Deliveries</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#profile1" role="tab">Cargo & Freight</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#messages1" role="tab">Packaging & Moves</a>
                    </li>
                    <li class="nav-item">
                      <a class="nav-link" data-toggle="tab" href="#settings1" role="tab">Construction Logistics</a>
                    </li>
                  </ul>
                </div>
                <div class="card-body">
                  <!-- Tab panes -->
                  <div class="tab-content text-center">
                    <div class="tab-pane active" id="home1" role="tabpanel">
                    	<div class="card">
                    		<div class="card-body">
                    			<button class="btn btn-primary btn-icon btn-round pull-left" type="button">
                    				<i class="fa fa-bicycle"></i>
                    			</button>

                    			<div class="row">

                    				<h3 class="pull-left" style="margin-top: 40px;">LIGHT WEIGHT LOADS</h3>

                    				<div class="col-md-12 ml-auto col-xl-12 mr-auto">
                    					<h3 class="pull-left">Bike Delivery:</h3>

                    					<p class="pull-left">Bike delivery for short-distances. This mode saves time especially within CBD. Suitable to cut-on heavy traffic.</p>

                    					<p class="pull-left" style="font-weight: bold;">Amount: <span style="margin-top: 20px;" class="badge badge-pill badge-info text-center">KES 220</span></p>

                    					<p class="pull-right" style="font-weight: bold;">Delivery Time: <span style="margin-top: 20px;" class="badge badge-pill badge-warning text-center">1 Hour</span></p>
                    				</div>
                    			</div>	
                    		</div>
                    	</div>

                    	<div class="card">
                    		<div class="card-body">
                    			<button class="btn btn-primary btn-icon btn-round pull-left" type="button">
                    				<i class="fas fa-shuttle-van"></i>
                    			</button>

                    			<div class="row">

                    				<h3 class="pull-left" style="margin-top: 40px;">MEDIUM WEIGHT LOADS</h3>

                    				<div class="col-md-12 ml-auto col-xl-12 mr-auto">
                    					<h3 class="pull-left">2-tonn Van:</h3>

                    					<p class="pull-left">Lorem ipsum dolor sit amet, id quo eruditi eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui ad.</p>

                    					<p class="pull-left" style="font-weight: bold;">Amount: <span style="margin-top: 20px;" class="badge badge-pill badge-info text-center">KES 520</span></p>

                    					<p class="pull-right" style="font-weight: bold;">Delivery Time: <span style="margin-top: 20px;" class="badge badge-pill badge-warning text-center">2 Hour</span></p>
                    				</div>

                    				<div class="col-md-12 ml-auto col-xl-12 mr-auto">
                    					<h3 class="pull-left">3-tonn Canter:</h3>

                    					<p class="pull-left">Lorem ipsum dolor sit amet, id quo eruditi eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui ad.</p>

                    					<p class="pull-left" style="font-weight: bold;">Amount: <span style="margin-top: 20px;" class="badge badge-pill badge-info text-center">KES 720</span></p>

                    					<p class="pull-right" style="font-weight: bold;">Delivery Time: <span style="margin-top: 20px;" class="badge badge-pill badge-warning text-center">2 Hour</span></p>
                    				</div>
                    			</div>	
                    		</div>
                    	</div>

                    	<div class="card">
                    		<div class="card-body">
                    			<button class="btn btn-primary btn-icon btn-round pull-left" type="button">
                    				<i class="fas fa-truck-moving"></i>
                    			</button>

                    			<div class="row">

                    				<h3 class="pull-left" style="margin-top: 40px;">HEAVY WEIGHT LOADS</h3>

                    				<div class="col-md-12 ml-auto col-xl-12 mr-auto">
                    					<h3 class="pull-left">5-tonn Lorry:</h3>

                    					<p class="pull-left">Lorem ipsum dolor sit amet, id quo eruditi eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui ad.</p>

                    					<p class="pull-left" style="font-weight: bold;">Amount: <span style="margin-top: 20px;" class="badge badge-pill badge-info text-center">KES 1020</span></p>

                    					<p class="pull-right" style="font-weight: bold;">Delivery Time: <span style="margin-top: 20px;" class="badge badge-pill badge-warning text-center">3 Hour</span></p>
                    				</div>

                    				<div class="col-md-12 ml-auto col-xl-12 mr-auto">
                    					<h3 class="pull-left">10-tonn Lorry:</h3>

                    					<p class="pull-left">Lorem ipsum dolor sit amet, id quo eruditi eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui ad.</p>

                    					<p class="pull-left" style="font-weight: bold;">Amount: <span style="margin-top: 20px;" class="badge badge-pill badge-info text-center">KES 1520</span></p>

                    					<p class="pull-right" style="font-weight: bold;">Delivery Time: <span style="margin-top: 20px;" class="badge badge-pill badge-warning text-center">3 Hour</span></p>
                    				</div>

                    				<div class="col-md-12 ml-auto col-xl-12 mr-auto">
                    					<h3 class="pull-left">28-tonn Truck:</h3>

                    					<p class="pull-left">Lorem ipsum dolor sit amet, id quo eruditi eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui ad.</p>

                    					<p class="pull-left" style="font-weight: bold;">Amount: <span style="margin-top: 20px;" class="badge badge-pill badge-info text-center">KES 1720</span></p>

                    					<p class="pull-right" style="font-weight: bold;">Delivery Time: <span style="margin-top: 20px;" class="badge badge-pill badge-warning text-center">4 Hour</span></p>
                    				</div>
                    			</div>	
                    		</div>
                    	</div>
                     
                    </div>
                    <div class="tab-pane" id="profile1" role="tabpanel">
                      <div class="card">
                    		<div class="card-body">
                    			<button class="btn btn-primary btn-icon btn-round pull-left" type="button">
                    				<i class="fas fa-truck-moving"></i>
                    			</button>

                    			<div class="row">

                    				<h3 class="pull-left" style="margin-top: 40px;">UNLIMITED DISTANCE</h3>

                    				<div class="col-md-12 ml-auto col-xl-12 mr-auto">
                    					<h3 class="pull-left">28-tonn Truck:</h3>

                    					<p class="pull-left">Lorem ipsum dolor sit amet, id quo eruditi eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui ad.</p>

                    					<p class="pull-left" style="font-weight: bold;">Amount: <span style="margin-top: 20px;" class="badge badge-pill badge-info text-center">KES 1720</span></p>

                    					<p class="pull-right" style="font-weight: bold;">Delivery Time: <span style="margin-top: 20px;" class="badge badge-pill badge-warning text-center">4 Hour</span></p>
                    				</div>

                    				<div class="col-md-12 ml-auto col-xl-12 mr-auto">
                    					<h3 class="pull-left">10-tonn Truck:</h3>

                    					<p class="pull-left">Lorem ipsum dolor sit amet, id quo eruditi eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui ad.</p>

                    					<p class="pull-left" style="font-weight: bold;">Amount: <span style="margin-top: 20px;" class="badge badge-pill badge-info text-center">KES 1520</span></p>

                    					<p class="pull-right" style="font-weight: bold;">Delivery Time: <span style="margin-top: 20px;" class="badge badge-pill badge-warning text-center">3 Hour</span></p>
                    				</div>

                    				<div class="col-md-12 ml-auto col-xl-12 mr-auto">
                    					<h3 class="pull-left">5-tonn Truck:</h3>

                    					<p class="pull-left">Lorem ipsum dolor sit amet, id quo eruditi eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui ad.</p>

                    					<p class="pull-left" style="font-weight: bold;">Amount: <span style="margin-top: 20px;" class="badge badge-pill badge-info text-center">KES 1020</span></p>

                    					<p class="pull-right" style="font-weight: bold;">Delivery Time: <span style="margin-top: 20px;" class="badge badge-pill badge-warning text-center">3 Hour</span></p>
                    				</div>
                    			</div>	
                    		</div>
                    	</div>
                    </div>
                    <div class="tab-pane" id="messages1" role="tabpanel">
                      <div class="card">
                    		<div class="card-body">
                    			<button class="btn btn-primary btn-icon btn-round pull-left" type="button">
                    				<i class="fas fa-truck-moving"></i>
                    			</button>

                    			<div class="row">

                    				<h3 class="pull-left" style="margin-top: 40px;">UNLIMITED MOVES</h3>

                    				<div class="col-md-12 ml-auto col-xl-12 mr-auto">
                    					<h3 class="pull-left">unlimited:</h3>

                    					<p class="pull-left">Lorem ipsum dolor sit amet, id quo eruditi eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui ad.</p>

                    					<p class="pull-left" style="font-weight: bold;">Amount: <span style="margin-top: 20px;" class="badge badge-pill badge-info text-center">KES 2020</span></p>

                    					<p class="pull-right" style="font-weight: bold;">Delivery Time: <span style="margin-top: 20px;" class="badge badge-pill badge-warning text-center">4 Hour</span></p>
                    				</div>

                    			</div>	
                    		</div>
                    	</div>
                    </div>
                    <div class="tab-pane" id="settings1" role="tabpanel">
                      <div class="card">
                    		<div class="card-body">
                    			<button class="btn btn-primary btn-icon btn-round pull-left" type="button">
                    				<i class="fas fa-truck-moving"></i>
                    			</button>

                    			<div class="row">

                    				<h3 class="pull-left" style="margin-top: 40px;">UNLIMITED MOVES</h3>

                    				<div class="col-md-12 ml-auto col-xl-12 mr-auto">
                    					<h3 class="pull-left">unlimited:</h3>

                    					<p class="pull-left">Lorem ipsum dolor sit amet, id quo eruditi eloquentiam. Assum decore te sed. Elitr scripta ocurreret qui ad.</p>

                    					<p class="pull-left" style="font-weight: bold;">Amount: <span style="margin-top: 20px;" class="badge badge-pill badge-info text-center">KES 2020</span></p>

                    					<p class="pull-right" style="font-weight: bold;">Delivery Time: <span style="margin-top: 20px;" class="badge badge-pill badge-warning text-center">4 Hour</span></p>
                    				</div>

                    			</div>	
                    		</div>
                    	</div>
                    </div>
                  </div>
                </div>
              </div>
              <!-- End Tabs on plain Card -->
            </div>
          </div>
        </div>
      </div>

@endsection