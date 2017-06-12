
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
                <h3 class="box-title">Data Teguran PPAT</h3>
              </div>
              <div class="box-body">
                <table class="table table-responsive table-bordered" id="table">
                <thead>
                  <th>No</th>
                  <th>PPAT</th>
                  <th>Pada Bulan</th>
                  <th>Tanggal Teguran</th>
                  <th>File</th>
                  
                </thead>
                <tbody>
                  <?php 
                      $no = 0;
                      $query = mysql_query("SELECT * FROM teguran t JOIN pengguna p ON t.idpengguna = p.idpengguna where 
                        level = 'ppat' AND p.idpengguna = '".$_SESSION['idpengguna']."'");
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
                                    <td><a href='../dokumen/<?php echo $baris['file_teguran']; ?>' class='btn btn-success'><span class='fa fa-file'></span> Download</a></td>
                                   
                             </tr>
                   <?php } ?>
                </tbody>
              </table>
              
              <h3>Total Teguaran Setiap Bulannya</h3>
              <div class="col-md-12">
              <table class='table table-responsive table-bordered table-hover'>
                  <thead>
                      <th>No</th>
                      <th>Bulan</th>
                      <th>Jumlah Teguran</th>
                  </thead>
                  <tbody>
                      <?php 
                      $no_urut = 0;
                      
                        $query_total = mysql_query("SELECT * FROM teguran t JOIN pengguna p ON t.idpengguna = p.idpengguna where 
                        level = 'ppat' AND p.idpengguna = '".$_SESSION['idpengguna']."' GROUP BY t.bulan ");
                        while($row_total_teguran = mysql_fetch_array($query_total)){
                      ?>
                      <tr>
                          <td><?php echo ++$no_urut; ?></td>
                          <td><?php 
                            $bulan  = $row_total_teguran['bulan'];
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
                          ?></td>
                          <td><?php 
                        
                            $jumlah_teguaras = mysql_fetch_array(mysql_query("SELECT count(*) as total_teguran_s FROM teguran t JOIN pengguna p ON t.idpengguna = p.idpengguna where 
                            level = 'ppat' AND p.idpengguna = '".$_SESSION['idpengguna']."' AND t.bulan='".$bulan."'  ")); echo $jumlah_teguaras['total_teguran_s'];
                            
                            ?>
                            
                        </td>
                      </tr>
                      <?php } ?>
                  </tbody>
              </table>
          </div>
              </div>
             </div> 
          </div>
          
      </div>
  </section>
</div>