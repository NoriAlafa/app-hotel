<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Deluxe - Free Bootstrap 4 Template by Colorlib</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="https://fonts.googleapis.com/css?family=Poppins:200,300,400,500,600,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700,700i" rel="stylesheet">

    <link rel="stylesheet" href="<?=base_url('css/open-iconic-bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('css/animate.css')?>">
    
    <link rel="stylesheet" href="<?=base_url('css/owl.carousel.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('css/owl.theme.default.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('css/magnific-popup.css')?>">

    <link rel="stylesheet" href="<?=base_url('css/aos.css')?>">

    <link rel="stylesheet" href="<?=base_url('css/ionicons.min.css')?>">

    <link rel="stylesheet" href="<?=base_url('css/bootstrap-datepicker.css')?>">
    <link rel="stylesheet" href="<?=base_url('css/jquery.timepicker.css')?>">

    
    <link rel="stylesheet" href="<?=base_url('css/flaticon.css')?>">
    <link rel="stylesheet" href="<?=base_url('css/icomoon.css')?>">
    <link rel="stylesheet" href="<?=base_url('css/style.css')?>">
  </head>
  <body>

    
       <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="index.html">Deluxe</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="index.html" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="rooms.html" class="nav-link">Rooms</a></li>
	          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="contact.html" class="nav-link">Contact</a></li>
	          <li class="nav-item"><a href="<?=base_url('/login')?>" class="nav-link">Login</a></li>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <div class="hero-wrap" style="background-image: url('images/bg_1.jpg');">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
          	<div class="text">
	            <h1 class="mb-4 bread">Room Single</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

    
    <section class="ftco-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">
          	<div class="row">
          		<div class="col-md-12 ftco-animate">
          			<h2 class="mb-4">Family Room</h2>
          			<div class="single-slider owl-carousel">
          				<div class="item">
          					<div class="room-img" style="background-image: url(images/room-1.jpg);"></div>
          				</div>
          				<div class="item">
          					<div class="room-img" style="background-image: url(images/room-2.jpg);"></div>
          				</div>
          				<div class="item">
          					<div class="room-img" style="background-image: url(images/room-3.jpg);"></div>
          				</div>
          			</div>
          		</div>

          	</div>
          </div> <!-- .col-md-8 -->
          <div class="col-lg-4 sidebar ftco-animate"> 
            <div class="sidebar-box ftco-animate">
              <div class="categories">
                <h3>FASILITAS</h3>
                <li>WiFi</li>
                <li>SPA</li>
                <li>Kolam Renang</li>
                <li>Bar</li>
                <li>Bebas Rokok </li>
                <li>Layanan Front Office 24jam</li>
              </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row justify-content-center">
        <div class="col-md-6">
    				<form action="#" class="booking-form">
	        		<div class="row">
	        			<div class="col-md-3 d-flex">
	        				<div class="form-group p-4 align-self-stretch d-flex align-items-end">
	        					<div class="wrap">
				    					<label for="#">Check-in Date</label>
				    					<input type="text" class="form-control checkin_date" placeholder="Check-in date">
			    					</div>
			    				</div>
	        			</div>
	        			<div class="col-md-3 d-flex">
	        				<div class="form-group p-4 align-self-stretch d-flex align-items-end">
	        					<div class="wrap">
				    					<label for="#">Check-out Date</label>
				    					<input type="text" class="form-control checkout_date" placeholder="Check-out date">
			    				</div>
			    				</div>
	        			</div>
	        			<div class="col-md d-flex">
	        				<div class="form-group p-4 align-self-stretch d-flex align-items-end">
	        					<div class="wrap">
			      					<label for="#">Room</label>
			      					<div class="form-field">
			        					<div class="select-wrap">
			                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
			                    <select name="" id="" class="form-control">
			                    	<option value="">Suite</option>
			                      <option value="">Family Room</option>
			                      <option value="">Deluxe Room</option>
			                      <option value="">Classic Room</option>
			                      <option value="">Superior Room</option>
			                      <option value="">Luxury Room</option>
			                    </select>
			                  </div>
				              </div>
				            </div>
		              </div>
	        			</div>
	        			<div class="col-md d-flex">
	        				<div class="form-group p-4 align-self-stretch d-flex align-items-end">
	        					<div class="wrap">
			      					<label for="#">Customer</label>
			      					<div class="form-field">
			        					<div class="select-wrap">
			                    <div class="icon"><span class="ion-ios-arrow-down"></span></div>
			                    <select name="" id="" class="form-control">
			                    	<option value="">1 Adult</option>
			                      <option value="">2 Adult</option>
			                      <option value="">3 Adult</option>
			                      <option value="">4 Adult</option>
			                      <option value="">5 Adult</option>
			                      <option value="">6 Adult</option>
			                    </select>
			                  </div>
				              </div>
				            </div>
		              </div>
	        			</div>
	        			<div class="col-md d-flex">
	        				<div class="form-group d-flex align-self-stretch">
			              <input type="submit" value="Check Availability" class="btn btn-primary py-3 px-4 align-self-stretch">
			            </div>
	        			</div>
	        		</div>
	        	</form>
	    		</div>
        </div>
      </div>
    </section> 

    
    <!-- .section -->


   

    
    
  

  <!-- loader -->
  <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


  <script src="<?=base_url('js/jquery.min.js')?>"></script>
  <script src="<?=base_url('js/jquery-migrate-3.0.1.min.js')?>"></script>
  <script src="<?=base_url('js/popper.min.js')?>"></script>
  <script src="<?=base_url('js/bootstrap.min.js')?>"></script>
  <script src="<?=base_url('js/jquery.easing.1.3.js')?>"></script>
  <script src="<?=base_url('js/jquery.waypoints.min.js')?>"></script>
  <script src="<?=base_url('js/jquery.stellar.min.js')?>"></script>
  <script src="<?=base_url('js/owl.carousel.min.js')?>"></script>
  <script src="<?=base_url('js/jquery.magnific-popup.min.js')?>"></script>
  <script src="<?=base_url('js/aos.js')?>"></script>
  <script src="<?=base_url('js/jquery.animateNumber.min.js')?>"></script>
  <script src="<?=base_url('js/bootstrap-datepicker.js')?>"></script>
  <script src="<?=base_url('js/jquery.timepicker.min.js')?>"></script>
  <script src="<?=base_url('js/scrollax.min.js')?>"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
  <script src="<?=base_url('js/google-map.js')?>"></script>
  <script src="<?=base_url('js/main.js')?>"></script>
    
  </body>
</html>