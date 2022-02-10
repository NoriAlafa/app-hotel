<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Hotel Keren &mdash; FAHOTEL</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?=base_url('assets/modules/bootstrap/css/bootstrap.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/modules/fontawesome/css/all.min.css')?>">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="<?=base_url('assets/modules/jqvmap/dist/jqvmap.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/modules/summernote/summernote-bs4.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css')?>">
  <link rel="stylesheet" href="<?=base_url('assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css')?>">

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
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>

      <nav class="navbar navbar-expand-lg main-navbar">
         <?=$this->include('template/header')?>
      </nav>
      

      <div class="main-sidebar sidebar-style-2">
          <?=$this->include('template/sidebar')?>
      </div>
      

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
            <?=$this->renderSection('content')?>
        </section>
      </div>
      <footer class="main-footer">
        <div class="footer-left">
          Copyright &copy; 2018 <div class="bullet"></div> Design By <a href="https://trakteer.id/nori-alafa/tip" target="_blank">Nori Alafa</a>
        </div>
        <div class="footer-right">
          
        </div>
      </footer>
    </div>
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
  <script src="<?=base_url('assets/modules/jquery.sparkline.min.js')?>"></script>
  <script src="<?=base_url('assets/modules/chart.min.js')?>"></script>
  <script src="<?=base_url('assets/modules/owlcarousel2/dist/owl.carousel.min.js')?>"></script>
  <script src="<?=base_url('assets/modules/summernote/summernote-bs4.js')?>"></script>
  <script src="<?=base_url('assets/modules/chocolat/dist/js/jquery.chocolat.min.js')?>"></script>

  <!-- Page Specific JS File -->
  <script src="<?=base_url('assets/js/page/index.js')?>"></script>
  
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