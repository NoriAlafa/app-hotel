<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register &mdash; App</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?=base_url('assets/modules/bootstrap/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/modules/fontawesome/css/all.min.css')?>">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?=base_url('assets/modules/jquery-selectric/selectric.css')?>">

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
            <?php if (!empty(session()->getFlashdata('error'))) { ?>         
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span area-hide="true">&times;</span>
                    </button>
                    Data gagal disimpan   <strong> <?= session()->getFlashdata('error')?></strong>
                </div>
            <?php } ?>
            <div class="card card-primary">
              <div class="card-header"><h4><?=$judul?></h4></div>

              <div class="card-body">
                <form method="POST" action="/daftar">
                <?= csrf_field(); ?>
                  <div class="form-group">
                    <label >Nama</label>
                    <input id="nama" type="text" class="form-control" name="nama">
                  </div>

                  <div class="form-group">
                    <label >Email</label>
                    <input id="email" type="email" class="form-control" name="email">
                  </div>

                  <div class="form-group">
                    <label >NIK KTP</label>
                    <input id="nik" type="text" class="form-control" name="nik">
                  </div>

                  <div class="row">
                    <div class="form-group col-6">
                      <label class="d-block">Password</label>
                      <input id="password" type="password" class="form-control pwstrength"  name="password">
                    </div>
                    <div class="form-group col-6">
                      <label class="d-block">Password Confirmation</label>
                      <input id="password_new" type="password" class="form-control" name="password_new">
                    </div>
                  </div>

                  <!-- <div class="form-group">
                    <div class="custom-control custom-checkbox">
                      <input type="checkbox" name="agree" class="custom-control-input" id="agree">
                      <label class="custom-control-label" for="agree">I agree with the terms and conditions</label>
                    </div>
                  </div> -->

                  <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">
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
  <script src="<?=base_url('assets/modules/jquery-pwstrength/jquery.pwstrength.min.js')?>"></script>
  <script src="<?=base_url('assets/modules/jquery-selectric/jquery.selectric.min.js')?>"></script>

  <!-- Page Specific JS File -->
  <script src="<?=base_url('assets/js/page/auth-register.js')?>"></script>
  
  <!-- Template JS File -->
  <script src="<?=base_url('assets/js/scripts.js')?>"></script>
  <script src="<?=base_url('assets/js/custom.js')?>"></script>
</body>
</html>