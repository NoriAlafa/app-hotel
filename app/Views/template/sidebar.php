
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?=base_url('/')?>">FAHOTEL</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown">
              <a href="<?=base_url('/dashboard')?>" class="dashboard"><i class="fas fa-fire"></i><span>Dashboard</span></a>
            </li>
            <li class="menu-header">Admin</li>
            <li><a class="nav-link" href="<?=base_url('/dataHotel')?>"><i class="fas fa-bed"></i> <span>List Kamar</span></a></li>
            <li><a class="nav-link" href="<?=base_url('/createRoom')?>"><i class="fas fa-plus"></i> <span>Tambah Kamar</span></a></li>
            <li class="menu-header">Resepsionis</li>
            <li><a class="nav-link" href="<?=base_url('/konfirmasiRoom')?>"><i class="fas fa-lock"></i> <span>Konfirmasi</span></a></li>
            <li class="menu-header">LogOut</li> 
            <li><a class="nav-link" href="<?=base_url('/logout')?>"><i class="far fa-square"></i> <span>Logout</span></a></li>       
        </aside>
    