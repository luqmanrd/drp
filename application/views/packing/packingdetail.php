<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container container-bg-white">
	<div class="row titlepage">
		<div class="col-lg-8">
			<h5 class="">Data Packing</h5>
		</div>
		<div class="col-lg-4">
			<div class="" id="no_nota">Nota : <strong><?php echo $packing[0]->nota_packing?></strong></div>
		</div>

	</div>
	<div class="form-padding">
		<div class="titleform" >
			<div class="row justify-content-end" style="margin-bottom: 10px">
				<button class="btn btn-sm btn-info btn-circle" onclick="location.href='<?php echo base_url("packing/sunting/".$packing[0]->nota_packing) ;?>';"><img src="<?php echo base_url('assets/img/edit_button.png')?>"></button>
			</div>
			<strong>MEDIUM</strong>
		</div>
		<div class="form-row justify-content-center">
			<div class="form-group col-lg-3 text-center">
				<strong>TOTAL</strong>
				<h4 id=""><?php echo number_format($packing[0]->med_25+$packing[0]->med_30+$packing[0]->med_40+$packing[0]->med_50,2) ?> Kg</h4>
			</div>
		</div>
		<div class="row ">
			<div class="form-group col-lg-3 text-center">
				<strong style="color: #454545">25%</strong>
				<h3><?php echo $packing[0]->med_25 ?> Kg</h3>
			</div>
			<div class="form-group col-lg-3 text-center">
				<strong style="color: #454545">30%</strong>
				<h3><?php echo $packing[0]->med_30?> Kg</h3>
			</div>
			<div class="form-group col-lg-3 text-center">
				<strong style="color: #454545">40%</strong>
				<h3><?php echo $packing[0]->med_40 ?> Kg</h3>
			</div>
			<div class="form-group col-lg-3 text-center">
				<strong style="color: #454545">50%</strong>
				<h3><?php echo $packing[0]->med_50?> Kg</h3>
			</div>
		</div>
		<div class="titleform" >
			<strong>REGULAR</strong>
		</div>
		<div class="form-row justify-content-center">
			<div class="form-group col-lg-3 text-center">
				<strong>TOTAL</strong>
				<h4 id=""><?php echo number_format($packing[0]->reg_25+$packing[0]->reg_30+$packing[0]->reg_40+$packing[0]->reg_50,2) ?> Kg</h4>
			</div>
		</div>
		<div class="row ">
			<div class="form-group col-lg-3 text-center">
				<strong style="color: #454545">25%</strong>
				<h3><?php echo $packing[0]->reg_25 ?> Kg</h3>
			</div>
			<div class="form-group col-lg-3 text-center">
				<strong style="color: #454545">30%</strong>
				<h3><?php echo $packing[0]->reg_30?> Kg</h3>
			</div>
			<div class="form-group col-lg-3 text-center">
				<strong style="color: #454545">40%</strong>
				<h3><?php echo $packing[0]->reg_40 ?> Kg</h3>
			</div>
			<div class="form-group col-lg-3 text-center">
				<strong style="color: #454545">50%</strong>
				<h3><?php echo $packing[0]->reg_50?> Kg</h3>
			</div>
		</div>
		<div class="titleform" >
			<strong>BULKPACK</strong>
		</div>
		<div class="form-row justify-content-center">
			<div class="form-group col-lg-3 text-center">
				<strong>TOTAL</strong>
				<h4 id=""><?php echo number_format($packing[0]->bulkpack_med_25+$packing[0]->bulkpack_med_30+$packing[0]->bulkpack_med_40+$packing[0]->bulkpack_med_50+$packing[0]->bulkpack_reg_25+$packing[0]->bulkpack_reg_30+$packing[0]->bulkpack_reg_40+$packing[0]->bulkpack_med_50,2); ?> Kg</h4>
			</div>
		</div>
		<div class="row ">
			<div class="form-group col-lg-3 text-center">
				<strong style="color: #454545">MEDIUM 25%</strong>
				<h3><?php echo $packing[0]->bulkpack_med_25 ?> Kg</h3>
			</div>
			<div class="form-group col-lg-3 text-center">
				<strong style="color: #454545">MEDIUM 30%</strong>
				<h3><?php echo $packing[0]->bulkpack_med_30?> Kg</h3>
			</div>
			<div class="form-group col-lg-3 text-center">
				<strong style="color: #454545">MEDIUM 40%</strong>
				<h3><?php echo $packing[0]->bulkpack_med_40 ?> Kg</h3>
			</div>
			<div class="form-group col-lg-3 text-center">
				<strong style="color: #454545">MEDIUM 50%</strong>
				<h3><?php echo $packing[0]->bulkpack_med_50?> Kg</h3>
			</div>
			<div class="form-group col-lg-3 text-center">
				<strong style="color: #454545">REGULAR 25%</strong>
				<h3><?php echo $packing[0]->bulkpack_reg_25 ?> Kg</h3>
			</div>
			<div class="form-group col-lg-3 text-center">
				<strong style="color: #454545">REGULAR 30%</strong>
				<h3><?php echo $packing[0]->bulkpack_reg_30?> Kg</h3>
			</div>
			<div class="form-group col-lg-3 text-center">
				<strong style="color: #454545">REGULAR 40%</strong>
				<h3><?php echo $packing[0]->bulkpack_reg_40 ?> Kg</h3>
			</div>
			<div class="form-group col-lg-3 text-center">
				<strong style="color: #454545">REGULAR 50%</strong>
				<h3><?php echo $packing[0]->bulkpack_reg_50?> Kg</h3>
			</div>
		</div>
		<div class="titleform" >
			<strong>DAGING KUNING / 2ND</strong>
		</div>
		<div class="form-row justify-content-center">
			<div class="form-group col-lg-3 text-center">
				<strong>TOTAL</strong>
				<h4 id=""><?php echo number_format($packing[0]->reg_kuning_25+$packing[0]->reg_kuning_30+$packing[0]->reg_kuning_40+$packing[0]->reg_kuning_50+$packing[0]->reg_2nd_25+$packing[0]->reg_2nd_30+$packing[0]->reg_2nd_40+$packing[0]->reg_2nd_50)?> Kg</h4>
			</div>
		</div>
		<div class="row ">
			<div class="form-group col-lg-3 text-center">
				
				<h3><?php echo $packing[0]->reg_kuning_25?> Kg</h3>
				<strong style="color: #454545">REG DAGING KUNING 25%</strong>
			</div>
			<div class="form-group col-lg-3 text-center">
				
				<h3><?php echo $packing[0]->reg_kuning_30 ?> Kg</h3>
				<strong style="color: #454545">REG DAGING KUNING 30%</strong>
			</div>
			<div class="form-group col-lg-3 text-center">
				
				<h3><?php echo $packing[0]->reg_kuning_40?> Kg</h3>
				<strong style="color: #454545">REG DAGING KUNING 40%</strong>
			</div>
			<div class="form-group col-lg-3 text-center">
				
				<h3><?php echo $packing[0]->reg_kuning_50 ?> Kg</h3>
				<strong style="color: #454545">REG DAGING KUNING 50%</strong>
			</div>
			<div class="form-group col-lg-3 text-center">
				
				<h3><?php echo $packing[0]->reg_2nd_25 ?> Kg</h3>
				<strong style="color: #454545">REG 2ND 25%</strong>
			</div>
			<div class="form-group col-lg-3 text-center">
				
				<h3><?php echo $packing[0]->reg_2nd_30 ?> Kg</h3>
				<strong style="color: #454545">REG 2ND 30%</strong>
			</div>
			<div class="form-group col-lg-3 text-center">
				
				<h3><?php echo $packing[0]->reg_2nd_40?> Kg</h3>
				<strong style="color: #454545">REG 2ND 40%</strong>
			</div>
			<div class="form-group col-lg-3 text-center">
				
				<h3><?php echo $packing[0]->reg_2nd_50?> Kg</h3>
				<strong style="color: #454545">REG 2ND 50%</strong>
			</div>
		</div>
		<div class="titleform">
			<strong>TENAGA KERJA</strong>
		</div>
		<table class="table table-hover table-responsive-lg">
			<tr>
				<th></th>
				<th>Orang</th>
				<th>Jam</th>
				<th>Total</th>
			</tr>
			<tr>
				<td>Harian</td>
				<td><?php echo $packing[0]->tk_harian_org;?></td>
				<td><?php echo $packing[0]->tk_harian_jam;?></td>
				<td><?php echo $packing[0]->tk_harian_org*$packing[0]->tk_harian_jam;?></td>
			</tr>
			<tr>
				<td>Jam</td>
				<td><?php echo $packing[0]->tk_jam_org;?></td>
				<td><?php echo $packing[0]->tk_jam_jam;?></td>
				<td><?php echo $packing[0]->tk_jam_org*$packing[0]->tk_jam_jam;?></td>
			</tr>
			<tr>
				<td>Borongan</td>
				<td><?php echo $packing[0]->tk_borongan_org;?></td>
				<td><?php echo $packing[0]->tk_borongan_jam;?></td>
				<td><?php echo $packing[0]->tk_borongan_org*$packing[0]->tk_borongan_jam;?></td>
			</tr>
		</table>
		<div class="titleform">
			<strong>PENUNJANG & PEMBANTU PROSES</strong>
		</div>
		<div class="row">
			<div class="col-md-5">
				<table class="table table-bordered table-bordered table-responsive-lg text-center">
					<tr>
						<th colspan="5">Pemakaian Es</th>
					</tr>
					<tr>
						<td colspan="2">Es Balok</td>
						<td colspan="2">Es Tube</td>
						<td rowspan="2" class="align-middle">Total</td>
					</tr>
					<tr>
						<td>Balok</td>
						<td>Harsat</td>
						<td>Bag</td>
						<td>Harsat</td>
					</tr>
					<tr>
						<td><?php echo $packing[0]->es_balok_balok;?></td>
						<td>Rp<?php echo number_format($packing[0]->es_balok_harsat);?></td>
						<td><?php echo $packing[0]->es_tube_bag;?></td>
						<td>Rp<?php echo number_format($packing[0]->es_tube_harsat);?></td>
						<td><strong>Rp<?php echo number_format((($packing[0]->es_balok_balok*$packing[0]->es_balok_harsat)+($packing[0]->es_tube_bag*$packing[0]->es_tube_harsat)));?></strong></td>
					</tr>
				</table>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-5">
				<table class="table table-bordered table-responsive-lg text-center">
					<tr>
						<th colspan="3">Plastik</th>
					</tr>
					<tr>
						<td>Kgs</td>
						<td>Harsat</td>
						<td>Total</td>
					</tr>
					<tr>
						<td><?php echo $packing[0]->plastik_kgs;?></td>
						<td>Rp<?php echo number_format($packing[0]->plastik_harsat);?></td>
						<td><strong>Rp<?php echo number_format($packing[0]->plastik_kgs*$packing[0]->plastik_harsat);?></strong></td>
					</tr>
				</table>
			</div>	
		</div>
		<div class="row">
			<div class="col-md-5">
				<table class="table table-bordered table-responsive-lg text-center">
					<tr>
						<th colspan="3">MC A-1</th>
					</tr>
					<tr>
						<td>Kgs</td>
						<td>Harsat</td>
						<td>Total</td>
					</tr>
					<tr>
						<td><?php echo $packing[0]->mc_a1_kgs;?></td>
						<td>Rp<?php echo number_format($packing[0]->mc_a1_harsat);?></td>
						<td><strong>Rp<?php echo number_format($packing[0]->mc_a1_kgs*$packing[0]->mc_a1_harsat);?></strong></td>
					</tr>
				</table>
			</div>	
		</div>
		
	</div>
</div>
</div>
<script src="<?php echo base_url('assets/js/jquery-3.2.1.slim.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/popper.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-4.0.0/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/jquery.1.11.1.min.js')?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
		var namabulan = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
		var tanggal = $("#tanggal").text();
		var tahun = tanggal.substring(0, 4);
		var bulan = parseInt(tanggal.substring(5, 7));
		var hari = parseInt(tanggal.substring(8,10));
		// console.log(namabulan[bulan]);
		console.log(namabulan[bulan-1]);
		jQuery("strong#tanggal").html(hari+" "+namabulan[bulan-1]+" "+tahun);
	});
</script>
<script type="text/javascript">
	// $(document).ready(function(){
		
	// 	function numberWithCommas(x) {
	// 		return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
	// 	}
	// 	var totalberat = parseFloat($("#totalberat").text());
	// 	var totalharga = parseFloat($("#totalharga").text());
	// 	var ratarata = parseFloat($("#ratarata").text());
	// 	var totalharga = numberWithCommas(totalharga);
	// 	var ratarata = numberWithCommas(parseInt(ratarata));
	// 	jQuery("h4#totalberat").html(totalberat.toFixed(2)+" Kg");
	// 	jQuery("h4#totalharga").html("Rp"+totalharga);
	// 	jQuery("h4#ratarata").html("Rp"+ratarata);

	// });
</script>
</body>
</html>