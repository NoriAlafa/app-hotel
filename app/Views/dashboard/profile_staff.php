<?=$this->extend('template/layout')?>
<?=$this->section('content')?>
<section class="section">
    <div class="container">
        <div class="section-header">
            <div class="section-header-back">
                <a href="/dashboard" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
        </div>
        <div class="section-body">
            <?php foreach($profile as $row):?>
            <div class="card">
                <div class="card-header  font-weight-bold  bg-info">
                  <h3 style="color:white;"><?=$judul?></h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12 col-sm-12 col-lg-12">
                            <div class="row">
                                <div class="col-md-6 col-sm-6 col-md-6 ">
                                    <div class="form-group col-md-12 col-12">
                                        <label>Nama</label>
                                        <input type="text" class="form-control" value="<?=$row['nama']?>" name="nama"  readonly>
                                    </div>

                                    <div class="form-group col-md-12 col-12 ">
                                        <label>Email</label>
                                        <input type="email" class="form-control" value="<?=$row['email']?>" name="email"  readonly>
                                    </div>

                                    <div class="form-group col-md-12 col-12">
                                        <label>NIK</label>
                                        <input type="number" class="form-control" value="<?=$row['nik']?>" name="nik"  readonly>
                                    </div>

                                    <div class="form-group col-md-12 col-12">
                                        <label>Bio</label><br/>
                                        <?php if(!$row['bio']){?>
                                            <?=$row['nama']?> Belum Mengisi Bio Nya.
                                        <?php }?>
                                        <?php if($row['bio']):?>
                                            <?=$row['bio']?>
                                        <?php endif?>
                                    </div>
                                </div>
                                <div class="col-md-6 col-sm-6 col-md-6">
                                    <img src="<?=base_url('images/profile/' . $row['gambar'])?>" height="300px" width="300px">
                                </div>
                            </div>
                            <a href="/profile/staff/edit/<?=$row['id_user']?>" class=" form-control mt-md-3 btn btn-primary">EDIT</a>
                        </div>
                    </div> <!-- end of row-->
                </div> <!-- end of card-->
            </div> <!-- end of card-->
            <?php endforeach?>
        </div> <!-- end of section body-->
    </div> <!-- end of container-->
</section>
<?=$this->endSection()?>