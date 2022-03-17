<?=$this->extend('template/layout')?>
<?=$this->section('content')?>
<section class="section">
<div class="flash-data-admin" data-flashdata="<?=session()->getFlashdata('admin')?>"></div>
  <div class="row">
        <div class="col-sm-12 col-md-12 col-lg-12">
        <div class="card">
            <div class="card-header">
            <h4>List User</h4>
            </div>
            <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped" id="table-1">
                <thead>                                 
                    <tr>
                        <th>No</th>
                        <th>Nama </th>
                        <th>Email</th>
                        <th>NIK</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no=1; foreach($user as $usr):?>                                 
                    <tr>
                        <td><?=$usr['id_user']?></td>
                        <td><?=$usr['nama']?></td>
                        <td><?=$usr['email']?></td>
                        <td><?=$usr['nik']?></td>
                        <td><a href="/user/detail/<?=$usr['id_user']?>">Detail</a> | <a href="/user/<?=$usr['id_user']?>/edit">Edit</a> </td>
                    </tr>
                    <?php endforeach?>
                </tbody>
                </table>
            </div>
            </div>
        </div>
        </div>
    </div>
</section>
<?=$this->endSection()?>