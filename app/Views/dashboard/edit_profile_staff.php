<?=$this->extend('template/layout')?>
<?=$this->section('content')?>

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
                <form action="/profile/staff/update" method="post" class="needs-validation" enctype="multipart/form-data">
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
                        <textarea class="summernote-simple" name="bio" ><?=old('bio',$row['bio'])?></textarea>
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
                        <span class=" text-danger">Note: jika tidak ingin mengubah kata sandi masukan kata sandi yang sama</span>
                        <input type="password" name="password" class="form-control inputtags  <?=$validation->hasError('password') ? 'is-invalid' : null ?>">
                        <div class="invalid-feedback">
                            <?=$validation->getError('password');?>
                        </div>
                    </div>
                </div
                >
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