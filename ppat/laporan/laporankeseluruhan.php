<?php include '../../koneksi/koneksi.php';
		error_reporting(0);
	session_start();
	$idkota  = $_SESSION['idkota'];
	$kota  = mysql_fetch_array(mysql_query("SELECT * FROM kota where idkota = '".$idkota."'"));
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>LAPORAN BULANAN PEMBUATAN AKTA OLEH PPAT</title>
	
</head>
<body onload="window.print()">

				<table>
				<tr>
					<td><div style="width:200px; ">Nama P.P.A.T</div></td>
					<td>:</td>
					<td><?php echo $_SESSION['namalengkap']; ?></td>
					<td><div  style="width:1100px; "></div></td>
					<td><div style="width: 430px;"><p align="left" style="">Kepada Yth,</p></div></td>
				</tr>
				<tr>
					<td>Alamat</td>
					<td>:</td>
					<td style="width:200px; ">Jln. Taman Siswa</td>
					<td></td>
					<td><div style="width: 660px;">1. Kepala Kantor Pertahanan  <?php echo $kota['nama_kota']; ?></div></td>
				</tr>
				<tr>
					<td>NPWP</td>
					<td>:</td>
					<td><?php echo $_SESSION['NPWP']; ?></td>
					<td></td>
					<td><div style="width: 660px;">2. Kepala Kantor Wilayah Badan Pertanahan Nasional Provinsi Jawa Barat</div></td>
				</tr>
				<tr>
					<td>Daerah Kerja</td>
					<td>:</td>
					<td><b><div style="width: 200px;">  <?php echo $kota['nama_kota']; ?></div></b></td>
					<td></td>
					<td><div style="width: 360px;">3. Kepala Dinas Pendapatan Daerah  <?php echo $kota['nama_kota']; ?></div></td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td><div style="width: 200px;"></div></td>
					<td></td>
					<td><div style="width: 360px;">4. Kepala Kantor Pelayanan Pajak Pratama <?php echo $kota['nama_kota']; ?></div></td>
				</tr>
			</table>
	
			
			<center>
				<tr>
					<td></td>
					<td>
						<h3  style="margin-left:600px;">LAPORAN BULANAN PEMBUATAN AKTA OLEH PPAT</h3>
						<h4  style="margin-left: 600px;"> SEMUA PERIODE</h4>
					</td>
				</tr>
				
			</center>

			<table>
				<tr>
					<td><div  style="width: 200px;"></div></td>
					<td>
						<center>
				<p align="center">
					<table border="1"> 
					
					<tr>
						<th rowspan ="2"><center>NO URUT</center></th>
				    	<th colspan ="2"><center>AKTA</center></th>
				        <th rowspan ="2"><center>BENTUK <BR>PEMBUATAN HUKUM</center></th>
				        <th colspan ="2"><center>NAMA ALAMAT DAN NPWP</center></th>
				        <th rowspan ="2"><center>JENIS <BR>DAN NOMOR HAK</center></th>
				        <th rowspan ="2"><center>LETAK <BR>TANAH<BR> DAN BANGUNAN</center></th>
				        <th colspan ="2"><center>LUAS (M2)</center></th>
				        <th rowspan ="2"><center>HARGA TRANSAKSI<br> PEROLEHAN<br> PENGALIHAN HAK (Rp.000)</center></th>
				        <th colspan="2"><center>SPPT PBB</center></th>
				        <th colspan="2"><center>SSP</center></th>
				        <th colspan="2"><center>D BPHTB</center></th>
				        <th colspan="1"><center>Ket.</center></th>
				   </tr>
				    <tr>
				    	<td>NOMOR</td> 
				        <td>TANGGAL</td>
				        <td><center>PIHAK YANG <BR>MENGALIHKAN/ <BR>MEMBERIKAN</center></td>
				        <td><center>PIHAK YANG <BR>MENERIMA </center></td>
				        <td><center>TANAH</center></td>
				        <td><center>BANGUNAN</center></td>
				        <td><center>NOP/<br>TAHUN</center></td>
				        <td><center>NJOP <br> (Rp.00)</center></td>
				        <td><center>TGL</center></td>
				        <td><center>(Rp.00)</center></td>
				        <td><center>TGL</center></td>
				        <td><center>(Rp.00)</center></td>
				        <td></td>
				        
				    </tr>
				    <tr>
				    	<?php for ($i=1; $i <= 18; $i++) { 
				    		echo "<td><center>".$i."</center></td>";
				    	} ?>

				        
				    </tr>
				    <?php 
				    	$no = 1;
				    	$query = mysql_query("SELECT * FROM ppat where idpengguna = '".$_SESSION['idpengguna']."' order by idppat DESC");
				    	while ($row = mysql_fetch_array($query)) {
				    		 $konverttanggal = jin_date_str($row['tanggalinput']);
				    		 $konverttanggalssp = jin_date_str($row['tgl_ssp']);
				    		 $konverttanggalbphtb = jin_date_str($row['tgl_bphtb']);
				    		 
				    		echo "<tr>
				    				<td><center>".$no++."</center></td>
				    				<td>".$row['noakta']."</td>
				    				<td>".$konverttanggal."</td>
				    				<td>".$row['jenisakta']."</td>
				    				<td>".$row['namapemohon'].", ".$row['alamatpemohon']."</td>
				    				<td>".$row['namapenerima'].", ".$row['alamatpenerima']."</td>
				    				 <td>".$row['jenishak'].", ".$row['nohak']."</td>
				    				<td>".$row['alamattanah']."</td>
				    				<td>".$row['luastanah']."</td>
				    				<td>".$row['luasbangunan']."</td>
				    				<td>".$row['harga']."</td>
				    				<td>".$row['tahun']."/".$row['NOP']."</td>
				    				<td>".$row['NJOP']."</td>
				    				<td>".$konverttanggalssp."</td>
				    				<td>".$row['jumlah_ssp']."</td>
				    				<td>".$konverttanggalbphtb."</td>
				    				<td>".$row['jumlah_bphtb']."</td>
				    				<td>".$row['keterangan']."</td>
				    				
				    			  </tr>
				    			 ";
				    	}

				     ?>
				</table>
				</p>
			</center>
					</td>
				</tr>
			</table>
</body>
</html>