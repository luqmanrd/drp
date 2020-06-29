<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container container-bg-white">
	<div class="row titlepage">
		<div class="col-lg-8">
			<h5 class="">Input Data Penerimaan Barang</h5>
		</div>
		<div class="col-lg-4">
			<h5 class="" id="no_nota"><?php echo $no_nota?></h5>
		</div>
	</div>
	<form class="form-padding" id="form_input" action="<?php echo base_url('terima/insert') ?>" method="post">
		<div class="form-group row">
			<label for="inputPassword" class="col-sm-2 col-form-label">Tanggal</label>
			<div class="col-sm-3">
				<input type="date" class="form-control" required id="tanggal" name="tanggal" value="<?php echo $tgl_skrg?>">
			</div>
			<div class="col-sm-2"></div>
			<div class="col-sm-2 form-inline"><strong>Jenis Ikan</strong></div>
			<div class="col-sm-3">
				<select class="custom-select" required id="id_ikan" name="id_ikan">
					<option selected value="">Pilih Jenis Ikan</option>
					<?php 
					foreach($ikan as $s){ 
						?>
						<option value="<?php echo $s->id_ikan?>"><?php echo $s->nama_ikan?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<h6 class="titleform" >RM MASUK</h6>
		<div id="dynamicInput">
			<div class="form-row" id="row1">
				<div class="form-group col-md-4">
					<label for="inputEmail4">Size</label>
					<select class="custom-select" required id="id_barang[]" name="id_barang[]">
						<option selected value="">Pilih Size</option>
						<?php 
						foreach($barang as $s){ 
							?>
							<option value="<?php echo $s->id?>"><?php echo $s->nama_ikan." ".$s->size." - Rp".$s->harga?></option>
						<?php } ?>
					</select>
				</div>
				<div class="form-group col-md-3">
					<label for="inputPassword4">Berat</label>
					<input type="number" required step="any" class="form-control" placeholder="Kg" id="berat[]" name="berat[]">
				</div>
				<div class="form-group col-md-2">
				</div>
				<div class="form-group col-md-4">
					<div class="col-form-label">
						<!-- <button type="button"  class="btn btn-danger btn-circle">X</button> -->
					</div>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-md-7"></div>
			<div class="col-md-1 text-left">
				<button type="button" id="addform" class="btn btn-primary btn-circle">+</button>
			</div>
		</div>
		<h6 class="titleform" >SUPPLIER</h6>
		<div class="form-group row" >
			<label for="staticEmail" class="col-sm-3 col-form-label">Supplier</label>
			<div class="col-sm-6">
				<select class="custom-select" required id="id_supplier" name="id_supplier">
					<option selected value="">Pilih Supplier</option>
					<?php 
					foreach($supplier as $s){ 
						?>
						<option value="<?php echo $s->id_supplier?>"><?php echo $s->nama_supplier?></option>
					<?php } ?>
				</select>
			</div>
		</div>
		<div class="form-group row">
			<label for="inputPassword" class="col-sm-3 col-form-label">No. Surat Jalan</label>
			<div class="col-sm-6">
				<input type="text" required class="form-control" id="surat_jalan" name="surat_jalan" placeholder="Nomor Surat Jalan">
			</div>
		</div>
		<div class="form-group row">
			<label for="staticEmail" class="col-sm-3 col-form-label">No. Pol Kendaraan</label>
			<div class="col-sm-6">
				<input type="text"required class="form-control" id="no_pol" name="no_pol" placeholder="Nomor Polisi Kendaraan">
			</div>
		</div>
		<div class="form-group row">
			<label for="staticEmail" class="col-sm-3 col-form-label">Petani</label>
			<div class="col-sm-6">
				<input type="text" required class="form-control" id="nama_petani" name="nama_petani" placeholder="Nama Petani">
			</div>
		</div>
		<h6 class="titleform">SAMPLING</h6>
		<div class="form-group row">
			<label for="staticEmail" class="col-sm-3 col-form-label">% kgs Tonase</label>
			<div class="col-sm-6">
				<input type="number" step="any" class="form-control" id="percent_kgs_tonase" name="percent_kgs_tonase" placeholder="% kgs">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputPassword" class="col-sm-3 col-form-label">Grm / Pcs</label>
			<div class="col-sm-6">
				<input type="number" step="any" class="form-control" id="grm_pcs" name="grm_pcs" placeholder="">
			</div>
		</div>
		<div class="form-group row">
			<label for="staticEmail" class="col-sm-3 col-form-label">Uniformity</label>
			<div class="col-sm-6">
				<input type="number" step="any" class="form-control" id="uniformity" name="uniformity" placeholder="">
			</div>
		</div>
		<div class="form-group row">
			<label for="staticEmail" class="col-sm-3 col-form-label">Suhu Ikan</label>
			<div class="col-sm-6">
				<input type="number" step="any" class="form-control" id="suhu" name="suhu" placeholder="">
			</div>
		</div>
		<div class="form-group row">
			<label for="staticEmail" class="col-sm-3 col-form-label">Keterangan</label>
			<div class="col-sm-6">
				<input type="number" step="any" class="form-control" id="ket" name="ket" placeholder="">
			</div>
		</div>
		<h6 class="titleform">TENAGA KERJA</h6>
		<div class="form-group row">
			<label for="staticEmail" class="col-sm-3 col-form-label">Orang</label>
			<div class="col-sm-3">
				<input type="number" required class="form-control" id="org" name="org" placeholder="Jumlah Orang">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputPassword" class="col-sm-3 col-form-label">Jam</label>
			<div class="col-sm-3">
				<input type="number" class="form-control" id="jam" name="jam" placeholder="Jumlah Jam">
			</div>
		</div>
		<input type="hidden" id="nota_pembelian" name="nota_pembelian" value="a">
		<div class="form-group row">
			<div class="col-sm-10"></div>
			<button type="submit" id="submit" required class="btn btn-primary">Simpan</button>
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
		var i = 1;
		$("#addform").click(function () {
			i++;
			$("#dynamicInput").append(
				'<div class="form-row" id="row'+i+'" > <div class="form-group col-md-4"> <label for="inputEmail4">Size</label> <select class="custom-select" required id="id_barang'+i+'" name="id_barang[]"> <option selected value="" >Pilih Size</option> <?php foreach($barang as $s){?> <option value="<?php echo $s->id?>"><?php echo $s->nama_ikan." ".$s->size." - Rp".$s->harga?></option> <?php } ?> </select> </div> <div class="form-group col-md-3"> <label for="inputPassword4">Berat</label> <input id="berat[]" required name="berat[]" type="number" step="any" class="form-control" placeholder="Kg"> </div> <div class="form-group col-md-1 text-right"> <div class="col-form-label form-inline"> <button type="button" id="'+i+'" class="btn btn-danger btn-circle btn_remove">X</button> </div> </div> </div>'); });
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