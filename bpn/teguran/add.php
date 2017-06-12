<?php 
//   $row_data_teguran = mysql_fetch_array(mysql_query("SELECT * FROM pengguna where idpengguna = '".$_GET['id']."'"));
  if (isset($_POST['simpan_teguran'])) {
    
         if (!empty($_FILES) && $_FILES['file']['size'] >0 && $_FILES['file']['error'] == 0) {
                          $fileName = $_FILES['file']['name'];
                          $move = move_uploaded_file($_FILES['file']['tmp_name'], '../dokumen/'.$fileName);
                     if ($move) {
                        $query = mysql_query("INSERT INTO teguran (tgl_konfirmasi,bulan,file_teguran,idpengguna) 
                                                VALUES (NOW(),'".$_POST['bulan']."','".$fileName."','".$_POST['idpengguna']."') ");
                        if ($query) {
                           echo "<script> alert('Terimakasih Data Teguran Berhasil Disimpan'); location.href='index.php?hal=teguran/list' </script>";exit;
                        }
                     }
                  }
  }
 ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Teguran Pengguna</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Teguran</a></li>
        <li class="active">Bulan : <?php echo date('m'); ?></li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
          <div class="col-md-12">
            <div class="box box-danger">
              <div class="box-header">
                <h3 class="box-title"><span class="fa fa-envelope"></span> Kirim Teguran Ke PPAT </h3>
              </div>
              <div class="box-body">
               <form class="role" method="POST" enctype="multipart/form-data">
                 <div class="row">
                   <div class="col-md-6">
                     <div class="form-group">
                       <label>PPAT</label>
                        <select class="form-control select2" name="idpengguna">
                        <option>Pilih PPAT</option>
                        <?php 
                          $querypengguna = mysql_query("SELECT * FROM pengguna  where level='ppat' AND idkota='".$_SESSION['idkota']."' order by idpengguna ASC");
                          while ($barispengguna = mysql_fetch_array($querypengguna)) {
                         ?>
                         <option value="<?php echo $barispengguna['idpengguna']; ?>"><?php echo $barispengguna['namalengkap']; ?></option>
                         <?php } ?>
                      </select>
                     </div>
                   </div>
                </div>
                <div class="row">
                   <div class="col-md-6">
                     <div class="form-group">
                       <label>BULAN</label>
                      <select class="form-control select2" name="bulan" required>
                          <option>Pilih Bulan</option>
                          <option value="01">JANUARI</option>
                          <option value="02">FEBRUARI</option>
                          <option value="03">MARET</option>
                          <option value="04">APRIL</option>
                          <option value="05">MEI</option>
                          <option value="06">JUNI</option>
                          <option value="07">JULI</option>
                          <option value="08">AGUSTUS</option>
                          <option value="09">SEPTEMBER</option>
                          <option value="10">OKTOBER</option>
                          <option value="11">NOVEMBER</option>
                          <option value="12">DESEMBER</option>
                        </select>
                     </div>
                   </div>
                </div>
                <div class="row">
                   <div class="col-md-6">
                     <div class="form-group">
                       <label>KIRIM TEGURAN KE PPAT</label>
                       <input type="file" class="form-control" name="file">
                     </div>
                   </div>
                </div>
                <div class="row">
                 <div class="col-md-6">
                    <div class="form-group">
                  <button type="submit" class="btn btn-primary" name="simpan_teguran"><span class="fa fa-save"></span> simpan</button>
                   </div>
                 </div>
                </div> 
               </form>
              </div>
             </div> 
          </div>
      </div>
  </section>
</div>