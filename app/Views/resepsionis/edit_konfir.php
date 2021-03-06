<?=$this->extend('template/layout')?>

<?=$this->section('content')?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="/konfirmasiRoom" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>

            <div class="flash-data-admin" data-flashdata="<?=session()->getFlashdata('admin')?>"></div>
            
            <h1><?=$judul?></h1>
          </div>

          <div class="section-body">
            <h2 class="section-title">Edit Pemesanan</h2>
            <?php foreach($dataRev as $kfr):?>
            <form action="/editPesanan/<?=$kfr['id_reservasion']?>" method="post">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="put">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Kamar</h4>
                  </div>
                  <input type="hidden" name="id_kamar" value="<?=$kfr['id_kamar']?>">
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Check Out</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control datetimepicker" name="tgl_check_out" value="<?=$kfr['tgl_check_out']?> ">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Info Pemesan</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="status_rev" id="status_rev">
                          <option value="booking">Booking</option>
                          <option value="bayar">Bayar</option>
                          <option value="out">Out</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status Kamar</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="status_kamar" id="status_kamar">
                          <option value="Tersedia">Tersedia</option>
                          <option value="Kosong">Kosong</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga Kamar</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="harga_kamar" value="<?=$kfr['harga_kamar']?> " readonly>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Pembayaran</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="pembayaran" value="<?=$kfr['pembayaran']?> ">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary" type="submit">Update</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach?>
          </form>
          </div>
      </section>
    </div>

<?=$this->endSection()?>