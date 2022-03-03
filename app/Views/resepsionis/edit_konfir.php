<?=$this->extend('template/layout')?>

<?=$this->section('content')?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="features-posts.html" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>

            <?php if (!empty(session()->getFlashdata('error'))) { ?>         
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span area-hide="true">&times;</span>
                    </button>
                    Data gagal disimpan   <strong> <?= session()->getFlashdata('error')?></strong>
                </div>
            <?php } ?>
            
            <h1><?=$judul?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Posts</a></div>
              <div class="breadcrumb-item">Create New Post</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Create New Post</h2>
            <p class="section-lead">
              On this page you can create a new post and fill in all fields.
            </p>
            <form action="/editKamar" method="post" enctype="multipart/form-data">
            <?php foreach($resep as $kfr):?>
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="put">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Kamar</h4>
                  </div>
                  <input type="hidden" class="form-control" readonly name="id_reservasion" value="<?=$kfr['id_reservasion']?>">
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pemesan</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="nama" value="<?=$kfr['nama']?> " readonly>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Check in</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="datetime" class="form-control" name="tgl_check_in" value="<?=$kfr['tgl_check_in']?> ">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Check Out</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="datetime" class="form-control" name="tgl_check_out" value="<?=$kfr['tgl_check_out']?> ">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Info Bayar</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="status_rev">
                          <option value="booking">Booking</option>
                          <option value="bayar">Bayar</option>
                          <option value="out">Out</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pembayaran</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="datetime" class="form-control" name="harga_kamar" value="<?=number_format($kfr['harga_kamar'])?> " readonly>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="status">
                          <option value="Tersedia">Tersedia</option>
                          <option value="Kosong">Kosong</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary" type="submit">Create </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach?>
          </div>
          </form>
      </section>
    </div>

<?=$this->endSection()?>