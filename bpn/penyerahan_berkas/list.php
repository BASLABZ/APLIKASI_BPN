  <div class="content-wrapper">
    <section class="content-header">
      <h1>DATA PENYERAHAN BERKAS <a href="index.php?hal=penyerahan_berkas/add" class="btn btn-info btn-sm"><span class="fa fa-plus"></span> Tambah</a></h1>
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
          <!-- <h3 class="box-title">CEK/FILTER PPAT</h3> -->
          </div>
          <div class="box-body">
           <form class="role" method="POST" action="index.php?hal=penyerahan_berkas/proses_filter_konfirmasi_ppat">
              <div class="row">
              <div class="col-md-1">  <label>Pilih PPAT</label></div>
              <div class="col-md-4">
                <div class="form-group">
                  <p align="left">
                    <select class="form-control select2" name="idpengguna">
                    <option value="">Cari PPAT</option>
                    <?php 
                      $query_ppat = mysql_query("SELECT * FROM pengguna  WHERE idkota = '".$_SESSION['idkota']."' AND level = 'ppat'");
                      while ($row_ppat = mysql_fetch_array($query_ppat)) {
                     ?>
                     <option value="<?php echo $row_ppat['idpengguna']; ?>"><?php echo $row_ppat['namalengkap']; ?></option>

                    <?php } ?>

                  </select>
                  </p>
                </div>
              </div>
              <div class="col-md-1">
                <label>Bulan</label>
              </div>
              <div class="col-md-2">
                <select class="form-control select2" name="bulan">
                  <option>Pilih Bulan</option>
                          <option value="01">JANUARI</option>
                          <option value="02">FEBRUARI</option>
                          <option value="03">MARET</option>
                          <option value="04">APRIL</option>
                          <option value="05">MEI</option>
                          <option value="06">JUNI</option>
                          <option value="07">JULI</option>
                          <option value="08">AGUSTUS</option>
                          <option value="09">SEPTEMBER</option>
                          <option value="10">OKTOBER</option>
                          <option value="11">NOVEMBER</option>
                          <option value="12">DESEMBER</option>
                </select>
              </div>
              <div class="col-md-2" >
                <select class="form-control" name="status">
                  <option>STATUS</option>
                  <option>SUDAH</option>
                  <option> BELUM</option>
                </select>
              </div>
              
              <div class="col-md-1">
                <button type="submit" class="btn btn-info btn-sm"><span class="fa fa-search"></span></button>
              </div>
            </div>
           </form>
          </div>
        </div> 
      </div>
        
      </div>
    </section>
</div>