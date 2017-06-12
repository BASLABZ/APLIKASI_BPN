<?php 
  $row_data_teguran = mysql_fetch_array(mysql_query("SELECT * FROM pengguna p JOIN teguran t ON p.idpengguna = t.idpengguna where t.idteguran = '".$_GET['idteguran']."'"));
  if (isset($_POST['simpan_teguran'])) {
    
         if (!empty($_FILES) && $_FILES['file']['size'] >0 && $_FILES['file']['error'] == 0) {
                          $fileName = $_FILES['file']['name'];
                          $move = move_uploaded_file($_FILES['file']['tmp_name'], '../dokumen/'.$fileName);
                     if ($move) {
                        $query = mysql_query("UPDATE teguran set tgl_konfirmasi = NOW(), bulan = '".$row_data_teguran['bulan']."',idpengguna = '".$row_data_teguran['idpengguna']."' , file_teguran='".$fileName."'");
                        if ($query) {
                           echo "<script> alert('Terimakasih Data Teguran Berhasil Disimpan'); location.href='index.php?hal=teguran/list' </script>";exit;
                        }
                     }
                  }
  }
 ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Teguran Pengguna Pada Bulan <?php echo date('m'); ?></h1>
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
                <h3 class="box-title"><span class="fa fa-envelope"></span> Kirim Teguran Ke PPAT</h3>
              </div>
              <div class="box-body">
               <form class="role" method="POST" enctype="multipart/form-data">
                 <div class="row">
                   <div class="col-md-6">
                     <div class="form-group">
                       <label>PPAT</label>
                       <input type="text" class="form-control" disabled="" value="<?php echo $row_data_teguran['namalengkap']; ?>">
                     </div>
                   </div>
                </div>
                <div class="row">
                   <div class="col-md-6">
                     <div class="form-group">
                       <label>BULAN</label>
                       <!--<input type="text" class="form-control" disabled="" value="<?php echo $row_data_teguran['bulan']; ?>">-->
                       <select class="form-control" name="bulan" required>
                          <option value="01" <?php if($row_data_teguran['bulan']=='01'){echo "selected=selected";}?>>JANUARI</option>
                          <option value="02" <?php if($row_data_teguran['bulan']=='02'){echo "selected=selected";}?>>FEBRUARI</option>
                          <option value="03" <?php if($row_data_teguran['bulan']=='03'){echo "selected=selected";}?>>MARET</option>
                          <option value="04" <?php if($row_data_teguran['bulan']=='04'){echo "selected=selected";}?>>APRIL</option>
                          <option value="05" <?php if($row_data_teguran['bulan']=='05'){echo "selected=selected";}?>>MEI</option>
                          <option value="06" <?php if($row_data_teguran['bulan']=='06'){echo "selected=selected";}?>>JUNI</option>
                          <option value="07" <?php if($row_data_teguran['bulan']=='07'){echo "selected=selected";}?>>JULI</option>
                          <option value="08" <?php if($row_data_teguran['bulan']=='08'){echo "selected=selected";}?>>AGUSTUS</option>
                          <option value="09" <?php if($row_data_teguran['bulan']=='09'){echo "selected=selected";}?>>SEPTEMBER</option>
                          <option value="10" <?php if($row_data_teguran['bulan']=='10'){echo "selected=selected";}?>>OKTOBER</option>
                          <option value="11" <?php if($row_data_teguran['bulan']=='11'){echo "selected=selected";}?>>NOVEMBER</option>
                          <option value="12" <?php if($row_data_teguran['bulan']=='12'){echo "selected=selected";}?>>DESEMBER</option>      
                        </select>
                     </div>
                   </div>
                </div>
                <div class="row">
                   <div class="col-md-6">
                     <div class="form-group">
                       <label>KIRIM TEGURAN KE PPAT</label>
                       <input type="file" class="form-control" name="file">
                       <label><?php echo $row_data_teguran['file_teguran']; ?></label>
                     </div>
                   </div>
                </div>
                <div class="row">
                 <div class="col-md-6">
                    <div class="form-group">
                  <button type="submit" class="btn btn-primary" name="simpan_teguran"><span class="fa fa-save"></span> Ubah</button>
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