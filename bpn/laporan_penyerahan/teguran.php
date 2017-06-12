<?php 
    $row = mysql_fetch_array(mysql_query("SELECT * FROM penyerahan_berkas p JOIN pengguna pe ON p.idpengguna=pe.idpengguna where p.idpenyerahan = '".$_GET['id']."'"));
    if (isset($_POST['simpan'])) {
       if (!empty($_FILES) && $_FILES['file']['size'] >0 && $_FILES['file']['error'] == 0) {
                          $fileName = $_FILES['file']['name'];
                          $move = move_uploaded_file($_FILES['file']['tmp_name'], '../dokumen/'.$fileName);
                     if ($move) {

                         $queryinsert  = mysql_query("INSERT INTO teguran (tgl_konfirmasi,file_teguran,idpenyerahan) values (NOW(),'".$fileName."','".$row['idpenyerahan']."')");
                     }
                      if ($queryinsert) {
                           echo "<script> alert('Terimakasih Data Berhasil Disimpan'); location.href='index.php?hal=laporan_penyerahan/list' </script>";exit;
                     }

          }
         
    }
 ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Teguran Berkas</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Penyerahan Berkas</a></li>
        
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Upload Data Berkas</h3>
            </div>
            <div class="box-body">
              <form class="role" method="POST" enctype="multipart/form-data">
              <div class="form-group">
                <label>Nama PPAT</label>
                  <input type="text" class="form-control" value="<?php echo $row['namalengkap']; ?>" disabled>
              </div>
              <div class="form-group">
                <label>TANGGAL PENYERAHAN</label>
                  <input type="text" class="form-control" value="<?php echo $row['tgl_penyerahan']; ?>" disabled>
              </div>
              
              <div class="form-group">
                <label>Upload Berkas Teguran Ke PPAT :</label>
                  <input type="file"  class="form-control" required name="file" >
              </div>
              <div class="form-group pull-right">
                <button type="submit" name="simpan" class="btn btn-primary"> <span class="fa fa-save"></span> TEGURAN BERKAS KE BPN</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>