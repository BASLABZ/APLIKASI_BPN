<?php 
    if (isset($_POST['menyerahkanberkas'])) {
      $bulan_ini = date('m');
      $idpengguna_ppat = $_POST['idpengguna'];

      $query_cek = mysql_fetch_array(mysql_query("SELECT count(bulan) as ceking_number FROM penyerahan_berkas where bulan='".$bulan_ini."' and idpengguna = '".$idpengguna_ppat."'"));
      if ($query_cek['ceking_number'] > 0) {
        echo "<script> alert('BULAN INI PPAT TELAH MENYERAHKAN BERKAS'); location.href='index.php?hal=penyerahan_berkas/add' </script>";exit; 
      }else{
         $query_simpan  = mysql_query("INSERT INTO penyerahan_berkas (tgl_penyerahan,bulan,status_penyerahan,idpengguna)
                                         VALUES(NOW(),'".$bulan_ini."','SUDAH','".$_POST['idpengguna']."')");
      if ($query_simpan) {
        echo "<script> alert('PPAT DIVERFIKASI MENYERAHKAN BERKAS'); location.href='index.php?hal=penyerahan_berkas/list' </script>";exit; 
         }
      }
      
    }
 ?>  
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Konfirmasi PPAT Menyerahkan Berkas </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Konfirmasi PPAT Menyerahkan Berkas </a></li>
        <li class="active">Tambah</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Tambah Data Konfirmasi PPAT menyerahkan Berkas </h3>
            </div>
            <div class="box-body">
              <form class="role" method="POST">
              <div class="form-group">
                <label>NAMA PPAT</label>
                 <select class="form-control select2" name="idpengguna">
                    <option value="">Cari PPAT</option>
                    <?php 
                      $query_ppat = mysql_query("SELECT * FROM pengguna  WHERE idkota = '".$_SESSION['idkota']."' AND level='ppat'");
                      while ($row_ppat = mysql_fetch_array($query_ppat)) {
                     ?>
                     <option value="<?php echo $row_ppat['idpengguna']; ?>"><?php echo $row_ppat['namalengkap']; ?></option>
                    <?php } ?>
                  </select>
              </div>
              <div class="form-group">
                <label>BULAN SEKARANG</label>
                  <input type="text" class="form-control" name="bulan" required disabled="" value="<?php echo date('m'); ?>">
              </div>
              <div class="form-group">
                <input type="hidden" value="SUDAH" name="status">
                <button class="btn btn-success btn-lg" name="menyerahkanberkas" type="submit"><span class="fa fa-check"></span> Telah Menyerahkan Berkas
                </button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>