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
			  <div class="card">
				<div class="card-header " style="background-color:#6777ef; color:white; font-size:20px;">
					Isi Data Pemesan
				</div>
				<div class="card-body">
					<div class="form-group">
						<label>Nama</label>
					  <input type="text" name="nama" class="form-control">
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
						<?php if($kamarV['status'] == 'Tersedia'):?>
							<a href="" class=" btn btn-primary" style="margin-top:20px;">Pesan</a>
						<?php endif;?>
						<?php if($kamarV['status'] == 'Kosong'):?>
							<a href="" class=" btn btn-primary disabled" style="margin-top:20px;">Kosong</a>
						<?php endif;?>
					</center>
				</div>
			  </div>
            </div>
          </div>
		  <?php endforeach?>
		  <div class="card-body">
			<div class="buttons">
				<div class="section-title mt-0">Status Kamar</div>
					<?php if($kamarV['status'] == 'Tersedia'):?>
						<button type="button" class="btn btn-success">
							Tersedia <span class="badge badge-transparent"><i class="fas fa-check"></i></span>
						</button>
					<?php endif;?>
					<?php if($kamarV['status'] == 'Kosong'):?>
						<button type="button" class="btn btn-danger">
								kosong <span class="badge badge-transparent"><i class="fas fa-times"></i></span>
						</button>
					<?php endif;?>
				</div>
			</div>
         </div>
        </div>

        
      </div>
    </section> 

    
    <!-- .section -->
<?=$this->endSection()?>