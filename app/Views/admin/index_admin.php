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
                      $order = $dataPending + $dataBayar;
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
                          <th>Hotel</th>
                          <th>Pemesan</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>                         
                        <tr>
                          <td>
                            OYO KEDIRI
                          </td>
                          <td>
                            <a href="#" class="font-weight-600"><img src="<?=base_url('assets/img/avatar/avatar-1.png')?>" alt="avatar" width="30" class="rounded-circle mr-1"> Bagus Dwi Cahya</a>
                          </td>
                          <td>
                             Pending
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Ichikiwir
                          </td>
                          <td>
                            <a href="#" class="font-weight-600"><img src="<?=base_url('assets/img/avatar/avatar-1.png')?>" alt="avatar" width="30" class="rounded-circle mr-1"> Bagus Dwi Cahya</a>
                          </td>
                          <td>
                            Dibayar
                          </td>
                        </tr>
                        <tr>
                          <td>
                            Wer-Ewer
                          </td>
                          <td>
                            <a href="#" class="font-weight-600"><img src="<?=base_url('assets/img/avatar/avatar-1.png')?>" alt="avatar" width="30" class="rounded-circle mr-1"> Bagus Dwi Cahya</a>
                          </td>
                          <td>
                            CheckOut
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
        </div>
          
<?=$this->endSection()?>