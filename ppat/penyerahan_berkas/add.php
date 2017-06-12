<?php 
    if (isset($_POST['simpan'])) {
       if (!empty($_FILES) && $_FILES['file']['size'] >0 && $_FILES['file']['error'] == 0) {
                          $fileName = $_FILES['file']['name'];
                          $move = move_uploaded_file($_FILES['file']['tmp_name'], '../dokumen/'.$fileName);
                     if ($move) {
                        $tanggal_sekarang  = date('d');

                        if ($tanggal_sekarang <= 10) {
                          $queryinsert  = mysql_query("INSERT INTO penyerahan_berkas
                                                                 (tgl_penyerahan,berkas,status_penyerahan,  idpengguna) 
                                                        VALUES (NOW(),'".$fileName."','MENYERAHKAN BERKAS','".$_SESSION['idpengguna']."') ");
                        }else{
                          $queryinsert  = mysql_query("INSERT INTO penyerahan_berkas
                                                                 (tgl_penyerahan,berkas,status_penyerahan,  idpengguna) 
                                                        VALUES (NOW(),'".$fileName."','ANDA TERLAMBAT MENYERAHKAN BERKAS','".$_SESSION['idpengguna']."') ");
                        }

                     }
                      if ($queryinsert) {
                           echo "<script> alert('Terimakasih Data Berhasil Disimpan'); location.href='index.php?hal=penyerahan_berkas/list' </script>";exit;
                     }

          }
         
    }
 ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Serahkan Berkas</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Penyerahan Berkas</a></li>
        <li class="active">Tambah</li>
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
                  <input type="text" class="form-control" value="<?php echo $_SESSION['namalengkap']; ?>" disabled>
              </div>
              <div class="form-group">
                <label>Upload Berkas PPAT Ke BPN</label>
                  <input type="file"  class="form-control" required name="file" >
              </div>
              <div class="form-group pull-right">
                <button type="submit" name="simpan" class="btn btn-primary"> <span class="fa fa-save"></span> SERAHKAN BERKAS KE BPN</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>