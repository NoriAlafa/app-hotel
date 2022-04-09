<?=$this->extend('template/layout')?>
<?=$this->section('content')?>
<div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="flash-data-services" data-flashdata="<?=session()->getFlashdata('services')?>"></div>
        <div class="card">
            <div class="card-header">
                <h4>List Service</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped" id="table-1">
                    <thead>                                 
                        <tr>
                            <th>No</th>
                            <th>Services</th>
                            <th>Detail</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no=1; foreach($service as $svc):?>                                 
                        <tr>
                            <td><?=$no++?></td>
                            <td><?=$svc['services']?></td>
                            <td style="list-style:none;"><?=$svc['detail_services']?></td>
                            <td><img src="<?=base_url('images/services/'.$svc['img'])?>" style="height:80px; width:80px;"></td>
                            <td>
                                 <a href="/services/edit/<?=$svc['id_services']?>" class="btn btn-primary">EDIT</a>
                                 <a href="/services/hapus/<?=$svc['id_services']?>" class="delete-services btn btn-danger mt-sm-3">DELETE</a>
                            </td>
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