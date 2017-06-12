
<div class="content-wrapper" style="min-height: 1126px;">
    <section class="content-header">
      <h1>Home </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Dashboard</a></li>
        <li class="active">Invoice</li>
      </ol>
    </section>
    <div class="pad margin no-print ">
      <div class="callout callout-info dim_about" style="margin-bottom: 0!important;">
        <h4><i class="fa fa-exclamation-triangle fa-2x"></i> Pemberitahuan: </h4>

            **Terdapat 
            <button class="btn btn-flat btn-xs btn-danger">
            <span class="fa fa-exclamation-triangle"></span>
              <?php 
                $jumlahdata =  mysql_query("SELECT count(verifikasi)  as jumlah from ppat where verifikasi='BELUM DIVERIFIKASI' ");
                while ($jumlah  = mysql_fetch_array($jumlahdata)) {
                  echo $jumlah['jumlah'];
                }
                ?>
             Data Yang Perlu DIVERIFIKASI </button> , Silahkan Cek Data Verifikasi Dari PPAT <a href="index.php?hal=verifikasi/belumdiverifikasi">Cek Data <span class="fa fa-arrow-right"></span></a>
      </div>
    </div>
    <section class="invoice dim_about">
      <div class="row">
        <div class="col-xs-12 ">
          <h2 class="page-header">
            <center><img src="../logobpn.png" class="200x195px"> <br>SISTEM INFROMASI BPN-PPAT</center>
            <small class="pull-right">Tanggal : <?php echo date('d-m-Y'); ?></small>
          </h2>
        </div>
      </div>
    </section>
    <div class="clearfix"></div>
  </div>