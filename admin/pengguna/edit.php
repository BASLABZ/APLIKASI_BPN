<?php 
	$id  = $_GET['id'];
	$baris = mysql_fetch_array(mysql_query("SELECT * FROM pengguna where idpengguna = '".$id."'"));
	// fungsi ubah data
	if (isset($_POST['ubah'])) {
		$query = mysql_query("UPDATE pengguna SET 
                            NPWP = '".$_POST['NPWP']."',
                            namalengkap = '".$_POST['namalengkap']."',
		  										  username 	= '".$_POST['username']."',
		  										  password = md5('".$_POST['password']."'),
                            notelp 	= '".$_POST['notelp']."',
		  										  alamat 	= '".$_POST['alamat']."',

		  										  level 	=  '".$_POST['level']."'	
		  									WHERE idpengguna = '".$id."'");	
		if ($query) {
			echo "<script> alert('Data Berhasil Diubah'); location.href='index.php?hal=pengguna/list' </script>";exit;
		}
	}
 ?>
   <div class="content-wrapper">
    <section class="content-header">
      <h1>Master Pengguna</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Master Pengguna</a></li>
        <li class="active">Tambah</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
        <div class="col-md-6">
          <div class="box box-danger">
            <div class="box-header">
              <h3 class="box-title">Tambah Data Master Pengguna</h3>
            </div>
            <div class="box-body">
              <form class="role" method="POST">
              <div class="form-group">
                <label>NPWP</label>
                <input type="text" class="form-control" value="<?php echo $baris['NPWP']; ?>" name="NPWP" required>
              </div>
              <div class="form-group">
                <label>Nama Lengkap</label>
                  <input type="text" class="form-control" name="namalengkap" required value="<?php echo $baris['namalengkap']; ?>">
              </div>
              <div class="form-group">
                <label>Username</label>
                <input type="text" class="form-control" name="username" required value="<?php echo $baris['username']; ?>">
              </div>
              <div class="form-group">
                <label>No.Telp</label>
                <input type="number" class="form-control" name="notelp" required value="<?php echo $baris['notelp']; ?>">
              </div>
              <div class="form-group">
                <label>Alamat</label>
                <textarea class="form-control" name="alamat" required><?php echo $baris['alamat']; ?></textarea>
              </div>
              <div class="form-group">
                <label>Level Pengguna</label>
                <select class="form-control" name="bulan" required>
                          <option>Pilih Bulan</option>
                          
                          <option value="01" <?php if($baris['bulan']=='01'){echo "selected=selected";}?>>JANUARI</option>
                          <option value="02" <?php if($baris['bulan']=='02'){echo "selected=selected";}?>>FEBRUARI</option>
                          <option value="03" <?php if($baris['bulan']=='03'){echo "selected=selected";}?>>MARET</option>
                          <option value="04" <?php if($baris['bulan']=='04'){echo "selected=selected";}?>>APRIL</option>
                          <option value="05" <?php if($baris['bulan']=='05'){echo "selected=selected";}?>>MEI</option>
                          <option value="06" <?php if($baris['bulan']=='06'){echo "selected=selected";}?>>JUNI</option>
                          <option value="07" <?php if($baris['bulan']=='07'){echo "selected=selected";}?>>JULI</option>
                          <option value="08" <?php if($baris['bulan']=='08'){echo "selected=selected";}?>>AGUSTUS</option>
                          <option value="09" <?php if($baris['bulan']=='09'){echo "selected=selected";}?>>SEPTEMBER</option>
                          <option value="10" <?php if($baris['bulan']=='10'){echo "selected=selected";}?>>OKTOBER</option>
                          <option value="11" <?php if($baris['bulan']=='11'){echo "selected=selected";}?>>NOVEMBER</option>
                          <option value="12" <?php if($baris['bulan']=='12'){echo "selected=selected";}?>>DESEMBER</option>
                              
                </select>
              </div>
               <div class="form-group">
                <label>Kota</label>
                <input type="text"  value="<?php echo $row_kota['nama_kota']; ?>" class='form-control' disabled>
                <input type="hidden" name="idkota" value="<?php echo $row_kota['idkota']; ?>" >
              </div>

              <div class="form-group pull-right">
                <button type="submit" name="ubah" class="btn btn-primary"> <span class="fa fa-edit"></span> Ubah</button>
              </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>