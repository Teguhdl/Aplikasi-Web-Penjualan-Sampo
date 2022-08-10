
      <div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Kopinus</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Kp</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>

              <?php 
             $session = session();
             if($session->get('kelompok')=='pemilik')
             {
          ?>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Master Data</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?=base_url('menu/view')?>">Menu</a></li>
                  <li><a class="nav-link" href="<?=base_url('pegawai/view')?>">Pegawai</a></li>
                  <li><a class="nav-link" href="<?=base_url('pelanggan/view')?>">Pelaggan</a></li>
                  <li><a class="nav-link" href="<?=base_url('supplier/view')?>">Supplier</a></li>
                  <li><a class="nav-link" href="<?=base_url('coa/view')?>">Coa</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Transaksi</span></a>
                <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?=base_url('penjualan/viewpenjualan')?>">Penjualan</a></li>
                <li><a class="nav-link" href="<?=base_url('pembebanan/viewpembebanan')?>">pembebanan</a></li>
                <li><a class="nav-link" href="<?=base_url('pemodalan/view')?>">Pemodalan</a></li>
                <li><a class="nav-link" href="<?=base_url('penggajian/viewpenggajian')?>">Penggajian</a></li>
               

                </ul>
              </li>

                <?php 
              }
              else if($session->get('kelompok')!='pemilik')
              {
              ?>
                    <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown" data-toggle="dropdown"><i class="fas fa-columns"></i> <span>Master Data</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?=base_url('menu/view')?>">Menu</a></li>
                  <li><a class="nav-link" href="<?=base_url('pegawai/view')?>">Pegawai</a></li>
                  <li><a class="nav-link" href="<?=base_url('pelanggan/view')?>">Pelaggan</a></li>
                  <li><a class="nav-link" href="<?=base_url('supplier/view')?>">Supplier</a></li>
                  <li><a class="nav-link" href="<?=base_url('coa/view')?>">Coa</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Transaksi</span></a>
                <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?=base_url('penjualan/viewpenjualan')?>">Penjualan</a></li>
                <li><a class="nav-link" href="<?=base_url('pembebanan/viewpembebanan')?>">pembebanan</a></li>
                <li><a class="nav-link" href="<?=base_url('pemodalan/view')?>">Pemodalan</a></li>
                <li><a class="nav-link" href="<?=base_url('penggajian/viewpenggajian')?>">Penggajian</a></li>
               

                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Proyeksi</span></a>
                <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?=base_url('MachineLearning/getProyeksiPenjualan')?>">grafik</a></li>
                <li><a class="nav-link" href="<?=base_url('MachineLearning/getTabelProyeksiPenjualan')?>">tabel</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i> <span>Laporan</span></a>
                <ul class="dropdown-menu">
                <li><a class="nav-link" href="<?=base_url('laporan/viewjurnalumum')?>">Jurnal Umum</a></li>
              <?php
              }
          ?>
                 
                </ul>
              </li>
        </aside>
      </div>