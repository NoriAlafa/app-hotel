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
                            <th>Pemesan</th>
                            <th>Check In</th>
                            <th>Check Out</th>
                            <th>Info Pemesan</th>
                            <th>Harga Kamar</th>
                            <th>Pembayaran</th>
                            <th>Status Kamar</th>
                            <th>Kamar</th>
                            <th>Aksi</th>
                          </tr>
                        </thead>
                        <tbody>                                 
                        <?php foreach($dataRev as $row):?>
                        <tr>
                              <td><?=$row['id_reservasion']?></td>
                              <td><?=$row['nama']?></td>
                              <td><?=$row['tgl_check_in']?></td>
                              <td><?=$row['tgl_check_out']?></td>
                              <td>
                              <?php if($row['status_rev'] == 'booking'):?>
                                <span class="badge badge-warning" style="width:80px;"><?=$row['status_rev']?></span>
                              <?php endif;?>
                              <?php if($row['status_rev'] == 'bayar'):?>
                                <span class="badge badge-success" style="width:80px;"><?=$row['status_rev']?></span>
                              <?php endif;?>
                              <?php if($row['status_rev'] == 'out'):?>
                                <span class="badge badge-danger" style="width:80px;"><?=$row['status_rev']?></span>
                              <?php endif;?>
                              </td>
                              <td>Rp <?=number_format($row['harga_kamar'])?></td>
                              <td>Rp <?=number_format($row['pembayaran'])?></td>
                              <td>
                                  <?php if($row['status_kamar'] == 'Tersedia'):?>
                                    <span class="badge badge-info" style="width:80px;"><?=$row['status_kamar']?></span>
                                  <?php endif;?>

                                  <?php if($row['status_kamar'] == 'Kosong'):?>
                                    <span class="badge badge-secondary"style="width:80px;"><?=$row['status_kamar']?></span>
                                  <?php endif;?>
                              </td>
                              <td><?=$row['nama_kamar']?></td>
                              <td>
                                <a href="/konfirmasi/<?=$row['id_reservasion']?>/edit" class="btn btn-outline-success">Edit</a>
                                <a href="/print/<?=$row['id_reservasion']?>" class=" btn btn-primary">Print</a>
                              </td>
                              
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