  <aside class="main-sidebar">
    <section class="sidebar">
      <div class="user-panel">
        <div class="pull-left image">
          <img src="../logobpn.png" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p><?php echo $_SESSION['namalengkap']; ?></p>
        </div>
      </div>
      <ul class="sidebar-menu">
        <li class="header">MAIN NAVIGATION</li>
        <li><a href="index.php"><i class="fa fa-th"></i> <span>MENU UTAMA</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>DATA PPAT</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?hal=verifikasi/belumdiverifikasi"><i class="fa fa-circle-o"></i>Data PPAT</a></li>
            <li><a href="index.php?hal=verifikasi/terverifikasi"><i class="fa fa-circle-o"></i>Verifikasi</a></li>
          </ul>
        </li>
        <!--<li><a href="index.php?hal=penyerahan_berkas/list"><i class="fa fa-check"></i> <span>PENYERAHAN BERKAS</span></a></li>-->
        <li><a href="index.php?hal=teguran/list"><i class="fa fa-check"></i> <span>TEGURAN</span></a></li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-file"></i>
            <span>LAPORAN PPAT</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="index.php?hal=laporan/filterlaporan"><i class="fa fa-circle-o"></i> LAPORAN PERIODE AKTA</a></li>
            <li><a href="index.php?hal=laporan/filterppatkeseluruhan"><i class="fa fa-circle-o"></i> LAPORAN KESELURUHAN</a></li>
          </ul>
        </li>
        <li><a href="index.php?hal=setting"> <i class="fa fa-gear"></i> <span>PENGATURAN</span> </a></li>
        <li><a href="index.php?logout=1"> <span>KELUAR</span> <i class="fa fa-arrow-right"></i></a></li>
      </ul>
    </section>
  </aside>
