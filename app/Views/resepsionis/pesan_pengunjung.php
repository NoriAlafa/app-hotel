<?=$this->extend('template/layout')?>
<?=$this->section('content')?>
<div class="flash-data-admin" data-flashdata="<?=session()->getFlashdata('admin')?>"></div>
  <div class="row">
              <div class="col-sm-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>List Kamar</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-1">
                        <thead>                                 
                          <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Pesan</th>
                            <th>Tanggal</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>                                 
                        <?php $no=1; foreach($pesan as $row):?>
                        <tr>
                              <td><?=$no++?></td>
                              <td><?=$row['nama']?></td>
                              <td><?=$row['email']?></td>
                              <td><?=$row['pesan']?></td>
                              <td><?=$row['created_at']?></td>
                              <td><a href="/hapus/pesan/<?=$row['id_pesan']?>" class="btn btn-danger">DELETE</a></td>
                        </tr>
                        <?php endforeach;?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
<?=$this->endSection()?>