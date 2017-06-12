<?php 
		 $ppat = $_POST['idpengguna'];
		 $bulan = $_POST['bulan'];
		 $status = $_POST['status'];

     $row_ppat = mysql_fetch_array(mysql_query("SELECT * FROM pengguna where idpengguna = '".$ppat."'"));

 ?>
  <div class="content-wrapper">
    <section class="content-header">
      <h1>DATA PENYERAHAN BERKAS</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Penyerahan</a></li>
        <li class="active">Berkas</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
      <div class="col-md-12">
        <div class="box box-danger">
          <div class="box-header">
          <?php 
            $query_CEK_teguran  = mysql_query("SELECT * FROM penyerahan_berkas pb  LEFT JOIN pengguna pe ON pb.idpengguna = pe.idpengguna WHERE  pe.idkota = '".$_SESSION['idkota']."' AND pe.idpengguna='".$ppat."' AND pb.bulan = '".$bulan."' AND pb.status_penyerahan = '".$status."'");
            $cek = mysql_fetch_array($query_CEK_teguran);
            if ($cek['bulan'] == $bulan) {
                echo "<p>PPAT : <b>".$row_ppat['namalengkap']."</b> Telah Menyerahkan Berkas </p>";
              } else{
           ?>
           
            <i> *) PPAT : <?php echo $row_ppat['namalengkap']; ?>  INI BELUM MENYERAHKAN BERKAS PADA BULAN : <?php echo $bulan; ?> Tanggal Sekarang : <?php echo date('d-m-y'); ?> </i>
            <?php 
               if (date('d') > 10) {
                echo "<br>PPAT INI BELUM MENYERAHKAN BERKAS BULANAN DAN HARUS DIBERIKAN TEGURAN ";
                echo "<a href='index.php?hal=teguran/add&id=".$ppat."&bulan=".date('m')."' class='btn btn-warning'><span class='fa fa-exclamation-triangle'></span>Buat Teguran Untuk PPAT ini</a>";
              }
             ?>
            <?php } ?>
          </div>
          <div class="box-body">
         	
          </div>
        </div> 
      </div>
          <div class="col-md-12">
            <div class="box box-danger">
              <div class="box-header">
                <h3 class="box-title">Data Penyerahan Berkas <a href="index.php?hal=penyerahan_berkas/add" class="btn btn-info btn-sm"><span class="fa fa-plus"></span> Tambah</a> </h3>
              </div>
              <div class="box-body">
                <table class="table table-responsive table-bordered" id="table">
                <thead>
                  <th>No</th>
                  <th>Tanggal Penyerahan</th>
                  <th>Nama PPAT</th>
                  <th>Status</th>
                  <th>Aksi</th>
                </thead>
                <tbody>
                  <?php 
                    $no=0;
                    $bulan_ini = date('m');
                    $query_All_filter = mysql_query("SELECT * FROM penyerahan_berkas pb  LEFT JOIN pengguna pe ON pb.idpengguna = pe.idpengguna WHERE  pe.idkota = '".$_SESSION['idkota']."' AND pe.idpengguna='".$ppat."' AND pb.bulan = '".$bulan."' AND pb.status_penyerahan = '".$status."'");
                      while ($filter_ppat = mysql_fetch_array($query_All_filter)) {
                   ?>
                   <tr>
                     <td><?php echo ++$no; ?></td>
                     <td><?php echo $filter_ppat['tgl_penyerahan']; ?></td>
                     <td><?php echo $filter_ppat['namalengkap']; ?></td>
                     <td>
                       <?php 
                       		if ($filter_ppat['status_penyerahan'] == 'SUDAH') {
                       			echo "<span class='btn btn-success'><span class='fa fa-check'></span> PPAT TELAH MENYERAHKAN BERKAS</span>";
                       		}
                        ?>
                     </td>

                     <td>
                       <!-- <a href="#" class='btn btn-info btn-sm'>Lihat Data</a> -->
                    <!--    <br><br> -->
                      <?php if ($filter_ppat['status_penyerahan'] == 'SUDAH' AND $bulan == date('m')) {
                        echo "<span class='fa fa-check'></span> ";
                      // echo " <a href='index.php?hal=penyerahan_berkas/detail_data_penyerahan_berkas&idpengguna=".$ppat."' class='btn btn-info btn-sm'>Lihat Data</a>";
                      }else{	echo " <a href='' class='btn btn-info btn-sm'>Lihat Teguran</a>"; } ?>
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