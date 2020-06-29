<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="container container-bg-white">
	<div class="row titlepage">
		<div class="col-lg-8">
			<h5 class="">Sunting Data Penerimaan Barang </h5>
		</div>
		<div class="col-lg-4">
			<h5 class="" id="no_nota"><?php echo $no_nota?></h5>
		</div>
	</div>
	<form class="form-padding" action="<?php echo base_url('terima/simpanedit');?>" method="post">
		<div class="form-group row">
			<label for="inputPassword" class="col-sm-2 col-form-label">Tanggal</label>
			<div class="col-sm-3">
				<input type="date" class="form-control" required id="tanggal" name="tanggal" value="<?php echo $terima[0]->tanggal?>">
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-2 form-inline"><strong>Jenis Ikan</strong></div>
			<div class="col-sm-3">
				<select class="custom-select" required id="id_ikan" name="id_ikan">
					<option selected value="">Pilih Jenis Ikan</option>
					<?php 
					foreach($ikan as $s){ 
						if ($s->id_ikan==$terima[0]->id_ikan) {
							echo "<option selected value=".$s->id_ikan.">".$s->nama_ikan."</option>";
						} else{
							echo "<option value=".$s->id_ikan.">".$s->nama_ikan."</option>";
						} 
					} ?>
				</select>
			</div>
		</div>
		<h6 class="titleform" >RM MASUK</h6>
		<div id="dynamicInput">
			<?php
			$i=1;
			foreach ($detail as $d) { ?>
				<div class="form-row" id="row<?php echo $i;?>">
					<div class="form-group col-md-4">
						<label for="inputEmail4">Size</label>
						<select class="custom-select" required id="id_barang[]" name="id_barang[]">
							<option selected value="">Pilih Size</option>
							<?php 
							foreach($barang as $s){ 

								if ($s->id==$d->id_daftar_harga) {
									echo "<option selected value=".$s->id.">".$s->nama_ikan." ".$s->size." - Rp".$s->harga."</option>";
								} else{
									echo "<option value=".$s->id.">".$s->size." - Rp".$s->harga."</option>";
								}

								
							} ?>
						</select>
					</div>
					<div class="form-group col-md-3">
						<label for="inputPassword4">Berat</label>
						<input type="number" step="any" class="form-control" placeholder="Kg" id="berat[]" name="berat[]" value="<?php echo $d->berat?>">
					</div>
					<div class="form-group col-md-4=">
						<div class="col-form-label">
							<button type="button" id="<?php echo $i; ?>"  class="btn btn-danger btn-circle btn_remove">X</button>
						</div>
					</div>
				</div>
				<?php $i++;} ?>
				<!-- <div class="form-row" id="row1">
					<div class="form-group col-md-3">
						<label for="inputEmail4">Size</label>
						<select class="custom-select" required id="id_ikan[]" name="id_ikan[]">
							<option selected value="">Pilih Size</option>
							<?php 
							foreach($barang as $s){ 
								?>
								<option value="<?php echo $s->id?>"><?php echo $s->size." - Rp".$s->harga?></option>
							<?php } ?>
						</select>
					</div>
					<div class="form-group col-md-3">
						<label for="inputPassword4">Berat</label>
						<input type="number" step="any" class="form-control" placeholder="Kg" id="berat[]" name="berat[]">
					</div>
					<div class="form-group col-md-2">
						<label for="inputEmail4">Total Nilai</label>
						<div class="col-form-label">Rp0</div>
					</div>
					<div class="form-group col-md-4=">
						<div class="col-form-label">
							<button type="button"  class="btn btn-danger btn-circle">X</button>
						</div>
					</div>
				</div> -->
			</div>
			<div class="col-md-8 text-right">
				<button type="button" id="addform" class="btn btn-primary btn-circle">+</button>
			</div>
			<h6 class="titleform" >SUPPLIER</h6>
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-3 col-form-label">Supplier</label>
				<div class="col-sm-6">
					<select class="custom-select" required id="id_supplier" name="id_supplier">
						<option value="">Pilih Supplier</option>
						<?php 
						foreach($supplier as $s){ 
							if ($s->id_supplier==$terima[0]->id_supplier) {
								echo "<option selected value="."$s->id_supplier".">"."$s->nama_supplier"."</option>";
							}else{
								echo "<option value="."$s->id_supplier".">"."$s->nama_supplier"."</option>";
							}
						}	 
						?>
					</select>
				</div>
			</div>
			<div class="form-group row">
				<label for="inputPassword" class="col-sm-3 col-form-label">No. Surat Jalan</label>
				<div class="col-sm-6">
					<input type="text" required class="form-control" id="surat_jalan" name="surat_jalan" placeholder="Nomor Surat Jalan" value="<?php echo $terima[0]->surat_jalan ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-3 col-form-label">No. Pol Kendaraan</label>
				<div class="col-sm-6">
					<input type="text"required class="form-control" id="no_pol" name="no_pol" placeholder="Nomor Polisi Kendaraan" value="<?php echo $terima[0]->no_pol ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-3 col-form-label">Petani</label>
				<div class="col-sm-6">
					<input type="text" required class="form-control" id="nama_petani" name="nama_petani" placeholder="Nama Petani" value="<?php echo $terima[0]->nama_petani ?>">
				</div>
			</div>
			<h6 class="titleform">SAMPLING</h6>
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-3 col-form-label">% kgs Tonase</label>
				<div class="col-sm-6">
					<input type="number" step="any" class="form-control" id="percent_kgs_tonase" name="percent_kgs_tonase" placeholder="% kgs" value="<?php echo $terima[0]->percent_kgs_tonase ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="inputPassword" class="col-sm-3 col-form-label">Grm / Pcs</label>
				<div class="col-sm-6">
					<input type="number" step="any" class="form-control" id="grm_pcs" name="grm_pcs" placeholder="" value="<?php echo $terima[0]->grm_pcs ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-3 col-form-label">Uniformity</label>
				<div class="col-sm-6">
					<input type="number" step="any" class="form-control" id="uniformity" name="uniformity" placeholder="" value="<?php echo $terima[0]->uniformity ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-3 col-form-label">Suhu Ikan</label>
				<div class="col-sm-6">
					<input type="number" step="any" class="form-control" id="suhu" name="suhu" placeholder="" value="<?php echo $terima[0]->suhu ?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-3 col-form-label">Keterangan</label>
				<div class="col-sm-6">
					<input type="number" step="any" class="form-control" id="ket" name="ket" placeholder="" value="<?php echo $terima[0]->ket ?>">
				</div>
			</div>
			<h6 class="titleform">TENAGA KERJA</h6>
			<div class="form-group row">
				<label for="staticEmail" class="col-sm-3 col-form-label">Orang</label>
				<div class="col-sm-3">
					<input type="number" required class="form-control" id="org" name="org" placeholder="Jumlah Orang" value="<?php echo $terima[0]->org?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="inputPassword" class="col-sm-3 col-form-label">Jam</label>
				<div class="col-sm-3">
					<input type="number" class="form-control" id="jam" name="jam" placeholder="Jumlah Jam" value="<?php echo $terima[0]->jam?>">
				</div>
			</div>
			<input type="hidden" id="nota_pembelian_awal" name="nota_pembelian_awal" value="<?php echo $terima[0]->nota_pembelian?>">
			<input type="hidden" id="nota_pembelian" name="nota_pembelian">
			<div class="form-group row">
				<div class="col-sm-10"></div>
				<button type="submit" required class="btn btn-primary">Simpan</button>
			</div>			
		</form>
	</div>
</div>
<script src="<?php echo base_url('assets/js/jquery-3.2.1.slim.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/popper.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-4.0.0/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/jquery.1.11.1.min.js')?>"></script>
<script type="text/javascript">
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
</script>
<script type="text/javascript">
	$(document).ready(function(){
		var i = <?php echo $i;?>;
		$("#addform").click(function () {
			i++;
			$("#dynamicInput").append(
				'<div class="form-row" id="row'+i+'"> <div class="form-group col-md-4"> <label for="inputEmail4">Size</label> <select class="custom-select" required id="id_barang'+i+'" name="id_barang[]"> <option selected value="" >Pilih Size</option> <?php foreach($barang as $s){?> <option value="<?php echo $s->id?>"><?php echo $s->nama_ikan." ".$s->size." - Rp".$s->harga?></option> <?php } ?> </select> </div> <div class="form-group col-md-3"> <label for="inputPassword4">Berat</label> <input id="berat[]" name="berat[]" type="number" step="any" class="form-control" placeholder="Kg"> </div> <div class="form-group col-md-4="> <div class="col-form-label"> <button type="button" id="'+i+'" class="btn btn-danger btn-circle btn_remove">X</button> </div> </div> </div>'); });
		$(document).on('click','.btn_remove', function(){
			var button_id = $(this).attr("id");
			$('#row'+button_id+'').remove();
		});
		// $('#submit').click(function(){
		// 	$.ajax({
		// 		url:"<?php echo base_url('terima/insert')?>",
		// 		method:"POST",
		// 		data:$('#form_input').serialize(),
		// 		success:function(data){
		// 			window.location.replace(data);
		// 		}	
		// 	})

		// });
	});
</script>
</body>
</html>