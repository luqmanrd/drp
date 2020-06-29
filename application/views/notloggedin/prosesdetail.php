<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container container-bg-white">
	<div class="row titlepage">
		<div class="col-lg-8">
			<h5 class="">Data Proses</h5>
		</div>
		<div class="col-lg-4">
			<div class="" id="no_nota">Nota : <strong><?php echo $proses[0]->nota_proses?></strong></div>
		</div>

	</div>
	<div class="form-padding">
		<div class="row justify-content-end" style="margin-bottom: 10px">
			<button class="btn btn-sm btn-info btn-circle"  onclick="location.href='<?php echo base_url("cetak/proses/".$proses[0]->nota_proses) ;?>';"><img src="<?php echo base_url('assets/img/print_button.png')?>"></button>
		</div>
		<div class="form-group row">
			<label for="inputPassword" class="col-sm-2">Tanggal</label>
			<div class="col-sm-4">
				<div ><strong id="tanggal"><?php echo $proses[0]->tanggal?></strong></div>
			</div>
			<div class="col-sm-3"></div>
		</div>
		<div class="form-group row">
			<label for="inputPassword" class="col-sm-2">Nota Pembelian</label>
			<div class="col-sm-4">
				<div class=""><strong id="nota_pembelian"><?php echo $proses[0]->nota_pembelian?></strong></div>
			</div>
			<div class="col-sm-3"></div>
			<div class="col-sm-3"><strong ><?php echo $proses[0]->nama_intern?></strong></div>
		</div>
		<div class="titleform" >
			<strong>PROSES</strong>
		</div>
		<div class="form-row justify-content-center">
			<div class="form-group col-lg-3 text-center">
				<strong>RM DIPROSES</strong>
				<h4 id="totalberat"><?php echo $proses[0]->rm_diproses?></h4>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="form-group col-lg-3 text-center">
				<strong style="color: #454545">Fillet</strong>
				<h3><?php echo $proses[0]->fillet ?> Kg</h3>
				<h5 style="color: #454545"><?php echo number_format(($proses[0]->fillet/$proses[0]->rm_diproses)*100,2)?>%</h5>
			</div>
			<?php
			if($proses[0]->trimming_reg!=0){
				?>
				<div class="form-group col-lg-3 text-center">
					<strong style="color: #454545">Trimming Reguler</strong>
					<h3><?php echo $proses[0]->trimming_reg?> Kg</h3>
					<h5 style="color: #454545"><?php echo number_format(($proses[0]->trimming_reg/$proses[0]->rm_diproses)*100,2)?>%</h5>
				</div>
				
			<?php }
			?>
			<?php
			if($proses[0]->trimming_med!=0){
				?>
				<div class="form-group col-lg-3 text-center">
					<strong style="color: #454545">Trimming Medium</strong>
					<h3><?php echo $proses[0]->trimming_med?> Kg</h3>
					<h5 style="color: #454545"><?php echo number_format(($proses[0]->trimming_med/$proses[0]->rm_diproses)*100,2)?>%</h5>
				</div>
			<?php }
			?>
			<?php
			if($proses[0]->soaking_reg!=0){
				?>
				<div class="form-group col-lg-3 text-center">
					<strong style="color: #454545">Soaking Reguler</strong>
					<h3><?php echo $proses[0]->soaking_reg ?> Kg</h3>
					<h5 style="color: #454545"><?php echo number_format((($proses[0]->soaking_reg/$proses[0]->trimming_reg)-1)*100,2)?>%</h5>
				</div>
			<?php }
			?>
			<?php
			if($proses[0]->soaking_med!=0){
				?>
				<div class="form-group col-lg-3 text-center">
					<strong style="color: #454545">Soaking Medium</strong>
					<h3><?php echo $proses[0]->soaking_med ?> Kg</h3>
					<h5 style="color: #454545"><?php echo number_format((($proses[0]->soaking_med/$proses[0]->trimming_med)-1)*100,2)?>%</h5>
				</div>
			<?php } 
			?>
			<?php
			if($proses[0]->freezing_reg!=0){
				?>
				<div class="form-group col-lg-3 text-center">
					<strong style="color: #454545">Freezing</strong>
					<h3><?php echo $proses[0]->freezing_reg?> Kg</h3>
					<h5 style="color: #454545"><?php echo number_format((($proses[0]->freezing_reg/$proses[0]->soaking_reg)-1)*100,2)?>%</h5>
				</div>
			<?php } ?>
			<?php
			if($proses[0]->freezing_med!=0){
				?>
				<div class="form-group col-lg-3 text-center">
					<strong style="color: #454545">Freezing</strong>
					<h3><?php echo $proses[0]->freezing_med?> Kg</h3>
					<h5 style="color: #454545"><?php echo number_format(((($proses[0]->freezing_med/$proses[0]->soaking_med))-1)*100,2)?>%</h5>
				</div>
			<?php } ?>
			<?php
			if($proses[0]->daging_kuning!=0){
				?>
				<div class="form-group col-lg-3 text-center">
					<strong style="color: #454545">Daging Kuning</strong>
					<h3><?php echo $proses[0]->daging_kuning?> Kg</h3>
					<h5 style="color: #454545"><?php echo number_format((($proses[0]->daging_kuning/$proses[0]->trimming_reg+$proses[0]->trimming_med))*100,2)?>%</h5>
				</div>
			<?php } ?>
		</div>
		
		<div class="titleform" >
			<strong>WASTE</strong>
		</div>
		<div class="form-row justify-content-center">
			<div class="form-group col-lg-3 text-center">
				<strong>LOST</strong>
				<h3 id="totalberat"><?php echo $proses[0]->rm_diproses-($proses[0]->giling+$proses[0]->belly_s+$proses[0]->belly_d+$proses[0]->d_trimming+$proses[0]->kerok+$proses[0]->kulit+$proses[0]->kepala+$proses[0]->limbah_sirip+$proses[0]->limbah+$proses[0]->trimming_reg+$proses[0]->trimming_med)?></h3>
				<h5><?php echo number_format(($proses[0]->rm_diproses-($proses[0]->giling+$proses[0]->belly_s+$proses[0]->belly_d+$proses[0]->d_trimming+$proses[0]->kerok+$proses[0]->kulit+$proses[0]->kepala+$proses[0]->limbah_sirip+$proses[0]->limbah+$proses[0]->trimming_reg+$proses[0]->trimming_med))/$proses[0]->rm_diproses,2)*100?>%</h5>
			</div>
		</div>
		<div class="form-group row">
			<strong for="inputPassword" class="col-sm-2 col-form-label strong-grey">D. Giling</strong>
			<div class="col-sm-2 col-form-label">
				<?php echo $proses[0]->giling?> Kg
			</div>
			<strong for="inputPassword" class="col-sm-2 col-form-label strong-grey">Belly S</strong>
			<div class="col-sm-2 col-form-label">
				<?php echo $proses[0]->belly_s?> Kg
			</div>
			<strong for="inputPassword" class="col-sm-2 col-form-label strong-grey">Belly D</strong>
			<div class="col-sm-2 col-form-label">
				<?php echo $proses[0]->belly_d?> Kg
			</div>
			<strong for="inputPassword" class="col-sm-2 col-form-label strong-grey">D Trimming</strong>
			<div class="col-sm-2 col-form-label">
				<?php echo $proses[0]->d_trimming?> Kg
			</div>
			<strong for="inputPassword" class="col-sm-2 col-form-label strong-grey">Kerok</strong>
			<div class="col-sm-2 col-form-label">
				<?php echo $proses[0]->kerok?> Kg
			</div>
			<strong for="inputPassword" class="col-sm-2 col-form-label strong-grey">Kulit</strong>
			<div class="col-sm-2 col-form-label">
				<?php echo $proses[0]->kulit?> Kg
			</div>
			<strong for="inputPassword" class="col-sm-2 col-form-label strong-grey">Kepala</strong>
			<div class="col-sm-2 col-form-label">
				<?php echo $proses[0]->kepala?> Kg
			</div>
			<strong for="inputPassword" class="col-sm-2 col-form-label strong-grey">Tulang Giling</strong>
			<div class="col-sm-2 col-form-label">
				<?php echo $proses[0]->tulang_giling?> Kg
			</div>
			<strong for="inputPassword" class="col-sm-2 col-form-label strong-grey">Limbah Sirip</strong>
			<div class="col-sm-2 col-form-label">
				<?php echo $proses[0]->limbah_sirip?> Kg
			</div>
			<strong for="inputPassword" class="col-sm-2 col-form-label strong-grey">Limbah</strong>
			<div class="col-sm-2 col-form-label">
				<?php echo $proses[0]->limbah?> Kg
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
				<td><?php echo $proses[0]->tk_harian_org;?></td>
				<td><?php echo $proses[0]->tk_harian_jam;?></td>
				<td><?php echo $proses[0]->tk_harian_org*$proses[0]->tk_harian_jam;?></td>
			</tr>
			<tr>
				<td>Jam</td>
				<td><?php echo $proses[0]->tk_jam_org;?></td>
				<td><?php echo $proses[0]->tk_jam_jam;?></td>
				<td><?php echo $proses[0]->tk_jam_org*$proses[0]->tk_jam_jam;?></td>
			</tr>
			<tr>
				<td>Borongan</td>
				<td><?php echo $proses[0]->tk_borongan_org;?></td>
				<td><?php echo $proses[0]->tk_borongan_jam;?></td>
				<td><?php echo $proses[0]->tk_borongan_org*$proses[0]->tk_borongan_jam;?></td>
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
						<td><?php echo $proses[0]->es_balok_balok;?></td>
						<td><?php echo $proses[0]->es_balok_harsat;?></td>
						<td><?php echo $proses[0]->es_tube_bag;?></td>
						<td>Rp<?php echo number_format($proses[0]->es_tube_harsat);?></td>
						<td><strong>Rp<?php echo number_format((($proses[0]->es_balok_balok*$proses[0]->es_balok_harsat)+($proses[0]->es_tube_bag*$proses[0]->es_tube_harsat))); ?></strong></td>
					</tr>
				</table>
			</div>
			<div class="col-md-1"></div>
			<div class="col-md-5">
				<table class="table table-bordered table-responsive-lg text-center">
					<tr>
						<th colspan="3">Additif (Qualimax Garam)</th>
					</tr>
					<tr>
						<td>Kgs</td>
						<td>Harsat</td>
						<td>Total</td>
					</tr>
					<tr>
						<td><?php echo $proses[0]->additif_kgs;?></td>
						<td>Rp<?php echo number_format($proses[0]->additif_harsat);?></td>
						<td><strong>Rp<?php echo number_format($proses[0]->additif_kgs*$proses[0]->additif_harsat);?></strong></td>
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
	$(document).ready(function(){
		
		function numberWithCommas(x) {
			return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
		}
		var totalberat = parseFloat($("#totalberat").text());
		var totalharga = parseFloat($("#totalharga").text());
		var ratarata = parseFloat($("#ratarata").text());
		var totalharga = numberWithCommas(totalharga);
		var ratarata = numberWithCommas(parseInt(ratarata));
		jQuery("h4#totalberat").html(totalberat.toFixed(2)+" Kg");
		jQuery("h4#totalharga").html("Rp"+totalharga);
		jQuery("h4#ratarata").html("Rp"+ratarata);

	});
</script>
</body>
</html>