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
        <li><a href="index.php?hal=pengguna/list"><i class="fa fa-users"></i> <span>MASTER PENGGUNA</span></a></li>
        <li><a href="index.php?hal=setting"> <i class="fa fa-gear"></i> <span>PENGATURAN</span> </a></li>
        <li><a href="index.php?logout=1"> <span>KELUAR</span> <i class="fa fa-arrow-right"></i></a></li>
      </ul>
    </section>
  </aside>
