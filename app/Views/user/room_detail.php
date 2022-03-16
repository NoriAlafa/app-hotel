<?=$this->extend('template_user/layout')?>

<?=$this->section('content')?>
    <div class="hero-wrap" style="background-image: url(<?=base_url('images/bg_1.jpg')?>);">
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

    
	<?php foreach($viewKamar as $kamarV):?>
    <section class="ftco-section">
	<div class="flash-data-kamar" data-flashdata="<?=session()->getFlashdata('user')?>"></div>
      <div class="container">
		  <div class="row">
          <div class="col-lg-8">
          	<div class="row">
          		<div class="col-md-12 ftco-animate">
          			<h2 class="mb-4"><?=$judul?></h2>
          			<div class="single-slider owl-carousel">
          				<div class="item">
							<img src="<?=base_url('images/'.$kamarV['gambar'])?>" style=" height:800px;">
						</div>
          			</div>
          		</div>

          	</div>
          </div> <!-- .col-md-8 -->
		  
			<div class="col-lg-4 sidebar ftco-animate"> 
            	<div class="sidebar-box ftco-animate">
					<div class="categories">
						<h3>Fasilitas</h3>
						<?=$kamarV['nama_fasilitas']?>
					</div>
              	</div>
				  <div class="buttons" >		
					<?php if($kamarV['status_kamar'] == 'Tersedia'):?>
						<button type="button" class="btn-success" style="margin-left:20px; margin-bottom:30px;">
							Tersedia <span class="badge badge-transparent"><i class="fas fa-check"></i></span>
						</button>
						<form action="/bayar" method="post">
							<?= csrf_field(); ?>
							<div class="card">
								<div class="card-header " style="background-color:#6777ef; color:white; font-size:20px;">
									Pesan
								</div>
								<div class="card-body">
									<div class="form-group">
										<input type="hidden" name="id_reservasion">
										<input type="hidden" name="id_kamar" value="<?=$kamarV['id_kamar']?>">
										<input type="hidden" name="id_user">
										<input type="hidden" name="pembayaran">
										<input type="hidden" name="harga_kamar" value="<?=$kamarV['harga_kamar']?>">
									</div>
									
									<div class="form-group">
										<label>Check in</label>
										<input type="text" name="tgl_check_in" class="form-control datetimepicker">
									</div>
				
									<div class="form-group">
										<label>Check Out</label>
										<input type="text" name="tgl_check_out" class="form-control datetimepicker">
									</div>
									<center>
										<?php if($kamarV['status_kamar'] == 'Tersedia'):?>
											<button type="submit" href="/bayar" class=" btn btn-primary" style="margin-top:20px;">Pesan</button>
										<?php endif;?>
									</center>
								</div>
							</form>
					<?php endif;?>
					<?php if($kamarV['status_kamar'] == 'Kosong'):?>
						<button type="button" class="btn-danger" style="margin-left:20px; margin-bottom:30px;">
							Kosong <span class="badge badge-transparent"><i class="fas fa-times"></i></span>
						</button>
					<?php endif;?>
				</div>
			  </div>
            </div>
          </div>
        </div>
	</div>
</section> 
<?php if($kamarV['tipe_kamar']== 'VIP'):?>
	<section class="ftco-section">
      <div class="container">
		<h2 class="text-center " style="font-size:50px; margin-bottom:20px; font-weight:bold; color:#8d703b;">VIP ROOM</h2>
        <div class="row d-flex">
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services py-4 d-block text-center">
              <div class="d-flex justify-content-center">
              	<div class="icon d-flex align-items-center justify-content-center">
              		<span class="flaticon-reception-bell"></span>
              	</div>
              </div>
              <div class="media-body p-2 mt-2">
                <h3 class="heading mb-3">Layanan Resepsionis</h3>
                <p>Layanan Cepat Dari Resepsionis 24 Jam </p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services py-4 d-block text-center">
              <div class="d-flex justify-content-center">
              	<div class="icon d-flex align-items-center justify-content-center">
              		<span class="flaticon-serving-dish"></span>
              	</div>
              </div>
              <div class="media-body p-2 mt-2">
                <h3 class="heading mb-3">Restaurant Bar</h3>
                <p>Restaurant Yang Mewah Dan Berbagai Menu Makanan Exclusive</p>
              </div>
            </div>    
          </div>
          <div class="col-md-3 d-flex align-sel Searchf-stretch ftco-animate">
            <div class="media block-6 services py-4 d-block text-center">
              <div class="d-flex justify-content-center">
              	<div class="icon d-flex align-items-center justify-content-center">
              		<span class="flaticon-car"></span>
              	</div>
              </div>
              <div class="media-body p-2 mt-2">
                <h3 class="heading mb-3">Transfer Services</h3>
                <p>Jalan Jalan Keliling Menikmati Pemandangan Kota Di Akhir Masa CheckOut Anda</p>
              </div>
            </div>      
          </div>
          <div class="col-md-3 d-flex align-self-stretch ftco-animate">
            <div class="media block-6 services py-4 d-block text-center">
              <div class="d-flex justify-content-center">
              	<div class="icon d-flex align-items-center justify-content-center">
              		<span class="flaticon-spa"></span>
              	</div>
              </div>
              <div class="media-body p-2 mt-2">
                <h3 class="heading mb-3">Spa Suites</h3>
                <p>Rias Facial Professional Dan Perawatan Perawatan Pribadi </p>
              </div>
            </div>      
          </div>
        </div>
      </div>
    </section>
<?php endif?>
<?php endforeach?>

    
    <!-- .section -->
<?=$this->endSection()?>