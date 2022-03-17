<?=$this->extend('template/layout')?>
<?=$this->section('content')?>
<div class="container " style="margin-top:100px;">
    <style>
        .page-header {
            height: 100vh;
            max-height: 1050px;
            padding: 0;
            color: #FFFFFF;
            position: relative;
            background-position: center center;
            background-size: cover; }
            .page-header .page-header-image {
                position: absolute;
                background-size: cover;
                background-position: center center;
                width: 100%;
                height: 100%;
                z-index: -1; }
            .page-header footer {
                position: absolute;
                bottom: 0;
                width: 100%; }
            .page-header .container {
                height: 100%;
                z-index: 1;
                text-align: center;
                position: relative; }
                .page-header .container > .content-center {
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                text-align: center;
                padding: 0 15px;
                color: #FFFFFF;
                width: 100%;
                max-width: 880px; }
            .page-header .category,
            .page-header .description {
                color: rgba(255, 255, 255, 0.5); }
            .page-header.page-header-small {
                height: 60vh;
                max-height: 440px; }
            .page-header:after, .page-header:before {
                position: absolute;
                z-index: 0;
                width: 100%;
                height: 100%;
                display: block;
                left: 0;
                top: 0;
                content: ""; }
            .page-header:before {
                background-color: rgba(0, 0, 0, 0.5); }
            .page-header[filter-color="orange"] {
                background: rgba(44, 44, 44, 0.2);
                /* For browsers that do not support gradients */
                /* For Safari 5.1 to 6.0 */
                /* For Opera 11.1 to 12.0 */
                /* For Firefox 3.6 to 15 */
                background: linear-gradient(0deg, rgba(44, 44, 44, 0.2), rgba(224, 23, 3, 0.6));
                /* Standard syntax */ }
            .page-header .container {
                z-index: 2; }
    </style>
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
        <div class="page-content">
            <div>
                <div class="profile-page">
                    <div class="wrapper">
                        <div class="page-header page-header-small" filter-color="green">
                        <div class="page-header-image" data-parallax="true" style="background-image: url('<?=base_url("images/cc-bg-1.jpg")?>')"></div>
                        <div class="container">
                        <?php foreach($user as $usr):?>
                            <div class="content-center">
                            <div class="cc-profile-image"><a href="#"><img src="<?=base_url('images/default.jpg')?>" class=" rounded-circle" alt="Image"/></a></div>
                        </div>
                        
                        </div>
                    </div>
                    </div>
                    <div class="section" id="about">
                    <div class="container">
                        <div class="card" data-aos="fade-up" data-aos-offset="10">
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                            <div class="card-body">
                                <div class="h4 mt-0 title">About</div>
                                <p>Hello! <?=$usr['nama']?>. Web Developer, Graphic Designer and Photographer.</p>
                                <p>Creative CV is a HTML resume template for professionals. Built with Bootstrap 4, Now UI Kit and FontAwesome, this modern and responsive design template is perfect to showcase your portfolio, skills and experience.</p>
                            </div>
                            </div>
                            <div class="col-lg-6 col-md-12">
                            <div class="card-body">
                                    <div class="h4 mt-0 title">Basic Information</div>
                                    <div class="row mt-3">
                                        <div class="col-sm-4"><strong class="text-uppercase">Name:</strong></div>
                                        <div class="col-sm-8"><?=$usr['nama']?></div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-4"><strong class="text-uppercase">Email:</strong></div>
                                        <div class="col-sm-8"><?=$usr['email']?></div>
                                    </div>
                                    <div class="row mt-3">
                                        <div class="col-sm-4"><strong class="text-uppercase">NIK:</strong></div>
                                        <div class="col-sm-8"><?=$usr['nik']?></div>
                                    </div>
                                <?php endforeach?>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>   
    </section>
</div>
<?=$this->endSection()?>