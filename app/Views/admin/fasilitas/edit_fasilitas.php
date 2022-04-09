<?=$this->extend('template/layout')?>

<?=$this->section('content')?>
<div class="main-content">
    <section class="section">
        <div class="section-header">
        <div class="section-header-back">
            <a href="/fasilitas/kamar" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        <div class="flash-data-resep" data-flashdata="<?=session()->getFlashdata('resep')?>"></div>

        <h1><?=$judul?></h1>
        <div class="section-header-breadcrumb">
            <div class="breadcrumb-item active"><a href="/dashboard">Dashboard</a></div>
            <div class="breadcrumb-item">Fasilitas</div>
            <div class="breadcrumb-item">Edit</div>
        </div>
        </div>
    <div class="section-body">
        <h2 class="section-title"><?=$judul?></h2>
        <form action="/fasilitas/update" method="post" class="needs-validation">
        <input type="hidden" name="_method" value="put">

            <?= csrf_field(); ?>
            <div class="row">
                <?php foreach($fasilitas as $fs):?>
                <div class="col-sm-12 col-md-12 col-lg-12">
                    <div class="card shadow p-3 mb-5 bg-white rounded">
                        <div class="card-body">
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">ID</label>
                                <div class="col-sm-12 col-md-7">
                                    <input type="text" readonly name="id_fasilitas" value="<?=$fs['id_fasilitas']?>" >
                                </div>
                            </div>
                            <div class="form-group row mb-4">
                                <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Fasilitas</label>
                                <div class="col-sm-12 col-md-7">
                                    <textarea class="summernote-simple " name="nama_fasilitas"><?=$fs['nama_fasilitas']?></textarea>
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
                <?php endforeach?>
            </div>
        </form>
    </div>
    </section>
</div>
<?=$this->endSection()?>