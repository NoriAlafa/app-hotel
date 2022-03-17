<?=$this->extend('template/layout')?>
<?=$this->section('content')?>
<div class="container " style="margin-top:100px;">
    <section class="section">
        <div class="section-header">
            <div class="section-header-back">
                <a href="/user/view" class="btn btn-icon"><i class="fas fa-arrow-left"></i></a>
            </div>
            <div class="section-header-breadcrumb">
              <div class="breadcrumb-item active"><a href="/">Dashboard</a></div>
              <div class="breadcrumb-item">User</div>
              <div class="breadcrumb-item">User Detail</div>
            </div>
        </div> 
        <div class="section-body">
            <div class="card">
                <div class="card-header bg-primary font-weight-bold text-white">
                    <?=$judul?>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-md-12 col-lg-12">
                            <?php foreach($user as $usr):?>
                            <table > 
                                <thead>
                                    <tr class=" text-center">
                                        <td>ID</td>
                                        <td>Nama</td>
                                        <td>Nik</td>
                                        <td>Email</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><?=$usr['id_user']?></td>
                                        <td><?=$usr['nama']?></td>
                                        <td><?=$usr['nik']?></td>
                                        <td><?=$usr['email']?></td>
                                    </tr>
                                </tbody>
                            </table>
                            <?php endforeach?>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </section>
</div>
<?=$this->endSection()?>