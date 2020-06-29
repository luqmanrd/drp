<?php 

$trimming_total=$proses[0]->trimming_reg+$proses[0]->trimming_med;
$soaking_total=$proses[0]->soaking_reg+$proses[0]->soaking_med;
$freezing_total=$proses[0]->freezing_reg+$proses[0]->freezing_med;
$yield_fillet_rm= number_format(($proses[0]->fillet/$proses[0]->rm_diproses)*100,2);
$yield_trimming_rm = number_format(($trimming_total/$proses[0]->rm_diproses)*100,2);
$yield_soaking_rm = number_format(($soaking_total/$proses[0]->rm_diproses)*100,2);
$yield_soaking_trimming = number_format(($soaking_total/$trimming_total)*100,2);
$yield_freezing_rm = number_format(($freezing_total/$proses[0]->rm_diproses)*100,2);
$yield_freezing_soaking = number_format(($freezing_total/$soaking_total)*100,2);
$jumlah_waste = $proses[0]->giling+$proses[0]->belly_d+$proses[0]->belly_s+$proses[0]->d_trimming+$proses[0]->kerok+$proses[0]->tulang_giling+$proses[0]->kulit+$proses[0]->kepala+$proses[0]->limbah_sirip+$proses[0]->limbah;
$yield_waste_rm = number_format(($jumlah_waste/$proses[0]->rm_diproses)*100,2);
$jumlah_lost = ($trimming_total+$jumlah_waste)-$proses[0]->rm_diproses;
$yield_lost_rm = number_format(($jumlah_lost/$proses[0]->rm_diproses)*100,2);
$yield_giling = number_format(($proses[0]->giling/$proses[0]->rm_diproses)*100,2);
$yield_belly_d = number_format(($proses[0]->belly_d/$proses[0]->rm_diproses)*100,2);
$yield_belly_s = number_format(($proses[0]->belly_s/$proses[0]->rm_diproses)*100,2);
$yield_d_trimming = number_format(($proses[0]->d_trimming/$proses[0]->rm_diproses)*100,2);
$yield_kerok = number_format(($proses[0]->kerok/$proses[0]->rm_diproses)*100,2);
$yield_tulang_giling = number_format(($proses[0]->tulang_giling/$proses[0]->rm_diproses)*100,2);
$yield_kulit = number_format(($proses[0]->kulit/$proses[0]->rm_diproses)*100,2);
$yield_kepala = number_format(($proses[0]->kepala/$proses[0]->rm_diproses)*100,2);
$yield_limbah_sirip = number_format(($proses[0]->limbah_sirip/$proses[0]->rm_diproses)*100,2);
$yield_limbah = number_format(($proses[0]-> limbah/$proses[0]->rm_diproses)*100,2);


$rm = "
<style>
    table {
      padding: 0.5px;
      width: 135%;
    }
    </style>
<table>
<tr>
    <td><b>RM DIPROSES</b></td>
    <td><b>".$proses[0]->rm_diproses."</b></td>
    <td><b>Kgs</b></td>
</tr>
<tr>
    <td><b>FILLET</b></td>
    <td><b>".$proses[0]->fillet."</b></td>
    <td><b>Kgs</b></td>
</tr>
<tr>
    <td>Yield-RM</td>
    <td>".$yield_fillet_rm."</td>
</tr>
<tr>
    <td><b>TRIMMING</b></td>
    <td><b>".$trimming_total."</b></td>
    <td><b>Kgs</b></td>
</tr>
<tr>
    <td>Yield-RM</td>
    <td>".$yield_trimming_rm."%</td>
</tr>
<tr>
    <td><b>SOAKING</b></td>
    <td><b>".$soaking_total."</b></td>
    <td><b>Kgs</b></td>
</tr>
<tr>
    <td>Yield-RM</td>
    <td>".$yield_soaking_rm."%</td>
</tr>
<tr>
    <td>Yield-Trimming</td>
    <td>".$yield_soaking_trimming."%</td>
</tr>
<tr>
    <td><b>FREEZING</b></td>
    <td><b>".$freezing_total."</b></td>
    <td><b>Kgs</b></td>
</tr>
<tr>
    <td>Yield-RM</td>
    <td>".$yield_freezing_rm."%</td>
</tr>
<tr>
    <td>Yield-Soaking</td>
    <td>".$yield_freezing_soaking."%</td>
</tr>
<tr>
    <td><b>Dg. KUNING</b></td>
    <td><b>".$proses[0]->daging_kuning."</b></td>
    <td><b>Kgs</b></td>
</tr>
<tr>
    <td>Yield-RM</td>
    <td>".$yield_freezing_rm."%</td>
</tr>
<tr>
    <td>Yield-Trimming</td>
    <td>".$yield_freezing_soaking."%</td>
</tr>
</table>
";



$waste = "
<style>
    .blank_row{
    height: 10px !important; /* overwrites any other rules */
    background-color: #FFFFFF;
    }
    table {
    padding: 0.5px;
    width: 135%;
    column-gap: 0px;
    }
    </style>
<table>
<tr>
    <td>Daging Giling</td>
    <td>".$proses[0]->giling."</td>
    <td>Kg</td>
</tr>
<tr>
    <td>Belly Daging</td>
    <td>".$proses[0]->belly_d."</td>
    <td>Kg</td>
</tr>
<tr>
    <td>Belly Sirip</td>
    <td>".$proses[0]->belly_s."</td>
    <td>Kg</td>
</tr>
<tr>
    <td>Daging Trimming</td>
    <td>".$proses[0]->d_trimming."</td>
    <td>Kg</td>
</tr>
<tr>
    <td>Daging Kerok</td>
    <td>".$proses[0]->kerok."</td>
    <td>Kg</td>
</tr>
<tr>
    <td>Tulang Giling</td>
    <td>".$proses[0]->tulang_giling."</td>
    <td>Kg</td>
</tr>
<tr>
    <td>Kulit</td>
    <td>".$proses[0]->kulit."</td>
    <td>Kg</td>
</tr>
<tr>
    <td>Kepala</td>
    <td>".$proses[0]->kepala."</td>
    <td>Kg</td>
</tr>
<tr>
    <td>Sirip</td>
    <td>".$proses[0]->limbah_sirip."</td>
    <td>Kg</td>
</tr>
<tr>
    <td>Limbah</td>
    <td>".$proses[0]->limbah."</td>
    <td>Kg</td>
</tr>
<tr class=blank_row>
    <td colspan=2></td>
</tr>
<tr>
    <td><b>Jumlah</b></td>
    <td>".$jumlah_waste."</td>
    <td>Kg</td>
</tr>
<tr>
    <td>".$yield_waste_rm."</td>
</tr>
<tr>
    <td>Lost</td>
    <td>".$jumlah_lost."</td>
    <td>Kg</td>
</tr>
<tr>
    <td>".$yield_lost_rm."</td>
</tr>
</table>
";



$percent = "
<style>
table {
    padding: 0.5px;
}
</style>
<table>
<tr>
    <td></td>
    <td>".$yield_giling."</td>
    <td>%</td>
</tr>
<tr>
    <td></td>
    <td>".$yield_belly_d."</td>
    <td>%</td>
</tr>
<tr>
    <td></td>
    <td>".$yield_belly_s."</td>
    <td>%</td>
</tr>
<tr>
    <td></td>
    <td>".$yield_d_trimming."</td>
    <td>%</td>
</tr>
<tr>
    <td></td>
    <td>".$yield_kerok."</td>
    <td>%</td>
</tr>
<tr>
    <td></td>
    <td>".$yield_tulang_giling."</td>
    <td>%</td>
</tr>
<tr>
    <td></td>
    <td>".$yield_kulit."</td>
    <td>%</td>
</tr>
<tr>
    <td></td>
    <td>".$yield_kepala."</td>
    <td>%</td>
</tr>
<tr>
    <td></td>
    <td>".$yield_limbah_sirip."</td>
    <td>%</td>
</tr>
<tr>
    <td></td>
    <td>".$yield_limbah."</td>
    <td>%</td>
</tr>
</table>";

$tk = "
<style>
.blank_row{
    height: 10px !important; /* overwrites any other rules */
    background-color: #FFFFFF;
}
table{
    padding: 0.5px;
}

</style>
<table>
<tr>
    <td>Harian</td>
    <td>".$proses[0]->tk_harian_jam*$proses[0]->tk_harian_org."</td>
    <td>Jam/Org</td>
</tr>
<tr>
    <td>Jam</td>
    <td>".$proses[0]->tk_jam_jam*$proses[0]->tk_jam_org."</td>
    <td>Jam/Org</td>
</tr>
<tr>
    <td>Borongan</td>
    <td>".$proses[0]->tk_borongan_jam*$proses[0]->tk_borongan_org."</td>
    <td>Jam/Org</td>
</tr>
<tr class=blank_row>
    <td colspan=5></td>
</tr>
<tr>
    <td>Es Balok</td>
    <td>".$proses[0]->es_balok_balok."</td>
    <td>Balok</td>
</tr>
<tr>
    <td>Es Tube</td>
    <td>".$proses[0]->es_tube_bag."</td>
    <td>Bags</td>
</tr>
<tr>
    <td>Additif</td>
    <td>".$proses[0]->additif_kgs."</td>
    <td>Kgs</td>
</tr>
";



$jm = "
<table>

</table>";


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
$pdf->Cell(0,5,'NOTA PROSES',0,1,'R');
$pdf->SetFont('times','B',11);
$pdf->Cell(0,5,$proses[0]->nota_proses,0,1,'R');
$pdf->Line(8,30,200,30);
$pdf->Ln(1);
$pdf->SetFont('times','',10);
$pdf->Cell(15,5,'Nama:',0,0);
$pdf->Cell(70,5,$proses[0]->nama_intern,0,0);
$pdf->Cell(17,5,'Tanggal:',0,0);
$pdf->Cell(48,5,$proses[0]->tanggal,0,1);

$pdf->SetFont('times','B',12);
$pdf->Cell(190,8,'H A S I L  P R O S E S',1,1,'C');

$pdf->SetFont('times','',9);
$pdf->writeHTMLCell(55,'70','','',$rm,'L,B,R',0,0,true,'L',true);
$pdf->SetFont('times','B',9);
$pdf->Cell(55,5,'WASTE','1',0);
$pdf->Cell(28,5,'%','1',0,'C');
$pdf->Cell(52,5,'TENAGA KERJA','1',1);
$pdf->SetFont('times','',9);
$pdf->writeHTMLCell(55,'61','65','',$waste,'L,B,R',0,0,true,'L',true);
$pdf->writeHTMLCell(28,'65','','',$percent,'L,B,R',0,0,true,'C',true);
$pdf->writeHTMLCell(52,'65','','',$tk,'L,B,R',1,0,true,'L',true);


$pdf->Ln(2);
$pdf->SetFont('times','',8);
$pdf->Line(38,115,100,115);
$pdf->Cell(28,4,'Signature','B,R',1,'');
$pdf->SetFont('times','',8);
$pdf->Cell(40,5,'',0,0,'C');
$pdf->Cell(50,5,'Mengetahui/Menyetujui',0,0,'C');
$pdf->Cell(50,5,'Diperiksa Oleh',0,0,'C');
$pdf->Cell(50,5,'Pembelian',0,1,'C');
$pdf->Ln(3);

$pdf->Output('Nota Proses', 'I');
?>