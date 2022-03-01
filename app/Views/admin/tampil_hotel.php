<?=$this->extend('template/layout')?>
<?=$this->section('content')?>
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
                            <th>ID</th>
                            <th>Nama Kamar</th>
                            <th>Deskripsi</th>
                            <th>Tipe Kamar</th>
                            <th>Harga Kamar</th>
                            <th>Status</th>
                            <th>Fasilitas</th>
                            <th>Gambar</th>
                            <th>Dibuat</th>
                            <th>Diupdate</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>                                 
                            <?php foreach($kamar as $kmr):?>
                              <tr>
                                  <td><?=$kmr['id_kamar']?></td>
                                  <td><?=$kmr['nama_kamar']?></td>
                                  <td><?=$kmr['deskripsi']?></td>
                                  <td><?=$kmr['tipe_kamar']?></td>
                                  <td><?=$kmr['harga_kamar']?></td>
                                  <td><?=$kmr['status']?></td>
                                  <td><?=$kmr['fasilitas']?></td>
                                  <td><img src="<?=base_url("images/" . $kmr['gambar'])?>" style="height:30px;"></td>
                                  <td><?=$kmr['created_at']?></td>
                                  <td><?=$kmr['updated_at']?></td>
                                  <td><a href="/kamar/<?=$kmr['id_kamar']?>/edit">EDIT</a>|<a href="/kamar/<?=$kmr['id_kamar']?>/delete" class="tombol-hapus">DELETE</a></td>
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