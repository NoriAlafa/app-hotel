<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register &mdash; App</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?=base_url('assets/modules/bootstrap/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/modules/fontawesome/css/all.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/modules/bootstrap-social/bootstrap-social.css')?>">

  <!-- CSS Libraries -->

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
  <div id="app">
    <section class="section">
      <div class="container mt-5">
        <div class="row">
          <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
            <div class="login-brand">
              <img src="https://www.svgrepo.com/show/20434/hotel.svg" alt="logo" width="100" class="shadow-light rounded-circle">
            </div>
            <div class="card card-primary">
              <div class="card-header justify-content-center"><h4><?=$judul?></h4></div>

              <div class="card-body">
              <?php $validation = \Config\Services::validation();?>

                <form method="POST" action="/daftar" autocomplete="off" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                  <div class="form-group">
                    <label >Nama</label>
                    <input  type="text" placeholder="Nama Minimal 4 Karakter" class="form-control <?=$validation->hasError('nama') ? 'is-invalid' : null ?>" value="<?=old('nama')?>" name="nama">
                    <div class="invalid-feedback">
                        <?=$validation->getError('nama');?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label >Email</label>
                    <input id="email" type="email" class="form-control <?=$validation->hasError('email') ? 'is-invalid' : null ?>" value="<?=old('email')?>"  name="email">
                    <div class="invalid-feedback">
                        <?=$validation->getError('email');?>
                    </div>
                  </div>

                  <div class="form-group">
                    <label >NIK KTP</label>
                    <input id="nik" type="text" class="form-control <?=$validation->hasError('nik') ? 'is-invalid' : null ?>"value="<?=old('nik')?>"  name="nik" placeholder="Panjang NIK Harus sesuai 16 Karakter">
                    <div class="invalid-feedback">
                        <?=$validation->getError('nik');?>
                    </div>
                  </div>

                  <div class="form-group ">
                      <label>Foto Profile</label>
                      <input type="file"  name="gambar"  onchange="previewImg()" value="<?=old('gambar')?>" id="gambar" class="form-control <?=$validation->hasError('gambar') ? 'is-invalid' : null ?>">
                      <div class="invalid-feedback">
                        <?=$validation->getError('gambar');?>
                      </div>
                </div>

                <div class="form-group ">
                    <label >Preview</label><br/>
                        <img src="<?=base_url('images/default.jpg')?>"   class="img-preview" style="height:250px; width:250px;">
                </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label class="d-block">Password</label>
                      <input id="password" type="password" class="form-control <?=$validation->hasError('password') ? 'is-invalid' : null ?>" value="<?=old('password')?>"  name="password" placeholder="Password minimal 8 karakter">
                      <div class="invalid-feedback">
                        <?=$validation->getError('password');?>
                       </div>
                    </div>
                    <div class="form-group col-6">
                      <label class="d-block">Password Confirmation</label>
                      <input id="password_new" type="password" class="form-control <?=$validation->hasError('password_new') ? 'is-invalid' : null ?>" value="<?=old('password_new')?>" name="password_new">
                      <div class="invalid-feedback">
                        <?=$validation->getError('password_new');?>
                    </div>
                    </div>
                  </div>

                  <!-- <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                      <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                  </div> -->

                  <div class="form-group">
                    <button type="submit" class="btn btn-lg btn-block bg-primary text-white" >
                      Register
                    </button>
                  </div>
                </form>
              </div>
            </div>
            <div class="simple-footer">
              Copyright &copy; FAHOTEL
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

  <!-- Page Specific JS File -->
  <script src="<?=base_url('assets/js/page/auth-register.js')?>"></script>
  
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