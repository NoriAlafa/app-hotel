<?=$this->extend('template_user/layout')?>

<?=$this->section('content')?>
    <div class="hero-wrap" style="background-image: url(<?=base_url('images/bg_1.jpg')?>);">
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
            <a href="/kamarhotel">
				<h2 class="mb-4">Kamar</h2>
			</a>
          </div>
        </div> 
		
		<div class="row mb-lg-5">
			<div class="col-md-12 col-lg-12 col-lg-12">
				<form action="" class="form-inline mr-auto justify-content-center" method="get">
					<?php $request = \Config\Services::request();?>
					<input class="form-control mr-sm-2" name="keyword" value="<?=$request->getGet('keyword');?>" type="search" placeholder="Cari Kamar" aria-label="Search">
					<button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
				</form>
			</div>
		</div>

		<div class="row">
			<?php foreach ($kamar as $kmr):?>
			<div class="col-sm col-md-6 col-lg-4 ftco-animate ">
				<div class="room">
					<a href="/room/<?=$kmr['id_kamar']?>" class="img d-flex justify-content-center align-items-center">
					<div class="gambar">
						<img src="<?=base_url('images/'.$kmr['gambar'])?>" style="height:300px; width:350px;margin-top:20px;">
					</div>
					</a>
					<div class="text p-3 text-center">
						<h3 class="mb-3"><a href=""><?=$kmr['nama_kamar']?></a></h3>
						<p><span class="price mr-2"><b>Rp </b><?=number_format($kmr['harga_kamar'], 0 , ',' , '.')?></span> <span class="per">per night</span></p>
						<hr>
						<p class="pt-1"><a href="/room/<?=$kmr['id_kamar']?>" class="btn-custom">View Room Details <span class="icon-long-arrow-right"></span></a></p>
					</div>
				</div>
			</div>
			<?php endforeach?>
		</div>

        <div class="row">
            <div class="col-md-12 col-sm-12 col-lg-12 ">
                <?=$pager->links('default' , 'pagination')?>         
            </div>
          
    	  </div>
    </section>
<?=$this->endSection()?>