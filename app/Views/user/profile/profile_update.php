<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title></title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?=base_url('assets/modules/bootstrap/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/modules/fontawesome/css/all.min.css')?>">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?=base_url('assets/modules/summernote/summernote-bs4.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/modules/jquery-selectric/selectric.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/modules/bootstrap-social/bootstrap-social.css')?>">


  <!-- Template CSS -->
  <link rel="stylesheet" href="<?=base_url('assets/css/style.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/css/components.css')?>">
  
<!-- Start GA -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-94034622-3"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-94034622-3');
</script>
<!-- /END GA --></head>

<body>
<div class="container" style="margin-top:80px;">
<section class="section">
    <div class="section-header">
    <div class="section-header-back">
        <a href="/profile" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
    </div>
    <h1>Update Profile</h1>
    
    </div>

    <div class="section-body">
    

    <div class="row">
        <div class="col-12">
        <div class="card shadow p-3 mb-5 bg-white rounded">
            <div class="card-header">
            <h4>Update</h4>
            </div>
            <div class="card-body">
                <?php $validation = \Config\Services::validation();?>
                <form action="/profile/update" method="post" class="needs-validation" enctype="multipart/form-data">
                <input type="hidden" name="_method" value="put">
                <?php foreach ($profile as $row){?>
                <?= csrf_field(); ?>
                <!-- <input type="hidden" value=""> -->
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="text" name="nama" class="form-control <?=$validation->hasError('nama') ? 'is-invalid' : null ?>" value="<?=old('nama',$row['nama'])?>">
                        <div class="invalid-feedback">
                            <?=$validation->getError('nama');?>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">NIK</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="number" name="nik"  class="form-control <?=$validation->hasError('nik') ? 'is-invalid' : null ?>" value="<?=old('nik',$row['nik'])?>">
                        <div class="invalid-feedback">
                            <?=$validation->getError('nik');?>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">EMAIL</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="email" id="email" name="email" class="form-control <?=$validation->hasError('email') ? 'is-invalid' : null ?>" value="<?=old('email',$row['email'])?>">
                        <div class="invalid-feedback">
                            <?=$validation->getError('email');?>
                        </div>
                    </div>
                </div>

                <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bio</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea class="summernote-simple" name="bio" ></textarea>
                      </div>
                </div>

                <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Gambar</label>
                      <div class="col-sm-12 col-md-7">
                          <input type="file" onchange="previewImg()" name="gambar" value="<?=$row['gambar'] ? $row['gambar'] : 'default.jpg'?>" id="gambar" class="form-control <?=$validation->hasError('gambar') ? 'is-invalid' : null ?>">
                          <div class="invalid-feedback">
                            <?=$validation->getError('gambar');?>
                          </div>
                      </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Preview</label>
                    <div class="col-sm-12 col-md-7">
                        <img src="<?=base_url('images/default.jpg')?>"  class="img-preview" style="height:250px; width:250px;">
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="password" name="password" class="form-control inputtags  <?=$validation->hasError('password') ? 'is-invalid' : null ?>">
                        <span class=" text-danger">Note: jika tidak ingin mengubah kata sandi masukan kata sandi yang sama</span>

                        <div class="invalid-feedback">
                            <?=$validation->getError('password');?>
                        </div>
                    </div>
                </div>
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Confirm Password</label>
                    <div class="col-sm-12 col-md-7">
                        <input type="password" name="conf_password" class="form-control inputtags <?=$validation->hasError('conf_password') ? 'is-invalid' : null ?>">
                        <div class="invalid-feedback">
                            <?=$validation->getError('conf_password');?>
                        </div>
                    </div>
                </div>
                
                <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary">Update</button>
                    </div>
                </div>
                <?php }?>
                </form>
            </div>
        </div>
        </div>
    </div>
    </div>
</section>
</div>
  <!-- General JS Scripts -->
  <script src="<?=base_url('assets/modules/jquery.min.js')?>"></script>
  <script src="<?=base_url('assets/modules/popper.js')?>"></script>
  <script src="<?=base_url('assets/modules/tooltip.js')?>"></script>
  <script src="<?=base_url('assets/modules/bootstrap/js/bootstrap.min.js')?>"></script>
  <script src="<?=base_url('assets/modules/nicescroll/jquery.nicescroll.min.js')?>"></script>
  <script src="<?=base_url('assets/modules/moment.min.js')?>"></script>
  <script src="<?=base_url('assets/js/stisla.js')?>"></script>
  
  <!-- JS Libraies -->
  
  <script src="<?=base_url('assets/modules/summernote/summernote-bs4.js')?>"></script>
  <script src="<?=base_url('assets/modules/bootstrap-tagsinput/dist/bootstrap-tagsinput.min.js')?>"></script>

  <!-- Page Specific JS File -->
  <script src="<?=base_url('assets/js/page/features-post-create.js')?>"></script>
  
  <!-- Template JS File -->
  <script src="<?=base_url('assets/js/scripts.js')?>"></script>
  <script src="<?=base_url('assets/js/custom.js')?>"></script>
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
</body>
</html>