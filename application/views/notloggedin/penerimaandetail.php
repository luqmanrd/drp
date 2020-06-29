<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->session->set_userdata('referred_from', current_url());
?>

<div class="container container-bg-white">
	<div class="row titlepage">
		<div class="col-lg-8">
			<h5 class="">Data Penerimaan Barang</h5>
		</div>
		<div class="col-lg-4">
			<div class="" id="no_nota">Nota : <strong><?php echo $terima[0]->nota_pembelian?></strong></div>
		</div>

	</div>
	<div class="form-padding">
		<div class="row justify-content-end" style="margin-bottom: 10px">
			<!-- <button type="button"  onclick="location.href='';" class="btn btn-info btn-sm btn-circle"><img src="<?php echo base_url('assets/img/print_button.png')?>"></button> -->
			<button class="btn btn-info btn-circle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
				<img src="<?php echo base_url('assets/img/print_button.png')?>">
			</button>
			<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
				<a class="dropdown-item" href="<?php echo base_url('cetak/pembelian/'.$terima[0]->nota_pembelian) ?>">Nota Pembelian</a>
				<a class="dropdown-item" href="<?php echo base_url('cetak/penerimaan/'.$terima[0]->nota_pembelian) ?>">Nota Terima Barang</a>
			</div>
		</div>
		<div class="form-group row">
			<label for="inputPassword" class="col-sm-2 col-form-label">Tanggal</label>
			<div class="col-sm-4">
				<div class="col-form-label"><strong id="tanggal"><?php echo $terima[0]->tanggal?></strong></div>
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-1 col-form-label"><strong><?php echo $terima[0]->nama_ikan; ?></strong></div>
			<?php
			if($terima[0]->status==2){
				echo '<div class="col-sm-3 col-form-label bg-success text-white text-center" style="background-color: "><strong>Telah Diproses</strong></div>';
			}else if($terima[0]->status==1){
				echo '<div class="col-sm-3 col-form-label bg-warning text-white text-center" style="background-color: "><strong>Diproses Sebagian</strong></div>';
			}else{
				echo '<div class="col-sm-3 col-form-label bg-danger text-white text-center" style="background-color: "><strong>Belum diproses</strong></div>';
			}
			?>
			
		</div>
		<div class="titleform" >
			<strong>RM MASUK</strong>
		</div>
		<div class="form-row justify-content-center">
			<?php 
			$no = 1;
			$totalberat = 0;
			$totalharga = 0;
			foreach ($detail as $d) {

				?>
				<div class="form-group col-lg-2 text-center" id="myDiv" style="border-right: 2px solid #c9c9c9">
					<label for="inputEmail4"><?php echo $d->size;?></label>
					<h4 id="berat"><?php echo $d->berat ?> Kg</h4>
					<div id="harga"><?php echo $d->harga ?></div>
					<?php
					$totalberat = $totalberat + $d->berat;
					$totalharga = $totalharga + ($d->berat * $d->harga);
					?>
				</div>
				<?php $no++; }
				$ratarata = $totalharga/$totalberat;
				?>
			</div>
			<div class="form-row">
				<div class="col-sm-1"></div>
				<div class="form-group col-lg-3 text-center">
					<div>Total Berat</div>
					<h4 id="totalberat"><?php echo $totalberat?></h4>
				</div>
				<div class="form-group col-lg-3 text-center">
					<div>Total Harga</div>
					<h4 id="totalharga"><?php echo $totalharga?></h4>
				</div>
				<div class="form-group col-lg-3 text-center">
					<div>Rata Rata Harga/Kg</div>
					<h4 id="ratarata"><?php echo $ratarata?></h4>
				</div>
				<div class="col-lg-1"></div>
			</div>
			<div class="titleform" >
				<strong>SUPPLIER</strong>
			</div>
			<div class="form-group row">
				<strong for="inputPassword" class="col-sm-3 col-form-label strong-grey">Nama Supplier</strong>
				<div class="col-sm-3 col-form-label">
					<?php echo $terima[0]->nama_supplier ?>
				</div>
				<strong for="inputPassword" class="col-sm-3 col-form-label strong-grey">No. Surat Jalan</strong>
				<div class="col-sm-3 col-form-label">
					<?php echo $terima[0]->surat_jalan ?>
				</div>
			</div>
			<div class="form-group row">
				<strong for="inputPassword" class="col-sm-3 col-form-label strong-grey">No. Pol Kendaraan</strong>
				<div class="col-sm-3 col-form-label">
					<?php echo $terima[0]->no_pol ?>
				</div>
				<strong for="inputPassword" class="col-sm-3 col-form-label strong-grey">Petani</strong>
				<div class="col-sm-3 col-form-label">
					<?php echo $terima[0]->nama_petani?>
				</div>
			</div>
			<div class="titleform">
				<strong>SAMPLING</strong>
			</div>
			<div class="form-group row">
				<strong for="inputPassword" class="col-sm-2 col-form-label strong-grey">% kgs Tonase</strong>
				<div class="col-sm-2 col-form-label">
					<?php echo $terima[0]->percent_kgs_tonase ?>
				</div>
				<strong for="inputPassword" class="col-sm-2 col-form-label strong-grey">Grm / Pcs</strong>
				<div class="col-sm-2 col-form-label">
					<?php echo $terima[0]->grm_pcs?>
				</div>
				<strong for="inputPassword" class="col-sm-2 col-form-label strong-grey">Uniformity</strong>
				<div class="col-sm-2 col-form-label">
					<?php echo $terima[0]->uniformity?>
				</div>
			</div>
			<div class="form-group row">
				<strong for="inputPassword" class="col-sm-2 col-form-label strong-grey">Suhu Ikan</strong>
				<div class="col-sm-2 col-form-label">
					<?php echo $terima[0]->suhu ?>
				</div>
				<strong for="inputPassword" class="col-sm-2 col-form-label strong-grey">Ket</strong>
				<div class="col-sm-2 col-form-label">
					<?php echo $terima[0]->ket?>
				</div>
			</div>
			<div class="titleform">
				<strong>TENAGA KERJA</strong>
			</div>
			<div class="form-group row">
				<strong for="inputPassword" class="col-sm-2 col-form-label strong-grey">Jumlah Orang</strong>
				<div class="col-sm-2 col-form-label">
					<?php echo $terima[0]->org ?>
				</div>
				<strong for="inputPassword" class="col-sm-2 col-form-label strong-grey">Jumlah Jam</strong>
				<div class="col-sm-2 col-form-label">
					<?php echo $terima[0]->jam?>
				</div>
			</div>
			<div class="titleform row">
				<strong class="col-lg-11 col-form-label" style="padding-left: 0px">DATA PROSES</strong>
				<form action="<?php echo base_url('proses/input') ?>" method="post">
					<input type="hidden" name="nota_pembelian" value="<?php echo $terima[0]->nota_pembelian?>">

				</form>
			</div>
			
			<?php 
			if ($jumlah_data_proses==0) {
				echo '<div class="col-md-12 col-form-label text-center strong-grey"><strong>- Data Tidak Tersedia -</strong></div>';
			}else{?>
				<div>
					<table class="table table-hover table-responsive-lg">
						<thead>
							<tr>
								<th scope="col">No</th>
								<th scope="col">Nota Proses</th>
								<th scope="col">RM Diproses</th>
								<th scope="col"></th>
								<th scope="col"></th>
							</tr>
						</thead>
						<tbody>
							<?php 
							$no = 1;
							foreach($proses as $s){ 
								?>
								<tr>
									<td><?php echo $no++?></td>
									<td><?php echo $s->nota_proses?></td>
									<td><?php echo $s->rm_diproses?></td>
									<td><a href="<?php echo base_url('proses/detail/'.$s->nota_proses) ?>">Detail</a></td>
									<td>
										<button type="button" onclick="location.href='<?php echo base_url("cetak/proses/".$s->nota_proses) ;?>';" class="btn btn-info btn-sm btn-circle"><img src="<?php echo base_url('assets/img/print_button.png')?>"></button>
									</td>		
								</tr>
							<?php } ?>
						</tbody>
					</table>
					<div class="col-lg-12">
						<div class="form-row justify-content-center">
							<div class="form-group col-lg-3 text-center">
								<strong>RM DIPROSES</strong>
								<h4><?php echo $sumproses[0]->rm_diproses?> Kg</h4>
							</div>
						</div>
						<div class="row justify-content-center">
							<div class="form-group col-lg-3 text-center">
								<strong style="color: #454545">Fillet</strong>
								<h3><?php echo $sumproses[0]->fillet ?> Kg</h3>
								<h5 style="color: #454545"><?php echo number_format(($sumproses[0]->fillet/$sumproses[0]->rm_diproses)*100,2)?>%</h5>
							</div>
							<?php
							if($sumproses[0]->trimming_reg!=0){
								?>
								<div class="form-group col-lg-3 text-center">
									<strong style="color: #454545">Trimming Reguler</strong>
									<h3><?php echo $sumproses[0]->trimming_reg?> Kg</h3>
									<h5 style="color: #454545"><?php echo number_format(($sumproses[0]->trimming_reg/$sumproses[0]->rm_diproses)*100,2)?>%</h5>
								</div>
							<?php } ?>
							
							<?php
							if($sumproses[0]->trimming_med!=0){
								?>
								<div class="form-group col-lg-3 text-center">
									<strong style="color: #454545">Trimming Medium</strong>
									<h3><?php echo $sumproses[0]->trimming_med?> Kg</h3>
									<h5 style="color: #454545"><?php echo number_format(($sumproses[0]->trimming_med/$sumproses[0]->rm_diproses)*100,2)?>%</h5>
								</div>
							<?php } ?>
							
							<?php
							if($sumproses[0]->soaking_reg!=0){
								?>
								<div class="form-group col-lg-3 text-center">
									<strong style="color: #454545">Soaking Reguler</strong>
									<h3><?php echo $sumproses[0]->soaking_reg ?> Kg</h3>
									<h5 style="color: #454545"><?php echo number_format((($sumproses[0]->soaking_reg/$sumproses[0]->trimming_reg)-1)*100,2)?>%</h5>
								</div>
							<?php } ?>
							
							<?php
							if($sumproses[0]->soaking_med!=0){
								?>
								<div class="form-group col-lg-3 text-center">
									<strong style="color: #454545">Soaking Medium</strong>
									<h3><?php echo $sumproses[0]->soaking_med ?> Kg</h3>
									<h5 style="color: #454545"><?php echo number_format((($sumproses[0]->soaking_med/$sumproses[0]->trimming_reg)-1)*100,2)?>%</h5>
								</div>
							<?php } ?>
							
							<?php
							if($sumproses[0]->freezing_reg!=0){
								?>
								<div class="form-group col-lg-3 text-center">
									<strong style="color: #454545">Freezing Reg</strong>
									<h3><?php echo $sumproses[0]->freezing_reg?> Kg</h3>
									<h5 style="color: #454545"><?php echo number_format((($sumproses[0]->freezing_reg/($sumproses[0]->soaking_reg))-1)*100,2)?>%</h5>
								</div>
							<?php } ?>
							
							<?php
							if($sumproses[0]->freezing_med!=0){
								?>
								<div class="form-group col-lg-3 text-center">
									<strong style="color: #454545">Freezing Med</strong>
									<h3><?php echo $sumproses[0]->freezing_med?> Kg</h3>
									<h5 style="color: #454545"><?php echo number_format((($sumproses[0]->freezing_med/($sumproses[0]->soaking_med))-1)*100,2)?>%</h5>
								</div>
							<?php } ?>
							

							<?php
							if($sumproses[0]->daging_kuning!=0){
								?>
								<div class="form-group col-lg-3 text-center">
									<strong style="color: #454545">Daging Kuning</strong>
									<h3><?php echo $sumproses[0]->daging_kuning?> Kg</h3>
									<h5 style="color: #454545"><?php echo number_format((($sumproses[0]->daging_kuning/($sumproses[0]->trimming_med+$sumproses[0]->trimming_reg)))*100,2)?>%</h5>
								</div>
							<?php } ?>
						</div>
						
						<div class="subtitleform" >
							<strong class="strong-grey">WASTE</strong>
						</div>
						<div class="form-row justify-content-center">
							<div class="form-group col-lg-3 text-center">
								<strong>LOST</strong>
								<h3 id="totalberat"><?php echo $sumproses[0]->rm_diproses-($sumproses[0]->giling+$sumproses[0]->belly_s+$sumproses[0]->belly_d+$sumproses[0]->d_trimming+$sumproses[0]->kerok+$sumproses[0]->kulit+$sumproses[0]->kepala+$sumproses[0]->limbah_sirip+$sumproses[0]->limbah+$sumproses[0]->trimming_reg+$sumproses[0]->trimming_med)?></h3>
								<h5><?php echo number_format(($sumproses[0]->rm_diproses-($sumproses[0]->giling+$sumproses[0]->belly_s+$sumproses[0]->belly_d+$sumproses[0]->d_trimming+$sumproses[0]->kerok+$sumproses[0]->kulit+$sumproses[0]->kepala+$sumproses[0]->limbah_sirip+$sumproses[0]->limbah+$sumproses[0]->trimming_reg+$sumproses[0]->trimming_med))/$sumproses[0]->rm_diproses,2)*100?>%</h5>
							</div>
						</div>
						<div class="form-group row">
							<strong for="inputPassword" class="col-sm-2 col-form-label strong-grey">D. Giling</strong>
							<div class="col-sm-2 col-form-label">
								<?php echo $sumproses[0]->giling?> Kg
							</div>
							<strong for="inputPassword" class="col-sm-2 col-form-label strong-grey">Belly S</strong>
							<div class="col-sm-2 col-form-label">
								<?php echo $sumproses[0]->belly_s?> Kg
							</div>
							<strong for="inputPassword" class="col-sm-2 col-form-label strong-grey">Belly D</strong>
							<div class="col-sm-2 col-form-label">
								<?php echo $sumproses[0]->belly_d?> Kg
							</div>
							<strong for="inputPassword" class="col-sm-2 col-form-label strong-grey">D Trimming</strong>
							<div class="col-sm-2 col-form-label">
								<?php echo $sumproses[0]->d_trimming?> Kg
							</div>
							<strong for="inputPassword" class="col-sm-2 col-form-label strong-grey">Kerok</strong>
							<div class="col-sm-2 col-form-label">
								<?php echo $sumproses[0]->kerok?> Kg
							</div>
							<strong for="inputPassword" class="col-sm-2 col-form-label strong-grey">Kulit</strong>
							<div class="col-sm-2 col-form-label">
								<?php echo $sumproses[0]->kulit?> Kg
							</div>
							<strong for="inputPassword" class="col-sm-2 col-form-label strong-grey">Kepala</strong>
							<div class="col-sm-2 col-form-label">
								<?php echo $sumproses[0]->kepala?> Kg
							</div>
							<strong for="inputPassword" class="col-sm-2 col-form-label strong-grey">Tulang Giling</strong>
							<div class="col-sm-2 col-form-label">
								<?php echo $sumproses[0]->tulang_giling?> Kg
							</div>
							<strong for="inputPassword" class="col-sm-2 col-form-label strong-grey">Limbah Sirip</strong>
							<div class="col-sm-2 col-form-label">
								<?php echo $sumproses[0]->limbah_sirip?> Kg
							</div>
							<strong for="inputPassword" class="col-sm-2 col-form-label strong-grey">Limbah</strong>
							<div class="col-sm-2 col-form-label">
								<?php echo $sumproses[0]->limbah?> Kg
							</div>
						</div>
						<div class="subtitleform">
							<strong class="strong-grey">TENAGA KERJA</strong>
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
								<td><?php echo $sumproses[0]->tk_harian_org;?></td>
								<td><?php echo $sumproses[0]->tk_harian_jam;?></td>
								<td><?php echo $sumproses[0]->tk_harian_org*$sumproses[0]->tk_harian_jam;?></td>
							</tr>
							<tr>
								<td>Jam</td>
								<td><?php echo $sumproses[0]->tk_jam_org;?></td>
								<td><?php echo $sumproses[0]->tk_jam_jam;?></td>
								<td><?php echo $sumproses[0]->tk_jam_org*$sumproses[0]->tk_jam_jam;?></td>
							</tr>
							<tr>
								<td>Borongan</td>
								<td><?php echo $sumproses[0]->tk_borongan_org;?></td>
								<td><?php echo $sumproses[0]->tk_borongan_jam;?></td>
								<td><?php echo $sumproses[0]->tk_borongan_org*$sumproses[0]->tk_borongan_jam;?></td>
							</tr>
						</table>
						<div class="subtitleform">
							<strong class="strong-grey">PENUNJANG & PEMBANTU PROSES</strong>
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


										<td><?php
										if ($sumproses[0]->es_balok_balok == 0) {
											echo "-";
										}else{
											echo $sumproses[0]->es_balok_balok;
										}
										?></td>
										<td>Rp<?php
										if ($sumproses[0]->es_balok_harsat == 0) {
											echo "11,500";
										}else{
											echo number_format($sumproses[0]->es_balok_harsat,0);
										}
										?></td>
										<td><?php echo $sumproses[0]->es_tube_bag;?></td>
										<td>Rp<?php
										if ($sumproses[0]->es_tube_harsat == 0) {
											echo "11.500";
										}else{
											echo number_format($sumproses[0]->es_tube_harsat,0);
										}
										?></td>
										<td><strong>Rp<?php echo number_format((($sumproses[0]->es_balok_balok*$sumproses[0]->es_balok_harsat)+($sumproses[0]->es_tube_bag*$sumproses[0]->es_tube_harsat))); ?></strong></td>
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
										<td><?php echo $sumproses[0]->additif_kgs;?></td>
										<td>Rp<?php echo number_format($sumproses[0]->additif_harsat);?></td>
										<td><strong>Rp<?php echo number_format($sumproses[0]->additif_kgs*$sumproses[0]->additif_harsat);?></strong></td>
									</tr>
								</table>
							</div>	
						</div>
					</div>
				</div>
			<?php }
			?>

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
<script type="text/javascript">
	function set_modal(url, nama_supplier) {
		document.getElementById("modalHelp").innerHTML = "Apakah Anda yakin menghapus Data Proses - "+ nama_supplier;
		$('#modalDelete').attr('onclick', "location.href='"+ url +"'");
	}
</script>

<!-- <script type="text/javascript">
	$(document).ready(function(){
		var no_nota = $("#no_nota").text();
		var tanggal = $("#tanggal").val();
		var tahun = tanggal.substring(0, 4);
		var bulan = tanggal.substring(5, 7);
		var hari = tanggal.substring(8,10);
		var id = $("#id_supplier").val();
		console.log(tahun);
		console.log(bulan);
		console.log(hari);
		jQuery("h5#no_nota").html(tahun+"."+bulan+"."+hari+"."+id+"."+no_nota);
		jQuery("input#nota_pembelian").val(tahun+"."+bulan+"."+hari+"."+id+"."+no_nota);
		// jQuery("input#nota_pembelian").val("b");
		$("#tanggal, #id_supplier").change(function(){
			var tanggal = $("#tanggal").val();
			var tahun = tanggal.substring(0, 4);
			var bulan = tanggal.substring(5, 7);
			var hari = tanggal.substring(8,10);
			console.log(tahun);
			console.log(bulan);
			console.log(hari);
			var id = $("#id_supplier").val();
			jQuery("h5#no_nota").html(tahun+"."+bulan+"."+hari+"."+id+"."+no_nota);
			jQuery("input#nota_pembelian").val(tahun+"."+bulan+"."+hari+"."+id+"."+no_nota);
			// jQuery("input#nota_pembelian").val("b");
		});
		// $("#id_supplier").change(function(){
		// 	var id = $("#id_supplier").val();
		// 	jQuery("h5#no_nota").html(tahun+"."+bulan+"."+hari+"."+id+"."+no_nota);
		// });


	});
</script>
<script type="text/javascript">
	$(document).ready(function(){
		var berat1 = parseFloat($("#0to600").val());
		var berat2 = parseFloat($("#600to700").val());
		var berat3 = parseFloat($("#700to1200").val());
		var berat4 = parseFloat($("#1200to1400").val());
		var berat5 = parseFloat($("#1400up").val());
		
		if (isNaN(berat1)) {
			berat1=0;
		}
		if (isNaN(berat2)) {
			berat2=0;
		}
		if (isNaN(berat3)) {
			berat3=0;
		}
		if (isNaN(berat4)) {
			berat4=0;
		}
		if (isNaN(berat5)) {
			berat5=0;
		}

		var harga1 = parseFloat($("#harga_0to600").val());
		var harga2 = parseFloat($("#harga_600to700").val());
		var harga3 = parseFloat($("#harga_700to1200").val());
		var harga4 = parseFloat($("#harga_1200to1400").val());
		var harga5 = parseFloat($("#harga_1400up").val());
		
		if (isNaN(harga1)) {
			harga1=0;
		}
		if (isNaN(harga2)) {
			harga2=0;
		}
		if (isNaN(harga3)) {
			harga3=0;
		}
		if (isNaN(harga4)) {
			harga4=0;
		}
		if (isNaN(harga5)) {
			harga5=0;
		}
		
		
		function numberWithCommas(x) {
			return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
		}

		var totalberat = berat1+berat2+berat3+berat4+berat5;
		var totalHarga = (berat1*harga1)+(berat2*harga2)+(berat3*harga3)+(berat4*harga4)+(berat5*harga5);
		var totalHarga = numberWithCommas(totalHarga);
		jQuery("div#totalberat").html(totalberat.toFixed(2)+" Kg");
		jQuery("div#totalharga").html("Rp"+totalHarga);
		console.log(harga1);
		$("#0to600, #600to700, #700to1200, #1200to1400, #1400up, #harga_0to600, #harga_600to700, #harga_700to1200, #harga_1200to1400, #harga_1400up").change(function(){

			var berat1 = parseFloat($("#0to600").val());
			var berat2 = parseFloat($("#600to700").val());
			var berat3 = parseFloat($("#700to1200").val());
			var berat4 = parseFloat($("#1200to1400").val());
			var berat5 = parseFloat($("#1400up").val());
			
			if (isNaN(berat1)) {
				berat1=0;
			}
			if (isNaN(berat2)) {
				berat2=0;
			}
			if (isNaN(berat3)) {
				berat3=0;
			}
			if (isNaN(berat4)) {
				berat4=0;
			}
			if (isNaN(berat5)) {
				berat5=0;
			}

			var harga1 = parseFloat($("#harga_0to600").val());
			var harga2 = parseFloat($("#harga_600to700").val());
			var harga3 = parseFloat($("#harga_700to1200").val());
			var harga4 = parseFloat($("#harga_1200to1400").val());
			var harga5 = parseFloat($("#harga_1400up").val());
			
			if (isNaN(harga1)) {
				harga1=0;
			}
			if (isNaN(harga2)) {
				harga2=0;
			}
			if (isNaN(harga3)) {
				harga3=0;
			}
			if (isNaN(harga4)) {
				harga4=0;
			}
			if (isNaN(harga5)) {
				harga5=0;
			}
			
			
			function numberWithCommas(x) {
				return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".");
			}

			var totalberat = berat1+berat2+berat3+berat4+berat5;
			var totalHarga = (berat1*harga1)+(berat2*harga2)+(berat3*harga3)+(berat4*harga4)+(berat5*harga5);
			var totalHarga = numberWithCommas(totalHarga);
			jQuery("div#totalberat").html(totalberat.toFixed(2)+" Kg");
			jQuery("div#totalharga").html("Rp"+totalHarga);
			console.log(120.1+1121.1);
			
		});
	});
</script> -->
</body>
</html>