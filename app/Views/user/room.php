<!DOCTYPE html>
<html lang="en">
  <head>
    <title><?=$judul?></title>
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
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
              <li class="nav-item active"><a href="<?=base_url('/')?>" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="<?=base_url('/kamarhotel')?>" class="nav-link">Rooms</a></li>
	          <li class="nav-item"><a href="about.html" class="nav-link">About</a></li>
	          <li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>
	          <li class="nav-item"><a href="<?=base_url('/kontak')?>" class="nav-link">Contact</a></li>
	          <li class="nav-item"><a href="<?=base_url('/login')?>" class="nav-link">Login</a></li>
	          <li class="nav-item"><a href="<?=base_url('/profile')?>" class="nav-link">Profile</a></li>
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
	            <h1 class="mb-4 bread">Pilih Kamar</h1>
            </div>
          </div>
        </div>
      </div>
    </div>

<section class="ftco-section bg-light">
    	<div class="container">
				<div class="row justify-content-center mb-5 pb-3">
          <div class="col-md-7 heading-section text-center ftco-animate">
            <h2 class="mb-4">Hotel</h2>
          </div>
        </div>    		
    		<div class="row">
				<?php foreach ($kamar as $kmr):?>
    			<div class="col-sm col-md-6 col-lg-4 ftco-animate">
    				<div class="room">
    					<a href="rooms.html" class="img d-flex justify-content-center align-items-center">
						<img src="images/<?=$kmr['gambar']?>" style="height:300px; width:350px;margin-top:20px;">
    					</a>
    					<div class="text p-3 text-center">
    						<h3 class="mb-3"><a href="rooms.html"><?=$kmr['nama_kamar']?></a></h3>
    						<p><span class="price mr-2"><b>Rp </b><?=number_format($kmr['harga_kamar'], 0 , ',' , '.')?></span> <span class="per">per night</span></p>
    						<hr>
    						<p class="pt-1"><a href="<?=base_url('/kamar')?>" class="btn-custom">View Room Details <span class="icon-long-arrow-right"></span></a></p>
    					</div>
    				</div>
    			</div>
				<?php endforeach?>
    		</div>
            <div class="row">
                <div class="col-md-12 col-sm-12">
                    <div class="paginate-room">
                        <nav aria-label="Page navigation example">
                            <ul class="pagination justify-content-center">
                                <li class="page-item"><a class="page-link text-dark" href="#">Previous</a></li>
                                <li class="page-item"><a class="page-link text-dark" href="#">1</a></li>
                                <li class="page-item"><a class="page-link text-dark" href="#">2</a></li>
                                <li class="page-item"><a class="page-link text-dark" href="#">3</a></li>
                                <li class="page-item"><a class="page-link text-dark" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
    	</div>
    </section>


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