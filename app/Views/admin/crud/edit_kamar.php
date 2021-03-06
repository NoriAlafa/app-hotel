<?=$this->extend('template/layout')?>

<?=$this->section('content')?>
      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="/dataHotel" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <div class="flash-data-resep" data-flashdata="<?=session()->getFlashdata('resep')?>"></div>

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
              <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item">Posts</div>
              <div class="breadcrumb-item">Edit</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Edit Kamar</h2>
            <p class="section-lead">
            </p>
            <?php foreach($kamar as $kmr):?>
            <form action="/editKamar/<?=$kmr['id_kamar']?>" method="post" enctype="multipart/form-data">
            <?= csrf_field(); ?>
            <input type="hidden" name="_method" value="put">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Kamar</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="nama_kamar" value="<?=$kmr['nama_kamar']?>">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="tipe_kamar">
                          <option value="VIP">VIP</option>
                          <option value="BIASA">BIASA</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Status</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="status_kamar">
                          <option value="Tersedia">Tersedia</option>
                          <option value="Kosong">Kosong</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Harga</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="harga_kamar" value="<?=$kmr['harga_kamar']?>">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
                      <div class="col-sm-12 col-md-7">
                          <input type="file" onchange="previewImg()" required name="gambar" value="<?=$kmr['gambar']?>" id="gambar"class="form-control"><span><?=$kmr['gambar']?></span>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Preview</label>
                      <div class="col-sm-12 col-md-7">
                          <img src="<?=base_url('images/default.jpg')?>"  class="img-preview" style="height:250px; width:250px;">
                      </div>
                    </div>
                    <?php endforeach?>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Fasilitas</label>
                      <div class="col-sm-12 col-md-7">
                        <select class="form-control selectric" name="id_fasilitas">
                          <?php foreach($fasilitas as $fs){?>
                            <option value="<?=$fs['id_fasilitas']?>"><?=$fs['nama_fasilitas']?></option>
                          <?php }?>
                        </select>
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary" type="submit">Update </button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </form>
          </div>
      </section>
    </div>

<?=$this->endSection()?>

<?=$this->section('script')?>
  <script>
    function previewImg(){
      const gambar = document.querySelector('#gambar');
      const imgPreview = document.querySelector('.img-preview');
      const fileGambar = new FileReader();

      fileGambar.readAsDataURL(gambar.files[0]);

      fileGambar.onload = function(e){
        imgPreview.src = e.target.result;
      }
    }
  </script>
<?=$this->endSection()?>