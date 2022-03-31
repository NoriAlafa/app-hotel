<!DOCTYPE html>
<html lang="en">
    <head>
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
        <title>Profile</title>
        <style>
          #myImg {
            border-radius: 5px;
            cursor: pointer;
            transition: 0.3s;
          }

          #myImg:hover {opacity: 0.7;}

          /* The Modal (background) */
          .modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1; /* Sit on top */
            padding-top: 100px; /* Location of the box */
            left: 0;
            top: 0;
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgb(0,0,0); /* Fallback color */
            background-color: rgba(0,0,0,0.9); /* Black w/ opacity */
          }

          /* Modal Content (Image) */
          .modal-content {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 500px;
          }

          /* Caption of Modal Image (Image Text) - Same Width as the Image */
          #caption {
            margin: auto;
            display: block;
            width: 80%;
            max-width: 700px;
            text-align: center;
            color: #ccc;
            padding: 10px 0;
            height: 150px;
          }

          /* Add Animation - Zoom in the Modal */
          .modal-content, #caption {
            animation-name: zoom;
            animation-duration: 0.6s;
          }

          @keyframes zoom {
            from {transform:scale(0)}
            to {transform:scale(1)}
          }

          /* The Close Button */
          .close {
            position: absolute;
            top: 15px;
            right: 35px;
            color: #f1f1f1;
            font-size: 40px;
            font-weight: bold;
            transition: 0.3s;
          }

          .close:hover,
          .close:focus {
            color: #bbb;
            text-decoration: none;
            cursor: pointer;
          }

          /* 100% Image Width on Smaller Screens */
          @media only screen and (max-width: 700px){
            .modal-content {
              width: 100%;
            }
          }
        </style>
    </head>
<body>
<!-- Main Content -->
<div class="main-content justify-content-center">
            <?php foreach($profile as $row){?>
              <section class="section ">
                <div class="section-header">
                  <h1>Profile</h1>
                  <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><?=$row['role']?></div>
                    <div class="breadcrumb-item">Profile</div>
                  </div>
                </div>
                <div class="section-body">
                  <h2 class="section-title">Hi</h2>
                  <p class="section-lead">
                    Data Profile Anda
                  </p>
            <div class="row mt-sm-4 ">
              <div class="col-sm-5 col-md-5 col-lg-5 ">
                <div class="card profile-widget">
                  <div class="profile-widget-header">
                      <img alt="image" id="myImg" alt="profile" src="<?=base_url('images/profile/' . $row['gambar'])?>" height="100px" width="150px" class="rounded-circle profile-widget-picture">
                      <!-- The Modal -->
                      <div id="myModal" class="modal">

                      <!-- The Close Button -->
                      <span class="close">&times;</span>

                      <!-- Modal Content (The Image) -->
                      <img class="modal-content" id="img01">

                      <!-- Modal Caption (Image Text) -->
                      <div id="caption"></div>
                      </div>
                    <div class="profile-widget-items">
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label"></div>
                        <div class="profile-widget-item-value"></div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label"></div>
                        <div class="profile-widget-item-value"></div>
                      </div>
                      <div class="profile-widget-item">
                        <div class="profile-widget-item-label"></div>
                        <div class="profile-widget-item-value"></div>
                      </div>
                    </div>
                  </div>                  
                  <div class="profile-widget-description">
                    <div class="profile-widget-name"><?=$row['nama']?> <div class="text-muted d-inline font-weight-normal"><div class="slash"></div> <?=$row['role']?></div></div>
                      <?php if(!$row['bio']){?>
                        <?=$row['nama']?> is a superhero name in <b>Indonesia</b>, especially in my family. He is not a fictional character but an original hero in my family, a hero for his children and for his wife. So, I use the name as a user in this template. Not a tribute, I'm just bored with <b>'John Doe'</b>.
                      <?php }?>
                      <?php if($row['bio']):?>
                        <?=$row['bio']?>
                      <?php endif?>
                      </div>
                        <div class="card-body">
                          <div class="row">                               
                            <div class="form-group col-md-12 col-12">
                              <label>Nama</label>
                              <input type="text" class="form-control" name="nama" value="<?=$row['nama']?>"  readonly>
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-md-7 col-12">
                              <label>Email</label>
                              <input type="email" class="form-control" name="email"  value="<?=$row['email']?>" readonly>
                            </div>
                            <div class="form-group col-md-5 col-12">
                              <label>nik</label>
                              <input type="tel" class="form-control" name="nik" value="<?=$row['nik']?>" readonly>
                            </div>
                          </div>
                    </div>
                  </div>
                </div>
                <div class="col-sm-5 col-md-5 col-lg-5 mt-md-5">
                  <div class="card">
                      <div class="card-header">
                        <h4>Jump To</h4>
                      </div>
                      <div class="card-body">
                        <ul class="nav nav-pills flex-column">
                          <li class="nav-item"><a href="/" class="nav-link active">Home</a></li>
                          <li class="nav-item"><a href="/profile/pesanan/<?=$row['id_user']?>" class="nav-link">Pesanan Saya</a></li>
                          <li class="nav-item"><a href="/profile/edit/<?=$row['id_user']?>" class="nav-link">Update Profile</a></li>
                          <li class="nav-item"><a href="/logout" class="nav-link">Logout</a></li>
                        </ul>
                      </div>
                      <?php }?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
  <script>
    // Get the modal
      var modal = document.getElementById("myModal");

      // Get the image and insert it inside the modal - use its "alt" text as a caption
      var img = document.getElementById("myImg");
      var modalImg = document.getElementById("img01");
      var captionText = document.getElementById("caption");
      img.onclick = function(){
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
      }

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
        modal.style.display = "none";
      }
  </script>
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
</body>
</html>