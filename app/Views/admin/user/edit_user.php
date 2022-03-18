<?=$this->extend('template/layout')?>

<?=$this->section('content')?>
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="/user/view" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <div class="flash-data-resep" data-flashdata="<?=session()->getFlashdata('resep')?>"></div>

            <h1><?=$judul?></h1>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
              <div class="breadcrumb-item">Posts</div>
              <div class="breadcrumb-item">Edit</div>
            </div>
          </div>

          <div class="section-body">
            <h2 class="section-title"><?=$judul?></h2>
            <p class="section-lead">
            </p>
            <?php $validation = \Config\Services::validation();?>
            <form action="/user/update" method="post" class="needs-validation">
              <?= csrf_field(); ?>
            <?php foreach($user as $row):?>
            <input type="hidden" name="_method" value="put">
            <div class="row">
              <div class="col-12">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                  <div class="card-header">
                    <h4>Edit user</h4>
                  </div>
                  <input type="hidden" name="id_user" value="<?=$row['id_user']?>">
                  <div class="card-body">
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control <?=$validation->hasError('nama') ? 'is-invalid' : null ?>"  name="nama" value="<?=old('nama',$row['nama'])?>">
                        <div class="invalid-feedback">
                            <?=$validation->getError('nama');?>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Email</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control <?=$validation->hasError('email') ? 'is-invalid' : null ?>" value="<?=old('email',$row['email'])?>" name="email">
                        <div class="invalid-feedback">
                            <?=$validation->getError('email');?>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bio</label>
                      <div class="col-sm-12 col-md-7">
                        <textarea class="summernote-simple <?=$validation->hasError('bio') ? 'is-invalid' : null ?>" name="bio" ><?=old('bio',$row['bio'])?></textarea>
                        <div class="invalid-feedback">
                            <?=$validation->getError('bio');?>
                        </div>
                      </div>
                    </div>
                    
                    
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">nik</label>
                      <div class="col-sm-12 col-md-7">
                        <input type="number" class="form-control <?=$validation->hasError('nik') ? 'is-invalid' : null ?>" name="nik" value="<?=old('nik',$row['nik'])?>">
                        <div class="invalid-feedback">
                            <?=$validation->getError('nik');?>
                        </div>
                      </div>
                    </div>

                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <button class="btn btn-primary" type="submit">Update </button>
                      </div>
                    </div>
                    <?php endforeach?>
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