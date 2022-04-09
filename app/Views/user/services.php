<?=$this->extend('template_user/layout')?>

<?=$this->section('content')?>
    <div class="hero-wrap" style="background-image: url(<?=base_url('images/bg_1.jpg')?>);">
      <div class="overlay"></div>
      <div class="container">
        <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
          <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
          	<div class="text">
	            <h1 class="mb-4 bread">SERVICES</h1>
            </div>
          </div>
        </div>
      </div>
    </div>
<div class="container">
  <div class="card border-0">
    <div class="card-body">
      <div class="row">
        <?php foreach($service as $svc):?>
          <div class="col-md-4 col-sm-4 col-lg-4 ">
            <div class="image mt-md-5">
              <img src="<?=base_url('images/services/'.$svc['img'])?>" style="height:300px; width:350px;"><br/>
            </div>
            <div class="services mt-md-3">
              <?=$svc['services']?>
            </div>
            <div class="detail" style="list-style:none;">
              <?=$svc['detail_services']?>
            </div>
          </div>
        <?php endforeach?>
      </div>
    </div>
  </div>
</div>
<?=$this->endSection()?>