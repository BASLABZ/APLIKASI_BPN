<?php 
  $idpengguna = $_POST['idpengguna'];
  
   ?>

  <div class="content-wrapper">
    <section class="content-header">
      <h1>DATA AKTA PPAT</h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Data Akta</a></li>
        <li class="active">Daftar</li>
        
      </ol>
    </section>
    <section class="content">

      <div class="row">
          
          <div class="col-md-12">
            <div class="box box-danger">
              <div class="box-header">
                <h3 class="box-title">Data Akta</h3>
              </div>
              <div class="box-body">
              <div class="row">
                <form class="role" method="POST" action="index.php?hal=verifikasi/result_filter_ppat_verifikasi">
                <div class="col-md-6">
                    
                      <select class="form-control select2" name="idpengguna">
                        <option>Pilih PPAT</option>
                        <?php 
                          $querypengguna = mysql_query("SELECT * FROM pengguna  where level='ppat' order by idpengguna ASC");
                          while ($barispengguna = mysql_fetch_array($querypengguna)) {
                         ?>
                         <option value="<?php echo $barispengguna['idpengguna']; ?>"><?php echo $barispengguna['namalengkap']; ?></option>
                         <?php } ?>
                      </select>
                    
                  </div>
                  <div class="col-md-3"><button type="submit" class="btn btn-success"> <span class="fa fa-search"></span></button></div> 
                  </form>

              </div>
              <br>
                <table class="table table-responsive table-bordered" id="table">
                <thead>
                  <th>No</th>
                  <th>Tanggal Input</th>
                  <th>Nama yang Mengalihkan</th>
                  <th>Alamat yang Mengalihkan</th>
                  <th>Alamat Tanah</th>
                   <th>Jenis Hak & Nomor Hak</th>
                  <th>Jenis Akta</th>
                  <th>No Akta</th>
                  <th>Tanggal Akta</th>
                  <th>Status</th>
                  <th>Verifikasi</th>
                  <th>Dokumen</th>
                  <th>Pembuat</th>
                  <th>Aksi</th>
                </thead>
                <tbody>
                 <?php 
                      $no = 1;
                      $query = mysql_query("SELECT * FROM ppat p JOIN pengguna pe ON p.idpengguna = pe.idpengguna where p.verifikasi='DIVERIFIKASI' AND pe.idpengguna = '".$idpengguna."' order by p.idppat DESC");
                      while ($baris  = mysql_fetch_array($query)) {
                        $tanggalakta = jin_date_str($baris['tanggalakta']);
                        $tanggalinput = jin_date_str($baris['tanggalinput']);
                        ?>
                        <tr>
                                  <td><?php echo $no++; ?></td>
                                  <td><?php echo $tanggalinput; ?></td>
                                  <td><?php echo $baris['namapemohon']; ?></td>
                                  <td><?php echo $baris['alamatpemohon']; ?></td>
                                  <td><?php echo $baris['alamattanah']; ?></td>
                                  <td><?php echo $baris['jenishak']; echo ","; echo $baris['nohak']; ?></td>
                                  <td><?php echo $baris['jenisakta']; ?></td>
                                  <td><?php echo $baris['noakta']; ?></td>
                                  <td><?php echo $tanggalakta; ?></td>
                                  <td><?php echo $baris['status'] ?></td>
                                    <td><button class='btn btn-flat btn-success btn-xs'><span class='fa fa-check'></span> <?php echo $baris['verifikasi']; ?></button>
                                  </td>
                                  <td><img src='../dokumen/<?php echo $baris['file']; ?>' class='img-responsive img-thumbnail'></td>
                                  <td><?php echo $baris['namalengkap']; ?></td>
                                
                                  <td>
                                    <a href='index.php?hal=verifikasi/detail&id=<?php echo $baris['idppat']; ?>' class='btn btn-success btn-xs'> <span class='fa fa-eye'></span> Lihat</a>
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