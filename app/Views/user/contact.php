<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Contact &mdash;</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?=base_url('assets/modules/bootstrap/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/modules/fontawesome/css/all.min.css')?>">

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
          <div class="col-12 col-md-10 offset-md-1 col-lg-10 offset-lg-1">
            <div class="login-brand">
              FAHOTEL
            </div>

            <div class="card card-primary">
              <div class="row m-0">
                <div class="col-12 col-md-12 col-lg-5 p-0">
                  <div class="card-header text-center"><h4>Contact Us</h4></div>
                  <div class="card-body">
                  <?php $validation = \Config\Services::validation();?>
                    <form method="POST" action="/contact/kirim">
                      <input type="hidden" name="id_pesan">
                      <?= csrf_field(); ?>
                      <div class="form-group floating-addon">
                        <label>Nama</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="far fa-user"></i>
                            </div>
                          </div>
                          <input  type="text" class="form-control <?=$validation->hasError('nama') ? 'is-invalid' : null ?>" name="nama" autofocus placeholder="Nama Anda" value="<?=old('nama')?>">
                          <div class="invalid-feedback">
                            <?=$validation->getError('nama');?>
                          </div>
                        </div>
                      </div>

                      <div class="form-group floating-addon">
                        <label>Email</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <div class="input-group-text">
                              <i class="fas fa-envelope"></i>
                            </div>
                          </div>
                          <input id="email" type="email" class="form-control <?=$validation->hasError('email') ? 'is-invalid' : null ?>" name="email" placeholder="Email" value="<?=old('email')?>">
                          <div class="invalid-feedback">
                            <?=$validation->getError('email');?>
                          </div>
                        </div>
                      </div>

                      <div class="form-group">
                        <label>Message</label>
                        <textarea class="form-control <?=$validation->hasError('pesan') ? 'is-invalid' : null ?>" name="pesan" placeholder="Type your message" data-height="150"><?=old('pesan')?></textarea>
                        <div class="invalid-feedback">
                          <?=$validation->getError('pesan');?>
                        </div>
                      </div>

                      <div class="form-group text-right">
                        <button type="submit" class="btn btn-round btn-lg btn-primary">
                          Send Message
                        </button>
                      </div>
                    </form>
                  </div>  
                </div>
                <div class="col-12 col-md-12 col-lg-7 p-0">
                  <img src="<?=base_url('images/kontak.jpeg')?>" style="margin-left:5px;"height="550px">
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <a href="/" class="form-control text-center btn btn-info" >Kembali</a>
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
  
  <!-- Page Specific JS File -->
  <script src="<?=base_url('assets/js/page/utilities-contact.js')?>"></script>
  
  <!-- Template JS File -->
  <script src="<?=base_url('assets/js/scripts.js')?>"></script>
  <script src="<?=base_url('assets/js/custom.js')?>"></script>
</body>
</html>