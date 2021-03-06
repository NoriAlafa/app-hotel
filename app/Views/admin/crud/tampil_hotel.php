<?=$this->extend('template/layout')?>
<?=$this->section('content')?>
  <div class="flash-data" data-flashdata="<?=session()->getFlashdata('success')?>"></div>
  <div class="flash-data-resep" data-flashdata="<?=session()->getFlashdata('resep')?>"></div>
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
                            <?php $no=1; foreach($kamar as $kmr):?>
                              <tr>
                                  <td><?=$no++?></td>
                                  <td><?=$kmr['nama_kamar']?></td>
                                  <td><?=$kmr['tipe_kamar']?></td>
                                  <td>Rp <?=number_format($kmr['harga_kamar'])?></td>
                                  <td><?=$kmr['status_kamar']?></td>
                                  <td style="list-style:none;"><?=$kmr['nama_fasilitas']?></td>
                                  <td><img src="<?=base_url('images/'.$kmr['gambar'])?>" style="height:80px; width:80px;"></td>
                                  <td><?=$kmr['created_at']?></td>
                                  <td><?=$kmr['updated_at']?></td>
                                  <td>
                                     <a href="/kamar/<?=$kmr['id_kamar']?>/edit">EDIT</a>
                                     <a href="/kamar/<?=$kmr['id_kamar']?>/delete" class="tombol-hapus">DELETE</a>
                                     <a href="/kamar/<?=$kmr['id_kamar']?>/detail">DETAIL</a>
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