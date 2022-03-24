<?=$this->extend('template/layout')?>

<?=$this->section('content')?>
<div class="flash-data-resep" data-flashdata="<?=session()->getFlashdata('resep')?>"></div>
    <?php foreach($detail as $dtl):?>
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-12">
                <?php 
                    $statusKamar = $dtl['tipe_kamar'] == 'VIP';
                ?>
                <div class="card <?=$statusKamar  ? 'bayangan' :'shadow p-3 mb-5 bg-white rounded'?>">
                    <div class="card-header <?=$statusKamar  ? 'text-white' :''?>"><?=$judul?></div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-sm-6 col-md-6 col-lg-6">
                                <img src="<?=base_url('images/'.$dtl['gambar'])?>" style="height:300px;">
                            </div>
                            <div class="col-sm-6 col-md-6 col-lg-6 <?=$statusKamar ? 'text-white' :''?> ">
                                <label>Nama Kamar: </label><?=' ' . $dtl['nama_kamar']?><br>
                                <label>Tipe: </label><?=' ' .$dtl['tipe_kamar']?><br>
                                <label>Harga: </label><?=' ' .$dtl['harga_kamar']?><br>
                                <label>Status: </label><?=' ' .$dtl['status_kamar']?><br>
                                <label>DiBuat: </label><?=' ' .$dtl['created_at']?><br>
                                <label>Fasilitas: </label> <?=' ' .$dtl['nama_fasilitas']?><br>
                            </div>
                        </div>
                    </div>
                </div>
                <a href="/dataHotel" class="btn btn-primary form-control">Kembali</a>
            </div>
        </div>
    <?php endforeach?>
<?=$this->endSection()?>