<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>
  <div class="container">
    <!-- Main Content -->
      <div class="main-content">
          <div class="section-body">
            <div class="invoice">
              <div class="invoice-print">
                <div class="row">
                  <div class="col-lg-12">
                    <?php $no=1; foreach ($dataRev as $row) : ?>
                    <div class="invoice-title">
                      <h2>Invoice</h2>
                      <div class="invoice-number">Order #<?=$row['invoice']?></div>
                    </div>
                    <hr>
                    <div class="penutup">
                      <div >
                        <address style="float:left;">
                          <strong>Billed To:</strong><br>
                            <?=$row['nama']?><br>
                            <?=$row['email']?><br>
                            <?=$row['nik']?><br>
                        </address>
                        <address style=" margin-left: 400px;">
                          <strong>PAID To:</strong><br>
                          FAHOTEL<br>
                          1234 Main<br>
                          Jatim Indah<br>
                          Kediri, Indonesia
                        </address>
                      </div>
                    </div>
                  </div>
                </div>
                
                <div class="row mt-4">
                  <div class="col-md-12">
                    <div class="section-title">Order Summary</div>
                    <p class="section-lead">All items here cannot be deleted.</p>
                    <div class="table-responsive">
                      <table class="table table-striped table-hover table-md">
                        <tr>
                          <th data-width="40">#</th>
                          <th>Kamar</th>
                          <th class="text-center">Price</th>
                          <th class="text-center">Tamu</th>
                          <th class="text-right">Pembayaran</th>
                        </tr>
                        <tr>
                          <td><?=$no++?></td>
                          <td><?=$row['nama_kamar']?></td>
                          <td class="text-center">Rp <?=number_format($row['harga_kamar'])?></td>
                          <td class="text-center"><?=$row['jumlah_tamu']?></td>
                          <td class="text-right">Rp <?=number_format($row['pembayaran'])?></td>
                        </tr>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <?php endforeach?>
              <hr>
            </div>
          </div>
        </section>
      </div>
  </div>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

  </body>
</html>