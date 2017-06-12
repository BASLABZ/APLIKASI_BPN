<?php 
		include '../../koneksi/koneksi.php';
		include 'library_laporan/fpdf.php';

		$query_pengguna  = mysql_query("SELECT * FROM pengguna ORDER BY idpengguna DESC");
		$kolom_NPWP = "";
		$kolom_nama = "";
		$kolom_notelp = "";
		$kolom_alamat = "";
		$kolom_level = "";
		while ($row = mysql_fetch_array($query_pengguna)) {
			$NPWP  	= $row['NPWP'];
			$NAMA 	= $row['namalengkap'];
			$NOTELP = $row['notelp'];
			$ALAMAT = $row['alamat'];
			$LEVEL =  $row['level'];

			// kolom pdf
			$kolom_NPWP = $kolom_NPWP.$NPWP."\n";
			$kolom_nama = $kolom_nama.$NAMA."\n";
			$kolom_notelp = $kolom_notelp.$NOTELP."\n";
			$kolom_alamat = $kolom_alamat.$ALAMAT."\n";
			$kolom_level = $kolom_level.$LEVEL."\n";
			
			//Create a new PDF file
			$pdf = new FPDF('L','mm',array(297,210)); //L For Landscape / P For Portrait
			$pdf->AddPage();

			//Menambahkan Gambar
			//$pdf->Image('../foto/logo.png',10,10,-175);

			$pdf->SetFont('Arial','B',13);
			$pdf->Cell(125);
			$pdf->Cell(30,10,'DATA PENGGUNA',0,0,'C');
			$pdf->Ln();
			$pdf->Cell(125);
			$pdf->Cell(30,10,'BPN - PPAT ',0,0,'C');
			$pdf->Ln();	
		}

		$Y_Fields_Name_position = 30;
		$pdf->SetFillColor(110,180,230);
		$pdf->SetFont('Arial','B',10);
		$pdf->SetY($Y_Fields_Name_position);
		$pdf->SetX(5);

		$pdf->Cell(25,8,'NPWP',1,0,'C',1);
		$pdf->SetX(30);

		$pdf->Cell(60,8,'Nama',1,0,'C',1);
		$pdf->SetX(90);

		$pdf->Cell(25,8,'No Telp',1,0,'C',1);
		$pdf->SetX(115);
		$pdf->Cell(30,8,'Level',1,0,'C',1);
		$pdf->Cell(25,8,'Alamat',1,0,'C',1);
		$pdf->SetX(215);
		$pdf->Ln();

		$Y_Table_Position = 38;

		//Now show the columns
		$pdf->SetFont('Arial','',10);

		$pdf->SetY($Y_Table_Position);
		$pdf->SetX(5);
		$pdf->MultiCell(25,6,$kolom_NPWP,1,'C');

		$pdf->SetY($Y_Table_Position);
		$pdf->SetX(25);
		$pdf->MultiCell(90,6,$kolom_nama,1,'C');




		

		$pdf->Output();

 ?>