<?=$this->extend('template/layout')?>

<?=$this->section('content')?>
<div class="main-content">
        <section class="section">
          <div class="section-header">
            <div class="section-header-back">
              <a href="/user/view" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
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
            <h2 class="section-title"><?=$judul?></h2>
            <p class="section-lead">
            </p>
            <form action="" method="post" enctype="multipart/form-data">
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
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="nama_kamar" value="">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <textarea class="summernote-simple" name="" ></textarea>
                      </div>
                    </div>
                    
                    
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                        <input type="text" class="form-control" name="" value="">
                      </div>
                    </div>
                    <div class="form-group row mb-4">
                      <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                      <div class="col-sm-12 col-md-7">
                          <input type="file"  required name=""  id="" class="form-control"><span></span>
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