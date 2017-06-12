
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
                <h3 class="box-title">Data Penyerahan Berkas</h3>
              </div>
              <div class="box-body">
                <table class="table table-responsive table-bordered" id="table">
                <thead>
                  <th>No</th>
                  <th>Tanggal Penyerahan</th>
                  <th>Nama PPAT</th>
                  <th>Status</th>
                  <th>File Berkas</th>
                  <th>Aksi</th>
                </thead>
                <tbody>
                <?php 
                  $no = 0;
                  $query = mysql_query("SELECT * FROM penyerahan_berkas p  JOIN pengguna pe ON p.idpengguna = pe.idpengguna order by p.idpenyerahan  DESC");
                  while ($row = mysql_fetch_array($query)) {
                 ?>
                  <tr>
                    <td><?php echo ++$no; ?></td>
                    <td><?php echo $row['tgl_penyerahan']; ?></td>
                    <td><?php echo $row['namalengkap']; ?></td>
                    <td><label class="btn btn-warning"><span class="fa fa-exclamation-triangle"></span> <?php echo $row['status_penyerahan']; ?></label></td>
                    <td><a href="../dokumen/<?php echo $row['berkas']; ?>" class="btn btn-success"> <span class="fa fa-download"></span> Cek Laporan</a></td>
                    
                    <td>
                      <?php 
                        $tanggal =  substr($row['tgl_penyerahan'], 8);
                        if ($tanggal <= 31 ) {
                          echo "<center><a href='index.php?hal=laporan_penyerahan/teguran&id=".$row['idpenyerahan']."' class='btn btn-danger btn-xs'><span class='fa fa-check'></span> KIRIM TEGURAN</a>";
                          echo "<br><br>";
                          echo "<a href='index.php?hal=laporan_penyerahan/detail_teguran&id=".$row['idpenyerahan']."' class='btn btn-danger btn-xs'><span class='fa fa-exclamation-triangle'></span>TEGURAN</a></center>";
                        }else{
                          echo "<lable><span class='fa fa-check'></span> TEPAT WAKTU</label>";
                        }
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
  </section>
</div>