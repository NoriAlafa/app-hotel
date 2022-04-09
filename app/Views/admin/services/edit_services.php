<?=$this->extend('template/layout')?>
<?=$this->section('content')?>
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="/list/services" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <div class="flash-data-resep" data-flashdata="<?=session()->getFlashdata('service')?>"></div>

            <h1>Edit Services Hotel</h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
              <div class="breadcrumb-item"><a href="#">Posts</a></div>
              <div class="breadcrumb-item">Create New Post</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title">Create New Post</h2>
            <p class="section-lead">
            </p>
          <?php foreach($service as $svc):?>
          <form action="/update/services/<?=$svc['id_services']?>" method="post" enctype="multipart/form-data">
          <input type="hidden" name="_method" value="put">
          <?= csrf_field(); ?>
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Services</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Services</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text"  class="form-control" value="<?=$svc['services']?>" name="services">
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                        <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                        <div class="col-sm-12 col-md-7">
                            <textarea class="summernote-simple "  name="detail_services"><?=$svc['detail_services']?></textarea>
                        </div>
                    </div>

                    
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar </label>
                      <div class="col-sm-12 col-md-7">
                          <input type="file" name="img" required id="img" value="<?=$svc['img']?>"  class="form-control" onchange="previewImg()" >
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Preview</label>
                      <div class="col-sm-12 col-md-7">
                          <img src="<?=base_url('images/default.jpg')?>"  class="img-preview" style="height:250px; width:250px;">
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
          </div>
          </form>
          <?php endforeach?>
      </section>
    </div>
<?=$this->endSection()?>

<?=$this->section('script')?>
  <script>
    function previewImg(){
      const gambar = document.querySelector('#img');
      const imgPreview = document.querySelector('.img-preview');
      const fileGambar = new FileReader();

      fileGambar.readAsDataURL(gambar.files[0]);

      fileGambar.onload = function(e){
        imgPreview.src = e.target.result;
      }
    }
  </script>
<?=$this->endSection()?>