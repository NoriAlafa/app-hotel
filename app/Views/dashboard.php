<?=$this->extend('template/layout')?>

<?=$this->section('content')?>
<div class="flash-data-admin" data-flashdata="<?=session()->getFlashdata('admin')?>"></div>
<div class="flash-data-resep" data-flashdata="<?=session()->getFlashdata('resep')?>"></div>
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
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-sm-12 col-lg-12">
          <div class="row">
            <div class="col-md-6 col-lg-6 col-sm-6">
              <div class="card">
                <div class="card-body ml-md-3">
                  <canvas id="myChart2" height="158"></canvas>
                </div>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 col-lg-6 ">
              <div class="card">
                <div class="card-body ml-md-3">
                  <canvas id="myChart" height="524" width="990"></canvas>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</div>
<?=$this->endSection()?>

<?=$this->section('script')?>
<script>
  var ctx = document.getElementById("myChart").getContext('2d');
  var idKamar   = [];
  var namaKamar = [];

  <?php foreach($dataChart->getResult() as $chart):?>
    idKamar.push(<?=$chart->jumlah?>);
    namaKamar.push('<?=$chart->nama_kamar?>');
  <?php endforeach?>

  var myChart = new Chart(ctx, {
  type: 'doughnut',
  data: {
    datasets: [{
      data: idKamar,
      backgroundColor: [
        '#191d21',
        '#63ed7a',
        '#ffa426',
        '#fc544b',
        '#6777ef',
      ],
      label: 'Dataset 1'
    }],
    labels: namaKamar,
  },
  options: {
    responsive: true,
    legend: {
      position: 'bottom',
    },
  }
});

var ctp = document.getElementById("myChart2").getContext('2d');
var pemKamar   = [];
var namKamar = [];

  <?php foreach($barchart->getResult() as $chart):?>
    pemKamar.push(<?=$chart->pembayaran?>);
    namKamar.push('<?=$chart->nama_kamar?>');
  <?php endforeach?>

var myChart2 = new Chart(ctp, {
  type: 'bar',
  data: {
    labels: namKamar,
    datasets: [{
      label: 'Statistics',
      data: pemKamar,
      borderWidth: 2,
      backgroundColor: '#6777ef',
      borderColor: '#6777ef',
      borderWidth: 2.5,
      pointBackgroundColor: '#ffffff',
      pointRadius: 4
    }]
  },
  options: {
    legend: {
      display: false
    },
    scales: {
      yAxes: [{
        gridLines: {
          drawBorder: false,
          color: '#f2f2f2',
        },
        ticks: {
          beginAtZero: true,
          stepSize: 150
        }
      }],
      xAxes: [{
        ticks: {
          display: false
        },
        gridLines: {
          display: false
        }
      }]
    },
  }
});

</script>
<?=$this->endSection()?>