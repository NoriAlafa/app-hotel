<?=$this->extend('template_user/layout')?>

<?=$this->section('content')?>
<div class="hero-wrap" style="background-image: url(<?=base_url('images/bg_1.jpg')?>);">
    <div class="overlay"></div>
    <div class="container">
    <div class="row no-gutters slider-text d-flex align-itemd-end justify-content-center">
        <div class="col-md-9 ftco-animate text-center d-flex align-items-end justify-content-center">
        <div class="text">
            <h1 class="mb-4 bread">TIPE ROOM</h1>
        </div>
        </div>
    </div>
    </div> <!-- End Container -->
</div>
<div class="container">
    <section class="ftco-section">
        
        <div class="card">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-lg-8">
                        <img src="<?=base_url('images/room-2.jpg')?>" height="350">
                    </div>
                    <div class="col-md-4 col-sm-4 col-lg-4">
                        <h3>VIP ROOM</h3>
                        <p>
                            Didalam VIP Room anda akan mendapatkan layanan yang lebih . Tak hanya itu , VIP Room juga bisa memesan makanan sesuai dengan 
                            yang anda inginkan , dan Layanan Resepsionis 24jam
                        </p>
                        <a href="/kamar/tipe/vip">Cek Kamar <i class="fas fa-arrow-alt-circle-right"></i></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="card mt-lg-5">
            <div class="card-body">
                <div class="row ">
                    <div class="col-md-8 col-sm-8 col-lg-8">
                        <img src="<?=base_url('images/room-3.jpg')?>" height="350">
                    </div>  
                    <div class="col-md-4 col-sm-4 col-lg-4">
                        <h3>STANDART ROOM</h3>
                        <p>
                            Didalam STANDART Room anda akan memiliki fasilitas kamar yang sesuai dengan kamar . Dan selebihnya jika anda mengingkan
                            layanan yang lebih maka , kamar ini tidak cocok untuk anda
                        </p>
                        <a href="/kamar/tipe/biasa">Cek Kamar <i class="fas fa-arrow-alt-circle-right"></i></a>
                    </div>  
                </div>
            </div>
        </div>

    </section>
</div>
<?=$this->endSection()?>