<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pesanan Saya</title>
    <link rel="stylesheet" href="<?=base_url('assets/modules/bootstrap/css/bootstrap.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/modules/fontawesome/css/all.min.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/modules/summernote/summernote-bs4.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/modules/bootstrap-social/bootstrap-social.css')?>">
    <!-- Template CSS -->
    <link rel="stylesheet" href="<?=base_url('assets/css/style.css')?>">
    <link rel="stylesheet" href="<?=base_url('assets/css/components.css')?>">
    
</head>
<body>
<div class="container" style="margin-top:80px;">
    <section class="section">
        <div class="section-header">
        <div class="section-header-back">
            <a href="/profile" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
        </div>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-lg-12">
                    <div class="card">
                        <div class="card-header justify-content-center bg-primary text-white font-bold">Daftar Pesanan</div>
                        <div class="card-body">
                            <hr style="height:2px;border-width:0;color:black;background-color:black">
                            <div class="row">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Gambar</th>
                                            <th>Nama Kamar</th>
                                            <th>Harga Kamar</th>
                                            <th>Tamu</th>
                                            <th>Menginap</th>
                                            <th>pembayaran</th>
                                            <th>Status Pemesanan</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no=1; foreach($pesanKamar as $pk):?>
                                        <tr>
                                            <td><?=$no++?></td>
                                            <td><img src="<?=base_url('images/'.$pk['gambar'])?>" height="30px"></td>
                                            <td><?=$pk['nama_kamar']?></td>
                                            <td>Rp <?=number_format($pk['harga_kamar'])?></td>
                                            <td><?=$pk['jumlah_tamu']?></td>
                                            <td>
                                                <?php
                                                $checkIn    = strtotime($pk['tgl_check_in']);
                                                $checkOut   = strtotime($pk['tgl_check_out']);
                                                echo abs( $checkIn- $checkOut)/(60*1440);
                                                ?>
                                                Hari
                                            </td>
                                            <td>Rp <?=number_format($pk['pembayaran'])?></td>
                                            <td>
                                            <?php if($pk['status_rev'] == 'booking'):?>
                                                <span class="badge badge-warning" style="width:80px;"><?=$pk['status_rev']?></span>
                                            <?php endif;?>
                                            <?php if($pk['status_rev'] == 'bayar'):?>
                                                <span class="badge badge-success" style="width:80px;"><?=$pk['status_rev']?></span>
                                            <?php endif;?>
                                            <?php if($pk['status_rev'] == 'out'):?>
                                                <span class="badge badge-danger" style="width:80px;"><?=$pk['status_rev']?></span>
                                            <?php endif;?>
                                            </td>
                                            <td><a href="/pesanan/print/<?=$pk['id_reservasion']?>" target="_blank" class="btn btn-primary">Print</a></td>
                                        </tr>
                                    </tbody>
                                    <?php endforeach?>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
</div>
<script src="<?=base_url('assets/modules/summernote/summernote-bs4.js')?>"></script>
<script src="<?=base_url('assets/modules/bootstrap/js/bootstrap.min.js')?>"></script>
<!-- Template JS File -->
<script src="<?=base_url('assets/js/scripts.js')?>"></script>
<script src="<?=base_url('assets/js/custom.js')?>"></script>
</body>
</html>