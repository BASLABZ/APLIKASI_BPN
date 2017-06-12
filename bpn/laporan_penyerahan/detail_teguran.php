<?php 
       $row = mysql_fetch_array(mysql_query("SELECT * FROM penyerahan_berkas p JOIN pengguna pe ON p.idpengguna=pe.idpengguna where p.idpenyerahan = '".$_GET['id']."'"));
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
              <h3 class="box-title">PPAT TERKENA TEGURAN</h3>
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
              </form>
            </div>

          </div>
        </div>
        <div class="col-md-12">
           <div class="ibox-body">
              <div class="table table-responsive">
                <table class="table table-responsive table-bordered table-stripped">
                  <th>No</th>
                  <th>Tanggal Konfirmasi</th>
                  <th>File Teguran</th>
                  <tbody>
                    <?php 
                    $no=0;
                    $queryteguran = mysql_query("SELECT * FROM teguran t jOIN penyerahan_berkas p ON t.idpenyerahan = p.idpenyerahan");
                    while ($rowteguran = mysql_fetch_array($queryteguran)) {  ?>
                    <tr>
                      <td><?php echo ++$no; ?></td>
                      <td><?php echo $rowteguran['tgl_konfirmasi']; ?></td>
                      <td><a href="../dokumen/<?php echo $rowteguran['file_teguran']; ?>" class="btn btn-warning"> <span class="fa fa-download"></span> Download</a></td>
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