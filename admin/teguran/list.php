  <?php 
    if (isset($_GET['hapus'])) {

      $query_hapus_teguran = mysql_query("DELETE FROM teguran where idteguran = '".$_GET['hapus']."'");
      if ($query_hapus_teguran) {
         echo "<script> alert('Terimakasih Data Teguran Berhasil Dihapus'); location.href='index.php?hal=teguran/list' </script>";exit;
      }
    }
   ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>Teguran</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Teguran</a></li>
        <li class="active">Daftar</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
          <div class="col-md-12">
            <div class="box box-danger">
              <div class="box-header">
                <h3 class="box-title">Data Teguran PPAT <a href='index.php?hal=teguran/add' class='btn btn-success'><span class='fa fa-plus'></span> Tambah Teguran</a></h3>
              </div>
              <div class="box-body">
                <table class="table table-responsive table-bordered" id="table">
                <thead>
                  <th>No</th>
                  <th>PPAT</th>
                  <th>Pada Bulan</th>
                  <th>Tanggal Teguran</th>
                  <th>File</th>
                  <th>Aksi</th>
                </thead>
                <tbody>
                  <?php 
                      $no = 0;
                      $query = mysql_query("SELECT * FROM teguran t JOIN pengguna p ON t.idpengguna = p.idpengguna where 
                        level = 'ppat'");
                      while ($baris  = mysql_fetch_array($query)) { ?>
                      <tr>
                                    <td><?php echo ++$no; ?></td>
                                    <td><?php echo $baris['namalengkap']; ?></td>
                                    <td>
                                        
                                        <?php
                                            $bulan  = $baris['bulan'];
                                            $januari = 'Januari';
                                        	$februari = 'Februari';
                                        	$maret = 'Maret';
                                        	$april = 'April';
                                        	$mei = 'Mei';
                                        	$juni = 'Juni';
                                        	$juli = 'Juli';
                                        	$agustus = 'Agustus';
                                        	$sebtember ='September';
                                        	$oktober = 'Oktober';
                                        	$november = 'November';
                                        	$desember = 'Desember';
                                        
                                        	if ($bulan == '01') {
                                        		echo $januari;
                                        	}else if ($bulan == '02') {
                                        		echo $februari;
                                        	}else if ($bulan == '03') {
                                        		echo $maret;
                                        	}else if ($bulan == '04') {
                                        		echo $april;
                                        	}else if ($bulan == '5') {
                                        		echo $mei;
                                        	}else if ($bulan == '6') {
                                        		echo $juni;
                                        	}else if ($bulan == '7') {
                                        		echo $juli;
                                        	}else if ($bulan == '8') {
                                        		echo $agustus;
                                        	}else if ($bulan =='9')  {
                                        		echo $sebtember;
                                        	}else if ($bulan == '10') {
                                        		echo $oktober;
                                        	}else if ($bulan == '11') {
                                        		echo $november;
                                        	}else if ($bulan == '12') {
                                        		echo $desember;
                                        	} 
                                        ?>
                                    </td>
                                    <td><?php echo $baris['tgl_konfirmasi']; ?></td>
                                    <td><?php echo $baris['file_teguran']; ?></td>
                                    <td>
                                    <a href="index.php?hal=teguran/edit&idteguran=<?php echo $baris['idteguran']; ?>" class="btn btn-info"><span class="fa fa-edit"></span> </a>
                                    
                                    <a href="index.php?hal=teguran/list&hapus=<?php echo $baris['idteguran']; ?>" class="btn btn-danger"><span class="fa fa-trash"></span> </a>
                                    </td>
                             </tr>
                   <?php } ?>
                </tbody>
              </table>
              </div>
             </div> 
          </div>
      </div>
  </section>
</div>