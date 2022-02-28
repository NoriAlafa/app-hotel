<?=$this->extend('template/layout')?>

<?=$this->section('content')?>
          <div class="row">
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-title">Kamar Statistik - 
                  </div>
                  <div class="card-stats-items">
                  <div class="card-stats-item">
                      <div class="card-stats-item-count"><?=$dataPending?></div>
                      <div class="card-stats-item-label">Dibooking</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count"><?=$dataBayar?></div>
                      <div class="card-stats-item-label">Dibayar</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count"><?=$dataOut?></div>
                      <div class="card-stats-item-label">CheckOut</div>
                    </div>
                  </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-archive"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Orders</h4>
                  </div>
                  <div class="card-body">
                    <?php
                      $order = $dataPending + $dataBayar + $dataOut;
                      echo $order;
                    ?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-title">Kamar Status - 
                  </div>
                  <div class="card-stats-items">
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">
                        <?= $statusAda;?> 
                      </div>
                      <div class="card-stats-item-label">Tersedia</div>
                    </div>
                    <div class="card-stats-item">
                      <div class="card-stats-item-count">
                      <?=$statusKosong?>
                      </div>
                      <div class="card-stats-item-label">Kosong</div>
                    </div>
                  </div>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-bed"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>Total Kamar</h4>
                  </div>
                  <div class="card-body">
                  <?=$viewKamar?>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-4 col-md-4 col-sm-12">
              <div class="card card-statistic-2">
                <div class="card-stats">
                  <div class="card-stats-title">Pengguna</div>
                </div>
                <div class="card-chart">
                  <a href="#">
                    <h2 class="text-center">Cek User</h2>
                  </a>
                </div>
                <div class="card-icon shadow-primary bg-primary">
                  <i class="fas fa-user"></i>
                </div>
                <div class="card-wrap">
                  <div class="card-header">
                    <h4>User</h4>
                  </div>
                  <div class="card-body">
                    <?= $viewUser;?>
                  </div>
                </div>
              </div>
            </div>
        </div>

        <div class="row">
        <div class="col-lg-12 col-md-12 col-12 col-sm-12">
              <div class="card">
                <div class="card-header">
                  <h4>Detail Pemesanan</h4>
                  <div class="card-header-action">
                    <a href="#" class="btn btn-primary">View All</a>
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped mb-0">
                      <thead>
                        <tr>
                          <th>ID</th>
                          <th>Check In</th>
                          <th>Check Out</th>
                          <th>Info Bayar</th>
                          <th>Pembayaran</th>
                          <th>Status Kamar</th>
                          <th>Kamar</th>
                          <th>Pemesan</th>
                        </tr>
                      </thead>
                      <tbody>                         
                        <?php foreach($dataRev as $row):?>
                        <tr>
                          <td><?=$row['id_reservasion']?></td>
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
                          <td>
                              <?php if($row['status'] == 'Tersedia'):?>
                                <span class="badge badge-info" style="width:80px;"><?=$row['status']?></span>
                              <?php endif;?>

                              <?php if($row['status'] == 'Kosong'):?>
                                <span class="badge badge-secondary"style="width:80px;"><?=$row['status']?></span>
                              <?php endif;?>
                          </td>
                          <td><?=$row['nama_kamar']?></td>
                          <td><?=$row['nama']?></td>
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