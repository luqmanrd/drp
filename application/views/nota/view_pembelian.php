<?php 
$a = "";
$b = "";
$c = "";
$totalBerat = 0;
$totalHarga = 0;

foreach ($detail as $d) {
  $a .= "<tr><td>".$d->berat."</td><td>kg</td></tr>";
  $totalBerat += $d->berat;
};
foreach ($detail as $d) {
  $b .= "<tr><td>".$d->size."</td><td>@</td><td>".$d->harga."</td></tr>";
};
foreach ($detail as $d) {
  $c .= "<tr><td>".number_format($d->berat*$d->harga)."</td></tr>";
  $totalHarga += ($d->berat*$d->harga);
};


$qty = "<table>".$a."</table>";

$desc = "<table>".$b."</table>";

$total = "<table>".$c."</table>";

    $pdf = new pdf2('L', 'mm', 'A5');
    $pdf->setPrintHeader(false);
    $pdf->setPrintFooter(false);
    
    $pdf->AddPage();
    
    $pdf->setJPEGQuality(75);
    $pdf->Image(base_url('assets/img/drp_icon.jpg'),5,5,20,20,'JPG','','',false,300,'', false, false, 0, false, false, true);
    $pdf->Cell(15,7,'',0,0);

    $pdf->SetFont('timesB','B',11);
    $pdf->Cell(140,6,'No. Nota:',0,0,'R');
    $pdf->Cell(40,6,$terima[0]->nota_pembelian,0,1);
    $pdf->SetFont('times','B',14);
    $pdf->Cell(120,6,'',0,0);
    $pdf->Cell(70,10,'NOTA PEMBELIAN','L,T',1);
    $pdf->Line(8,26,130,26);
    $pdf->Ln(2); /** */

    $pdf->SetFont('times','B',11);
    $pdf->Cell(120,6,'Supplier','B,R',0);
    $pdf->SetFont('times','B',10);
    $pdf->Cell(55,6,'Misc','T',1);
    $pdf->SetFont('times','',10);
    $pdf->Cell(15,6,'Nama:',0,0);
    $pdf->Cell(105,6,$terima[0]->nama_supplier,0,0);
    $pdf->SetFont('times','',9);
    $pdf->Cell(25,6,'Date:',0,0);
    $pdf->Cell(30,6,$terima[0]->tanggal,0,1);
    $pdf->Cell(120,6,'',0,0);
    $pdf->Cell(25,6,'No. Surat Jalan:',0,0);
    $pdf->Cell(30,6,$terima[0]->surat_jalan,0,1);
    $pdf->Cell(120,6,'',0,0);
    $pdf->Cell(25,6,'No. Pol Mobil',0,0);
    $pdf->Cell(30,6,$terima[0]->no_pol,0,1);
    
    $pdf->SetFont('times','B',11);
    $pdf->Cell(50,9,'Qty',1,0,'C');
    $pdf->Cell(90,9,'DESCRIPTION',1,0,'C');
    $pdf->Cell(42,9,'TOTAL',1,1,'C');

    $pdf->SetFont('times','',11);
    $pdf->writeHTMLCell(50,27,'','',$qty,'L,B,R',0,0,true,'C',true);
    $pdf->writeHTMLCell(90,27,'','',$desc,'L,R',0,0,true,'L',true);
    $pdf->writeHTMLCell(42,27,'','',$total,'L,R',1,0,true,'C',true);

    $pdf->Cell(35,6,number_format($totalBerat),1,0,'C');
    $pdf->Cell(15,6,'kg',1,0,'C');

    $pdf->Cell(90,6,'','L,R,B',0,'');
    $pdf->Cell(42,6,'','L,R,B',1,'');
    $pdf->SetFont('times','B',11);
    $pdf->Cell(50,6,'',0,0,'');

    $pdf->Cell(90,6,'TOTAL',0,0,'R');
    $pdf->Cell(42,6,number_format($totalHarga),'L,R,B',1,'C');
    $pdf->Cell(40,5,'Signature','B,R',1);
    $pdf->Line(50,100,120,100);
    $pdf->SetFont('times','',9);
    $pdf->Cell(50,5,'Supplier',0,0,'C');
    $pdf->Cell(50,5,'Mengetahui/Menyetujui',0,0,'C');
    $pdf->Cell(50,5,'Diperiksa Oleh',0,0,'C');
    $pdf->Cell(50,5,'Pembelian',0,1,'C');
    $pdf->Ln(10);
    $pdf->Cell(50,5,'',0,0,'C');
    $pdf->Cell(50,5,'',0,0,'C');
    $pdf->Cell(50,5,'',0,0,'C');
    $pdf->Cell(50,5,'',0,0,'C');


    $pdf->Output('Nota Pembelian','I');
?>