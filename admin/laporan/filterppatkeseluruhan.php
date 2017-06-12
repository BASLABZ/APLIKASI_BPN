  <div class="content-wrapper">
    <section class="content-header">
      <h1>Cetak Laporan</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Laporan</a></li>
        <li class="active">Cetak Laporan Pembuatan Akta Perbulan</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
          <div class="col-md-12">
            <div class="box box-danger">
              <div class="box-header">
                <h3 class="box-title">Cetak Laporan Pembuatan Akta Perbulan</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  <div class="col-md-3"></div>
                  <div class="col-md-6">
                    <form class="role" method="POST" action="laporan/laporankeseluruhan.php">
                      <div class="form-gruop">
                        <label>Nama P.P.A.T</label>
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
                      <div class="form-gruop">
                        <label>DAERAH KERJA</label>
                        <input type="text" class="form-control" disabled value="<?php echo $row_kota['nama_kota']; ?>">
                      </div>
                      <div class="form-group pull-right">
                      <br>
                        <button type="submit" class="btn btn-primary"> <span class="fa fa-print"></span> CETAK</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
             </div> 
          </div>
      </div>
  </section>
</div>