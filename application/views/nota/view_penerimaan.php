<?php
$a = "";
$b = "";
$c = "";
$totalBerat = 0;
$totalHarga = 0;

foreach ($detail as $d) {
  $b .= "<tr><td>".$d->size."</td><td>".$d->berat."</td></tr>";
  $totalBerat += $d->berat;
};

$patin = "<table><style>table {padding: 2px;}td{text-align: center;}</style><tr><th><b>RM MASUK</b></th><th></th></tr>".$b."</table>";

$sup = "
<style>
table {
  padding: 2px;      
}
</style>    
<table>
<tr>
<th><b>Supplier</b></th>
<th></th>
</tr>
<tr>
<td>No. Surat Jalan</td>
<td>".$terima[0]->surat_jalan."</td>
</tr>
<tr>
<td>No Pol Kendaraan</td>
<td>".$terima[0]->no_pol."</td>
</tr>
<tr>
<td>Nama Petani</td>
<td>".$terima[0]->nama_petani."</td>
</tr>
<tr>
<td>Asal Daerah</td>
<td>".$terima[0]->asal_daerah."</td>
</tr>
</table>
";

$samp = "
<style>
table {
  padding: 2px;

}
</style>

<table>
<tr>
<th><b>Sampling</b></th>
<th></th>
</tr>
<tr>
<td>% kgs Tonase</td>
<td>".$terima[0]->percent_kgs_tonase."%</td>
</tr>
<tr>
<td>Grm/Pcs</td>
<td>".$terima[0]->grm_pcs."</td>
</tr>
<tr>
<td>Uniformity</td>
<td>".$terima[0]->uniformity."</td>
</tr>
<tr>
<td>Suhu Ikan</td>
<td>".$terima[0]->suhu."</td>
</tr>
<tr>
<td>Ket</td>
<td>".$terima[0]->ket."</td>
</tr>
</table>
";

$tk = "
<style>
table {
  padding: 2px;

}
</style>

<table>
<tr>
<td>Harian Tetap:</td>
<td>-</td>
</tr>
<tr>
<td>Jam</td>
<td>".$terima[0]->org."</td>
</tr>
<tr>
<td>Borongan</td>
<td>-</td>
</tr>
<tr>
<td></td>
</tr>
<tr>
<td>ket</td>
<td>".$terima[0]->ket."</td>
</tr>
<tr>
<td></td>
</tr>
</table>
";

// writeHTML($html, $ln=true, $fill=false, $reseth=false, $cell=false, $align='')
// writeHTMLCell($w, $h, $x, $y, $html='', $border=0, $ln=0, $fill=0, $reseth=true, $align='', $autopadding=true)

$pdf = new pdf2('L', 'mm', 'A5');
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

$pdf->AddPage();

$pdf->setJPEGQuality(75);
$pdf->Image(base_url('assets/img/drp_icon.jpg'),5,5,20,20,'JPG','','',false,300,'', false, false, 0, false, false, true);

$pdf->Cell(15,7,'',0,0);
$pdf->SetFont('times','B',18);
$pdf->Cell(0,6,'DIMAS REIZA PERWIRA',0,1);

$pdf->SetFont('times','B',14);
$pdf->Cell(0,6,'TANDA TERIMA BARANG',0,1,'R');

$pdf->SetFont('times','B',12);
$pdf->Cell(150,6,'No. Nota:',0,0,'R');
$pdf->Cell(40,6,$terima[0]->nota_pembelian,0,1);

$pdf->Line(8,36,200,36);
$pdf->SetFont('times','B',11);
$pdf->Cell(0,6,'Supplier',0,1);
$pdf->SetFont('times','',10);
$pdf->Cell(13,6,'Nama:',0,0);
$pdf->Cell(70,6,$terima[0]->nama_supplier,0,0);
$pdf->Cell(15,6,'Tanggal:',0,0);
$pdf->Cell(48,6,$terima[0]->tanggal,0,1);

$pdf->SetFont('times','B',10);
$pdf->Cell(45,7,'PATIN',1,0,'C');
$pdf->Cell(105,14,'KETERANGAN',1,0,'C');
$pdf->Cell(44,14,'Tenaga Kerja (Jam/Org)',1,0,'C');
$pdf->Ln(7);
$pdf->Cell(23,7,'Size',1,0,'C');
$pdf->Cell(22,7,'Jumlah',1,1,'C');

$pdf->SetFont('times','',10);
$pdf->writeHTMLCell(45,'35','','',$patin,'L,B,R',0,0,true,'L',true);
$pdf->writeHTMLCell(60,'35','','',$sup,'L,B,R',0,0,true,'L',true);
$pdf->writeHTMLCell(45,'','','',$samp,'L,B,R',0,0,true,'L',true);
$pdf->writeHTMLCell(44,'','','',$tk,'L,R',1,0,true,'L',true);

$pdf->Cell(23,7,'Jumlah','B,L',0,'L');
$pdf->Cell(22,7,$totalBerat." Kgs",1,0);

$pdf->Cell(30,7,'Pemakaian Es','B,L',0,'L');
$pdf->Cell(30,7,'-',1,0);
$pdf->Cell(45,7,'','1',0);
$pdf->Cell(44,7,'','B,R',1);

$pdf->Cell(0,3,'',0,1);
$pdf->Cell(25,7,'Signature','B,R',0);

$pdf->Ln(6);
$pdf->SetFont('Times','',9);
$pdf->Cell(50,6,'',0,0);
$pdf->Cell(50,6,'Proses',0,0);
$pdf->Cell(50,6,'Diperiksa Oleh',0,0);
$pdf->Cell(50,6,'QC',0,1);
$pdf->Cell(50,8,'',0,1);
$pdf->Cell(50,2,'',0,0);
$pdf->Cell(50,2,'',0,0);
$pdf->Cell(50,2,'',0,0);
$pdf->Cell(50,2,'',0,0);

$pdf->Output('Nota Penerimaan', 'I');

?>