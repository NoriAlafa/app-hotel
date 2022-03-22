<?= $this->extend('template_user/layout')?>

<?=$this->section('content')?>
    <section class="home-slider owl-carousel">
      <div class="slider-item" style="background-image:url(images/bg_1.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-12 ftco-animate text-center">
          	<div class="text mb-5 pb-3">
	            <h1 class="mb-3">Welcome To FAHOTEL</h1>
	            <h2>Hotels &amp; Resorts</h2>
            </div>
          </div>
        </div>
        </div>
      </div>

      <div class="slider-item" style="background-image:url(images/bg_2.jpg);">
      	<div class="overlay"></div>
        <div class="container">
          <div class="row no-gutters slider-text align-items-center justify-content-center">
          <div class="col-md-12 ftco-animate text-center">
          	<div class="text mb-5 pb-3">
	            <h1 class="mb-3">Enjoy A Luxury Experience</h1>
	            <h2>Join With Us</h2>
            </div>
          </div>
        </div>
        </div>
      </div>
    </section>

    


    <section class="ftco-section ftc-no-pb ftc-no-pt mt-md-5">
			<div class="container">
				<div class="row">
					<div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(images/bg_2.jpg);">
						<a href="https://vimeo.com/45830194" class="icon popup-vimeo d-flex justify-content-center align-items-center">
							<span class="icon-play"></span>
						</a>
					</div>
					<div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
	          <div class="heading-section heading-section-wo-line pt-md-5 pl-md-5 mb-5">
	          	<div class="ml-md-0">
		          	<span class="subheading">Welcome to FAHOTEL</span>
		            <h2 class="mb-4">Cari Hotelmu Disini</h2>
	            </div>
	          </div>
	          <div class="pb-md-5">
			     <p>Menginap di hotel atau penginapan yang nyaman merupakan salah satu cara terbaik untuk menikmati perjalanan, baik itu untuk liburan ataupun perjalanan bisnis. Di FAHOTEL, Anda bisa dengan mudah menemukan hotel atau penginapan yang tepat plus sesuai bujet, mulai dari hotel murah, boutique hotel, hingga hotel bintang 5. Nah, momen mencari hotel terbaik ini juga menjadi hal yang penting, khususnya bagi Anda yang berencana liburan bersama keluarga. Anda perlu melengkapi informasi mengenai fasilitas dan keunikan yang ditawarkan dari masing-masing hotel untuk menyesuaikannya dengan kebutuhan Anda. Misalnya, bagi yang gemar berfoto 
				Anda dapat memilih hotel bergaya industrialis atau modern. Bagaimana FAHOTEL membantu Anda menemukan hotel terbaik dengan mudah?</p>	
			  <ul class="ftco-social d-flex">
                <li class="ftco-animate"><a href="#"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-facebook"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-google-plus"></span></a></li>
                <li class="ftco-animate"><a href="#"><span class="icon-instagram"></span></a></li>
              </ul>
						</div>
					</div>
				</div>
			</div>
		</section>

		
    <section class=" text-center">
      <div class="container">
          <div class="judul">
              <h4 class=" fw-bold pt-5 pb-5">FASILITAS HOTEL</h4>
          </div>
          <div class="row justify-content-center">
            <?php foreach($fasHotel as $fs):?>
              <div class="col-md-2 col-4 ">
                  <div class="isi">
                      <?=$fs['logo']?>
                      <h4><?=$fs['fasilitas_hotel']?></h4>
                  </div>
              </div>
            <?php endforeach?>
          </div>
      </div>
    </section>

    <section class="ftco-section ftco-counter img" id="section-counter" style="background-image: url(images/bg_1.jpg);">
    	<div class="container">
    		<div class="row justify-content-center">
    			<div class="col-md-10">
		    		<div class="row">
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="<?=$profileCount?>">0</strong>
		                <span>Happy Guest</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="<?=$kamarCount?>">0</strong>
		                <span>Rooms</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="<?=$adminCount + $resepCount?>">0</strong>
		                <span>Staffs</span>
		              </div>
		            </div>
		          </div>
		          <div class="col-md-3 d-flex justify-content-center counter-wrap ftco-animate">
		            <div class="block-18 text-center">
		              <div class="text">
		                <strong class="number" data-number="100">0</strong>
		                <span>Beragam Menu Masakan</span>
		              </div>
		            </div>
		          </div>
		        </div>
	        </div>
        </div>
    	</div>
    </section>

    <footer class="ftco-footer ftco-bg-dark ftco-section">
      <div class="container">
        <div class="row mb-5">
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">FAHOTEL</h2>
              <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.</p>
              <ul class="ftco-footer-social list-unstyled float-md-left float-lft mt-5">
                <li class="ftco-animate"><a href="https://twitter.com/Nori_Alafaa" target="_blank"><span class="icon-twitter"></span></a></li>
                <li class="ftco-animate"><a href="https://facebook.com/profile.php?id=100016880164097" target="_blank"><span class="icon-facebook"></span></a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4 ml-md-5">
              <h2 class="ftco-heading-2">Useful Links</h2>
              <ul class="list-unstyled">
                <li><a href="" class="py-2 d-block">Blog</a></li>
                <li><a href="/kamarhotel" class="py-2 d-block">Rooms</a></li>
                <li><a href="" class="py-2 d-block">Amenities</a></li>
                <li><a href="" class="py-2 d-block">Gift Card</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
             <div class="ftco-footer-widget mb-4">
              <h2 class="ftco-heading-2">Privacy</h2>
              <ul class="list-unstyled">
                <li><a href="" class="py-2 d-block">Career</a></li>
                <li><a href="" class="py-2 d-block">About Us</a></li>
                <li><a href="" class="py-2 d-block">Contact Us</a></li>
                <li><a href="" class="py-2 d-block">Services</a></li>
              </ul>
            </div>
          </div>
          <div class="col-md">
            <div class="ftco-footer-widget mb-4">
            	<h2 class="ftco-heading-2">Have a Questions?</h2>
            	<div class="block-23 mb-3">
	              <ul>
	                <li><span class="icon icon-map-marker"></span><span class="text">Jl. Joyoboyo Timur No.146-127, Babadan, Sukorejo, Kec. Gurah, Kabupaten Kediri, Jawa Timur 64181</span></li>
	                <li><a href=""><span class="icon icon-phone"></span><span class="text">+62 87779998268</span></a></li>
	                <li><a href=""><span class="icon icon-envelope"></span><span class="text">erinrisnawati1922@gmail.com</span></a></li>
	              </ul>
	            </div>
            </div>
          </div>
        </div>
       
      </div>
    </footer>
    <?=$this->endSection()?>