<!DOCTYPE html>
<html lang="en">
  <head>
    <title>FAHOTEL</title>
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
	
    <link rel="stylesheet" href="<?=base_url('assets/modules/fontawesome/css/all.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/modules/bootstrap-daterangepicker/daterangepicker.css')?>">
   

    <!-- CSS Libraries -->

    <!-- Template CSS -->

    <link rel="stylesheet" href="<?=base_url('css/flaticon.css')?>">
    <link rel="stylesheet" href="<?=base_url('css/icomoon.css')?>">
    <link rel="stylesheet" href="<?=base_url('css/style.css')?>">
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script> 
</head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container">
	      <a class="navbar-brand" href="<?=base_url('/')?>">FAHOTEL</a>
	      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>

	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav ml-auto">
	          <li class="nav-item active"><a href="/" class="nav-link">Home</a></li>
	          <li class="nav-item"><a href="/kamarhotel" class="nav-link">Rooms</a></li>
	          <li class="nav-item"><a href="/kontak" class="nav-link">Contact</a></li>
            <?php if(session('id')):?>
              <li class="nav-item"><a href="/profile" class="nav-link"><i class="fas fa-user"></i></a></li>
              <li class="nav-item"><a href="/logout" class="nav-link"><i class="fas fa-sign-out-alt"></i></a></li>
            <?php endif;?>
            <?php if(!session('id')){?>
              <li class="nav-item"><a href="/login" class="nav-link">Login</a></li>
            <?php }?>
	        </ul>
	      </div>
	    </div>
	  </nav>
    <!-- END nav -->

    <?=$this->renderSection('content')?>
 <!-- loader -->
 <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px"><circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee"/><circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00"/></svg></div>


<script src="<?=base_url('js/jquery.min.js')?>"></script>
<script src="<?=base_url('js/jquery-migrate-3.0.1.min.js')?>"></script>
<script src="<?=base_url('js/popper.min.js')?>"></script>
<script src="<?=base_url('js/jquery.easing.1.3.js')?>"></script>
<script src="<?=base_url('js/jquery.waypoints.min.js')?>"></script>
<script src="<?=base_url('js/jquery.stellar.min.js')?>"></script>
<script src="<?=base_url('js/owl.carousel.min.js')?>"></script>
<script src="<?=base_url('js/jquery.magnific-popup.min.js')?>"></script>
<script src="<?=base_url('js/aos.js')?>"></script>
<script src="<?=base_url('js/jquery.animateNumber.min.js')?>"></script>
<script src="<?=base_url('assets/modules/sweetalert/sweetalert.min.js')?>"></script>
<script src="<?=base_url('assets/js/page/modules-sweetalert.js')?>"></script>
<script src="<?=base_url('js/scrollax.min.js')?>"></script>
<script src="<?=base_url('js/main.js')?>"></script>
<script src="<?=base_url('assets/modules/jquery.min.js')?>"></script>
<script src="<?=base_url('assets/modules/bootstrap/js/bootstrap.min.js')?>"></script>
<script src="<?=base_url('assets/modules/moment.min.js')?>"></script>
<script src="<?=base_url('assets/js/stisla.js')?>"></script>
<script src="<?=base_url('assets/js/scripts.js')?>"></script>
<script src="<?=base_url('assets/js/custom.js')?>"></script>
<script src="<?=base_url('assets/modules/bootstrap-daterangepicker/daterangepicker.js')?>"></script>
  
</body>
</html>