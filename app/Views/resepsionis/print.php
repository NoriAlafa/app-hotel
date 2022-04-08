<!doctype html>
<html lang="en">
  <head>
   <title>Print</title>
  </head>
  <body>
    <!-- Main Content -->  
    <?php $no=1; foreach ($dataRev as $row) : ?>
      <h2>STRUK PEMBAYARAN</h2>
      <hr>
      <p>Invoice:<?=$row['invoice']?></p>
      <p>Nama:<?=$row['nama']?></p>
      <p>Tanggal:<?=date('d F, Y')?></p>
      <p></p>

      <div class="item" style="float:left;font-size:11px;">
        <p >ITEM</p>
        <p><?=$row['nama_kamar'].'-'.$row['tipe_kamar']?></p>
      </div>

      <div class="item" style="float:left;margin-left: 10px;font-size:11px;">
        <p >HARGA</p>
        <p><?=number_format($row['harga_kamar'])?></p>

      </div>

      <div class="item" style="float:left;margin-left: 10px;font-size:11px;">
        <p >PEMBAYARAN</p>
        <p ><?=number_format($row['pembayaran'])?></p>
      </div>

    <?php endforeach?>   
</body>
</html>