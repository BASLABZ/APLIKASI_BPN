<?php include '../../koneksi/koneksi.php';
	error_reporting(0);
	session_start();
	$periodeawal = jin_date_sql($_POST['periodeawal']);
	$periodeakhir = jin_date_sql($_POST['periodeakhir']);
	$idkota  = $_SESSION['idkota'];
	$kota  = mysql_fetch_array(mysql_query("SELECT * FROM kota where idkota = '".$idkota."'"));
	$tahun = substr($periodeakhir,0,4);
	$month = date("m",strtotime($periodeakhir));
	$total_day_in_month = cal_days_in_month(CAL_GREGORIAN,$month,$tahun);
    
	
?>
	<!DOCTYPE html>
	<html>
	<head>
		<title>LAPORAN PEMBUATAN AKTA PERBULAN <?php echo $_POST['periodeawal']; ?> s/d <?php echo $_POST['periodeakhir']; ?></title>
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
					<td><div style="width: 660px;">1. Kepala Kantor Pertahanan Kabupaten <?php echo $kota['nama_kota']; ?></div></td>
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
					<td><div style="width: 360px;">3. Kepala Dinas Pendapatan Daerah Kabupaten <?php echo $kota['nama_kota']; ?></div></td>
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
						<h3  style="margin-left:200px;">LAPORAN BULANAN PEMBUATAN AKTA OLEH PPAT</h3>
						<h4  style="margin-left: 200px;">PERIODE : <?php echo $_POST['periodeawal']; ?> s/d <?php echo $_POST['periodeakhir']; ?></h4>
					</td>
				</tr>
				

				
				
			</center>
		<table border="1">
			<tbody>
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
				    	<?php for ($xx=1; $xx <= 18; $xx++) { 
				    		echo "<td><center>".$xx."</center></td>";
				    	} ?>

				        
				    </tr>
				    
				    
					<?php
						$no =0;
						$query = mysql_query("SELECT * FROM ppat where idpengguna = '".$_SESSION['idpengguna']."' AND tgl_penyerahan between '".$periodeawal."' AND '".$periodeakhir."' order by idppat DESC");
						
						while ($row  = mysql_fetch_array($query)) { 
						    
							$tanggal_penyerahan = $row['tgl_penyerahan'];
							$day = date("d",strtotime($tanggal_penyerahan));
						 ?>
						 
						 
					<tr>
						<td><?php echo ++$no; ?></td>
						
						<td><?php echo $row['noakta']; ?></td>
						<td><?php echo $row['tanggalakta']; ?></td>
						<td><?php echo $row['jenisakta']; ?></td>
						<td><?php echo $row['namapemohon']; ?>, <?php  echo $row['alamatpemohon']; ?></td>
				    	<td><?php echo $row['namapenerima']; ?>, <?php echo $row['alamatpenerima']; ?></td>
	    				<td><?php echo $row['jenishak']; echo $row['nohak']; ?></td>
				    	<td><?php echo $row['alamattanah']; ?> </td>
				    	<td><?php echo $row['luastanah']; ?> </td>
				    	<td><?php echo $row['luasbangunan']; ?> </td>
				    	<td><?php echo rupiah($row['harga']); ?> </td>
				    	<td><?php echo $row['tahun']; ?> /<?php echo $row['NOP']; ?> </td>
				    	<td><?php echo $row['NJOP']; ?> </td>
				    	<td><?php echo $konverttanggalssp; ?> </td>
				    	<td><?php echo rupiah($row['jumlah_ssp']); ?> </td>
				    	<td><?php echo $konverttanggalbphtb; ?></td>
				    	<td><?php echo rupiah($row['jumlah_bphtb']); ?> </td>
				    	<td><?php echo $row['keterangan']; ?> </td>
						
					</tr>
					
						
						
				<?php } ?>
			</tbody>
		</table>
			<?php 
				$queryAKB = mysql_query("SELECT count(*) as jumlahAKB FROM ppat where jenisakta='AJB' AND tgl_penyerahan between '".$periodeawal."' AND '".$periodeakhir."' AND idpengguna = '".$_SESSION['idpengguna']."'");
				$jumalahAKB = mysql_fetch_array($queryAKB); 

				$queryAPHT = mysql_query("SELECT count(*) as jumlahAPHT FROM ppat where jenisakta='APHT' AND tgl_penyerahan between '".$periodeawal."' AND '".$periodeakhir."' AND  idpengguna = '".$_SESSION['idpengguna']."'");
				$jumlahAPHT = mysql_fetch_array($queryAPHT);

				$queryAPHB = mysql_query("SELECT count(*) as jumlahAPHB FROM ppat where jenisakta='APHB' AND tgl_penyerahan between '".$periodeawal."' AND '".$periodeakhir."' AND idpengguna = '".$_SESSION['idpengguna']."'");
				$jumlahAPHB = mysql_fetch_array($queryAPHB);

				$queryhibah = mysql_query("SELECT count(*) as hibah FROM ppat where jenisakta='Hibah' AND tgl_penyerahan between '".$periodeawal."' AND '".$periodeakhir."' AND idpengguna = '".$_SESSION['idpengguna']."'");
				$jumalahhibah = mysql_fetch_array($queryhibah); 

				$querytukarmenukar = mysql_query("SELECT count(*) as tukarmenukar FROM ppat where jenisakta='Tukar-menukar' AND tgl_penyerahan between '".$periodeawal."' AND '".$periodeakhir."' AND idpengguna = '".$_SESSION['idpengguna']."'");
				$jumalahtukarmenukar = mysql_fetch_array($querytukarmenukar); 

				$querytinbreng = mysql_query("SELECT count(*) as inbreng FROM ppat where jenisakta='Inbreng' AND tgl_penyerahan between '".$periodeawal."' AND '".$periodeakhir."' AND idpengguna = '".$_SESSION['idpengguna']."'");
				$jumalahinbreng = mysql_fetch_array($querytinbreng); 

				$querySKMHT = mysql_query("SELECT count(*) as SKMHT FROM ppat where jenisakta='SKMHT' AND tgl_penyerahan between '".$periodeawal."' AND '".$periodeakhir."' AND idpengguna = '".$_SESSION['idpengguna']."'");
				$jumalahSKMHT = mysql_fetch_array($querySKMHT); 


				$queryAPHGBHM = mysql_query("SELECT count(*) as APHGBHM FROM ppat where jenisakta='APHGB/HP diatas HM' AND tgl_penyerahan between '".$periodeawal."' AND '".$periodeakhir."' AND idpengguna = '".$_SESSION['idpengguna']."'");
				$jumalahAPHGBHM = mysql_fetch_array($queryAPHGBHM); 

				// APHGB/HP diatas HM
			 ?>
			<table>
				<tr>
					<td><div style="width: 250px;"></div></td>
					<td>
						Akta Jual Beli 
					</td>
					<td><div style="width: 100px;"></div></td>
					<td><?php echo $jumalahAKB['jumlahAKB']; ?> (<?php echo ucwords(Terbilang($jumalahAKB['jumlahAKB'])); ?>) Buah</td>
					<td><div style="width: 600px;"></div></td>
					<td></td>

				</tr>
				<tr>
					<td><div style="width: 250px;"></div></td>
					<td> Akta Pemberian Hak Tanggungan  </td>
					<td><div style="width: 100px;"></div></td>
					<td><?php echo $jumlahAPHT['jumlahAPHT']; ?> (<?php echo ucwords(Terbilang($jumlahAPHT['jumlahAPHT'])); ?>) Buah</td>
					<td><div style="width: 600px;"></div></td>
					<td><?php echo $kota['nama_kota']; ?>, <?php echo date('d-m-Y'); ?><br>Pejabat Pembuat Akta Tanah</td>

				</tr>
				<tr>
					<td><div style="width: 250px;"></div></td>
					<td> Akta Pembagian Hak Bersama </td>
					<td><div style="width: 100px;"></div></td>
					<td><?php echo $jumlahAPHB['jumlahAPHB']; ?> (<?php echo ucwords(Terbilang($jumlahAPHB['jumlahAPHB'])); ?>) Buah</td>
				</tr>
				<tr>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td><div style="width: 600px;"></div></td>
					<td></td>

				</tr>
				<tr>
					<td><div style="width: 250px;"></div></td>
					<td> Jumlah Akta Bulan <?php //include'bulan.php'; 
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
                
                	if ($month == '01') {
                		echo $januari;
                	}else if ($month == '02') {
                		echo $februari;
                	}else if ($month == '03') {
                		echo $maret;
                	}else if ($month == '04') {
                		echo $april;
                	}else if ($month == '5') {
                		echo $mei;
                	}else if ($month == '6') {
                		echo $juni;
                	}else if ($month == '7') {
                		echo $juli;
                	}else if ($month == '8') {
                		echo $agustus;
                	}else if ($month =='9')  {
                		echo $sebtember;
                	}else if ($month == '10') {
                		echo $oktober;
                	}else if ($month == '11') {
                		echo $november;
                	}else if ($month == '12') {
                		echo $desember;
                	} 
					                                     ?> </td>
					<td><div style="width: 100px;"></div></td>
					<td><?php echo $total = $jumalahAKB['jumlahAKB']+$jumlahAPHT['jumlahAPHT']+$jumlahAPHB['jumlahAPHB']; ?>  (<?php echo ucwords(Terbilang($total)); ?>) Buah</td>
					<td><div style="width: 600px;"></div></td>
					<td></td>

				</tr>
				<tr>
					<td><div style="width: 250px;"></div></td>
					<td>Jumlah SSP </td>
					<td><div style="width: 100px;"></div></td>
					<td>Rp. <?php $queryTotalSSP = mysql_query("SELECT SUM(jumlah_ssp) AS jumlahssp FROM ppat where tgl_penyerahan between '".$periodeawal."' AND '".$periodeakhir."' AND idpengguna = '".$_SESSION['idpengguna']."'");
												$totalssp = mysql_fetch_array($queryTotalSSP);
												echo rupiah($totalssp['jumlahssp']);							
									 ?> -</td>
									 <td><div style="width: 600px;"></div></td>
									 <td></td>

				</tr>
				<tr>
					<td><div style="width: 250px;"></div></td>
					<td>Jumlah BPHTB</td>
					<td><div style="width: 100px;"></div></td>
					<td>Rp. <?php $queryTotaljumlah_bphtb= mysql_query("SELECT SUM(jumlah_bphtb) AS jumlah_bphtb FROM ppat where tgl_penyerahan between '".$periodeawal."' AND '".$periodeakhir."'  AND idpengguna = '".$_SESSION['idpengguna']."'");
												$totaljumlah_bphtb = mysql_fetch_array($queryTotaljumlah_bphtb);
												echo rupiah($totaljumlah_bphtb['jumlah_bphtb']);							
									 ?>  -</td>
									 <td><div style="width: 600px;"></div></td>
									 <td><center><?php echo $_SESSION['namalengkap']; ?></center></td>

				</tr>
				<tr>
					<td><div style="width: 250px;"></div></td>
					<td>
						Akta Hibah
					</td>
					<td><div style="width: 100px;"></div></td>
					<td><?php echo $jumalahhibah['hibah']; ?> (<?php echo ucwords(Terbilang($jumalahhibah['hibah'])); ?>) Buah</td>
					<td></td>

				</tr>
				<tr>
					<td><div style="width: 250px;"></div></td>
					<td>
						Akta Tukar Menukar
					</td>
					<td><div style="width: 100px;"></div></td>
					<td><?php echo $jumalahtukarmenukar['tukarmenukar']; ?> (<?php echo ucwords(Terbilang($jumalahtukarmenukar['tukarmenukar'])); ?>) Buah</td>
					<td></td>

				</tr>
				<tr>
					<td><div style="width: 250px;"></div></td>
					<td>
						Akta Inbreng
					</td>
					<td><div style="width: 100px;"></div></td>
					<td><?php echo $jumalahinbreng['inbreng']; ?> (<?php echo ucwords(Terbilang($jumalahinbreng['inbreng'])); ?>) Buah</td>
					<td></td>

				</tr>
				<tr>
					<td><div style="width: 250px;"></div></td>
					<td>
						Akta SKMHT
					</td>
					<td><div style="width: 100px;"></div></td>
					<td><?php echo $jumalahSKMHT['SKMHT']; ?> (<?php echo ucwords(Terbilang($jumalahSKMHT['SKMHT'])); ?>) Buah</td>
					<td></td>

				</tr>
				<tr>
					<td><div style="width: 250px;"></div></td>
					<td>
						Akta APHGB/HP diatas HM
					</td>
					<td><div style="width: 100px;"></div></td>
					<td><?php echo $jumalahAPHGBHM['APHGBHM']; ?> (<?php echo ucwords(Terbilang($jumalahAPHGBHM['APHGBHM'])); ?>) Buah</td>
					<td></td>
				</tr>
			</table>
	</body>
	</html>