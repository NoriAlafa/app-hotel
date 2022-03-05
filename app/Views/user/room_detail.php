<?=$this->extend('template_user/layout')?>

<?=$this->section('content')?>
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
		<form action="/invoice" class="booking-form">
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
<?=$this->endSection()?>