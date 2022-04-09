<?=$this->extend('template/layout')?>

<?=$this->section('content')?>

<div class="flash-data-resep" data-flashdata="<?=session()->getFlashdata('resep')?>"></div>
<div class="flash-data-fasilitas" data-flashdata="<?=session()->getFlashdata('fasilitas')?>"></div>
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
                <h4><?=$judul?></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                        <thead>                                 
                            <tr>
                                <th>ID</th>
                                <th>Fasilitas Kamar</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody> 
                            <?php $no=1; foreach ($fasilitas as $fslts):?>                                
                                <tr>
                                    <td><?=$no++?></td>
                                    <td style="list-style: none;"><?=$fslts['nama_fasilitas']?></td>
                                    <td><a href="/fasilitas/<?=$fslts['id_fasilitas']?>/edit" class="btn btn-info">EDIT</a> | <a href="/fasilitas/<?=$fslts['id_fasilitas']?>/delete"  class="fas-hapus btn btn-danger">HAPUS</a></td>
                                </tr>
                            <?php endforeach?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?=$this->endSection()?>