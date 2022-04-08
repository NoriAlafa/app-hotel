<!doctype html>
<html lang="en">
  <head>
    
    <title>Print</title>
  </head>
  <body>
    <h4>STRUK PEMBAYARAN</h4>
    <hr>
      <div class="item" style="float:left;font-size:10px;">
        <p >ITEM</p>
        <?php foreach ($dataRev as $row) : ?>
        <p><?=$row['nama_kamar'].'-'.$row['tipe_kamar']?></p>
        <?php endforeach?>
        <p>Total: Rp 
        <?php foreach ($totalBayar as $row) : ?> 
            <?=number_format($row['total_bayar'])?>
        <?php endforeach?></p>
      </div>

      <div class="item" style="float:left;font-size:10px;">
        <p>INVOICE</p>
        <?php foreach ($dataRev as $row) : ?>
        <p><?=$row['invoice']?></p>
        <?php endforeach?>
      </div>

      <div class="item" style="float:left;font-size:10px;">
        <p>HARGA<?=' '?></p>
        <?php foreach ($dataRev as $row) : ?>
        <p><?=number_format($row['harga_kamar'])?></p>
        <?php endforeach?>
      </div>

      <div class="item" style="float:left;font-size:10px;">
        <p >BAYAR</p>
        <?php foreach ($dataRev as $row) : ?>
        <p ><?=number_format($row['pembayaran'])?> </p>
        <?php endforeach?>
      </div>
      <br/>
        
                           
              
    <!-- Optional JavaScript; choose one of the two! -->

  
  </body>
</html>