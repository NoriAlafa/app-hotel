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

    
    <section class="ftco-section">
	<div class="flash-data-kamar" data-flashdata="<?=session()->getFlashdata('user')?>"></div>
      <div class="container">
		  <div class="row">
			<?php foreach($viewKamar as $kamarV):?>
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
						<li><?=$kamarV['fasilitas_1']?></li>
						<li><?=$kamarV['fasilitas_2']?></li>
						<li><?=$kamarV['fasilitas_3']?></li>
						<li><?=$kamarV['fasilitas_4']?></li>
						<li><?=$kamarV['fasilitas_5']?></li>
						<li><?=$kamarV['fasilitas_6']?> </li>
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
										<?php if($kamarV['status_kamar'] == 'Kosong'):?>
											<button type="button" disabled href="" class=" btn btn-primary disabled" style="margin-top:20px;">Kosong</button>
										<?php endif;?>
									</center>
								</div>
							</form>
					<?php endif;?>
					<?php if($kamarV['status_kamar'] == 'Kosong'):?>
						
					<?php endif;?>
				</div>
			  </div>
            </div>
          </div>
		  <?php endforeach?>
        </div>
		
        
      </div>
    </section> 

    
    <!-- .section -->
<?=$this->endSection()?>