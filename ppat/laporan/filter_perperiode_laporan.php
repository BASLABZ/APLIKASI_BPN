  <div class="content-wrapper">
    <section class="content-header">
      <h1>Cetak Laporan Perperiode Bulan</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Laporan</a></li>
        <li class="active">Cetak Laporan Pembuatan Akta Perperiode Bulan</li>
      </ol>
    </section>
    <section class="content">
      <div class="row">
          <div class="col-md-12">
            <div class="box box-danger">
              <div class="box-header">
                <h3 class="box-title">Cetak Laporan Pembuatan Akta Perperiode Bulan</h3>
              </div>
              <div class="box-body">
                <div class="row">
                  
                  <div class="col-md-12">
                      <form class="role" method="POST" action="laporan/laporanaktaperperiode.php">
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-gruop">
                           <label>Nama P.P.A.T</label>
                           <input type="text" class="form-control" disabled value="<?php echo $_SESSION['namalengkap']; ?>">
                         </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                           <label>NPWP</label> 
                            <input type="text" class="form-control" disabled value="<?php echo $_SESSION['NPWP']; ?>">
                        </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-gruop">
                            <label>DAERAH KERJA</label>
                            <input type="text" class="form-control" disabled value="<?php echo $row_kota['nama_kota']; ?>">
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Periode Awal</label> 
                            <input type="text" class="form-control" id="periodeawal" name="periodeawal">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <label>Periode Akhir</label> 
                            <input type="text" class="form-control" id="periodeakhir" name="periodeakhir">
                          </div>
                        </div>
                        <div class="col-md-4">
                          <div class="form-group">
                            <br>
                              <p align="left"><button type="submit" class="btn btn-primary"> <span class="fa fa-print"></span> 
                                  CETAK</button></p>
                      </div>
                        </div>
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