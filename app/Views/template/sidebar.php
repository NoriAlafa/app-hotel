        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="<?=base_url('/')?>">FAHOTEL</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="#">FH</a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Dashboard</li>
            <li class="dropdown ">
              <a href="/"  class="nav-link has-dropdown"><i class="fas fa-fire"></i> <span>Dashboard</span></a>
              <ul class="dropdown-menu">
                <li><a href="<?=base_url('/dashboard')?>" class="nav-link" ><i class="fas fa-fire"></i><span>Dashboard</span></a></li>
                <li><a href="<?=base_url('/user/view')?>" class="nav-link" ><i class="fas fa-user"></i><span>Check User</span></a></li>
              </ul>
            </li>
            <li class="menu-header">Admin</li>
            <li class="dropdown">
              <a href="#"  class="nav-link has-dropdown"><i class="fas fa-bed"></i> <span>Kamar</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?=base_url('/dataHotel')?>"><i class="fas fa-bed"></i> <span>List Kamar</span></a></li>
                <li><a class="nav-link" href="<?=base_url('/createRoom')?>"><i class="fas fa-plus"></i> <span>Tambah Kamar</span></a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#"  class="nav-link has-dropdown"><i class="fas fa-cog"></i> <span>Fasilitas</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?=base_url('/fasilitas/kamar')?>"><i class="fab fa-deviantart"></i><span>Fasilitas</span></a></li>
                <li><a class="nav-link" href="<?=base_url('/fasilitas/tambah')?>"><i class="fas fa-plus"></i><span>Tambah Fasilitas</span></a></li>
              </ul>
            </li>
            <li class="dropdown">
              <a href="#"  class="nav-link has-dropdown"><i class="fas fa-bell"></i> <span>Services</span></a>
              <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?=base_url('/list/services')?>"><i class="fas fa-clipboard-list"></i><span>Services</span></a></li>
                <li><a class="nav-link" href="<?=base_url('/services/tambah')?>"><i class="fas fa-plus"></i><span>Tambah Services</span></a></li>
              </ul>
            </li>
            <li class="menu-header">Resepsionis</li>
            <li><a class="nav-link" href="<?=base_url('/konfirmasiRoom')?>"><i class="fas fa-money-bill-wave"></i> <span>Konfirmasi</span></a></li>
            <li><a class="nav-link" href="<?=base_url('/pesan/pengunjung')?>"><i class="fas fa-envelope"></i><span>Pesan Pengunjung</span></a></li>
            </aside>
    