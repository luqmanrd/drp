<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container container-bg-white">
	<div class="row titlepage">
		<div class="col-lg-8">
			<h5 class="">Input Data Proses</h5>
		</div>
		<div class="col-lg-4">
			<div class="" >Nota : <strong id="no_nota"><?php echo $no_nota?></strong></div>
		</div>
	</div>
	<form class="form-padding" id="form_input" action="<?php echo base_url('proses/simpanedit') ?>" method="post">
		<div class="form-group row">
			<label for="inputPassword" class="col-sm-3 col-form-label">Nota Penerimaan Barang</label>			
			<div class="col-sm-3">
				<input type="text" readonly class="form-control" required id="nota_pembelian" name="nota_pembelian" value="<?php echo $proses[0]->nota_pembelian?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputPassword" class="col-sm-3 col-form-label">Tanggal</label>
			<div class="col-sm-3">
				<input type="date" class="form-control" required id="tanggal" name="tanggal" value="<?php echo $proses[0]->tanggal?>">
			</div>
			<div class="col-sm-1 form-inline"><strong>Intern</strong></div>
			<div class="col-sm-4">
				<select class="custom-select" required id="id_intern" name="id_intern">
					<option value="">Pilih Jenis Intern</option>
					<?php 
					foreach($intern as $s){ 
							if ($proses[0]->id_intern==$s->id_intern) {
										echo "<option selected value=".$s->id_intern.">".$s->nama_intern."</option>";
									} else{
										echo "<option value=".$s->id_intern.">".$s->nama_intern."</option>";
									}}
							?>
				</select>
			</div>
			<div class="col-sm-1"></div>
		</div>
		<h6 class="titleform" >PROSES</h6>
		<div id="dynamicInput">
			<div class="form-group row" id="row1">
				<label class="col-md-3 col-form-label" for="inputEmail4"><strong>RM DIPROSES</strong></label>
				<input class="col-md-2 form-control " type="number" step="any" placeholder="Kg" id="rm_diproses" name="rm_diproses" value="<?php echo $proses[0]->rm_diproses?>" required>
				<input type="hidden" name="rm_diproses_awal" value="<?php echo $proses[0]->rm_diproses?>">
			</div>
			<div class="form-group row">
				<label class="col-md-3 col-form-label" for="inputEmail4">Fillet</label>
				<input class="col-md-2 form-control " type="number" step="any"placeholder="Kg" id="fillet" name="fillet" value="<?php echo $proses[0]->fillet?>" required>
				<div class="col-md-1"></div>
				<label class="col-md-3 col-form-label" for="inputEmail4">Trimming Reguler</label>
				<input class="col-md-2 form-control " type="number" step="any" placeholder="Kg" id="trimming_reg" name="trimming_reg" value="<?php echo $proses[0]->trimming_reg?>" required>
			</div>
			<div class="form-group row">
				<label class="col-md-3 col-form-label" for="inputEmail4">Soaking Reguler</label>
				<input class="col-md-2 form-control " type="number" step="any" placeholder="Kg" id="soaking_reg" name="soaking_reg" value="<?php echo $proses[0]->soaking_reg?>" required>
				<div class="col-md-1"></div>
				<label class="col-md-3 col-form-label" for="inputEmail4">Trimming Medium</label>
				<input class="col-md-2 form-control " type="number" step="any" placeholder="Kg" id="trimming_med" name="trimming_med" value="<?php echo $proses[0]->trimming_med?>" required>
			</div>
			<div class="form-group row">
				<label class="col-md-3 col-form-label" for="inputEmail4">Soaking Medium</label>
				<input class="col-md-2 form-control " type="number" step="any" placeholder="Kg" id="soaking_med" name="soaking_med" value="<?php echo $proses[0]->soaking_med?>" required>
				<div class="col-md-1"></div>
				<label class="col-md-3 col-form-label" for="inputEmail4">Freezing Reg</label>
				<input class="col-md-2 form-control " type="number" step="any" placeholder="Kg" id="freezing_reg" name="freezing_reg" value="<?php echo $proses[0]->freezing_reg?>" required>
			</div>			
			<div class="form-group row">
				<label class="col-md-3 col-form-label" for="inputEmail4">Freezing Med</label>
				<input class="col-md-2 form-control " type="number" step="any" placeholder="Kg" id="freezing_med" name="freezing_med" value="<?php echo $proses[0]->freezing_med?>" required>
				<div class="col-md-1"></div>
				<label class="col-md-3 col-form-label" for="inputEmail4">Daging Kuning</label>
				<input class="col-md-2 form-control " type="number" step="any" placeholder="Kg" id="daging_kuning" name="daging_kuning" value="<?php echo $proses[0]->daging_kuning?>" required>
			</div>
		</div>
		
		<h6 class="titleform">WASTE</h6>
		<div id="dynamicInput">
			<div class="form-group row" id="row1">
				<label class="col-md-3 col-form-label" for="inputEmail4">Daging Giling</label>
				<input class="col-md-2 form-control " type="number" step="any"  placeholder="Kg" id="giling" name="giling" value="<?php echo $proses[0]->giling?>">
				<div class="col-md-1"></div>
				<label class="col-md-3 col-form-label" for="inputEmail4">Belly Sirip</label>
				<input class="col-md-2 form-control " type="number" step="any"  placeholder="Kg" id="belly_s" name="belly_s" value="<?php echo $proses[0]->belly_s?>">
			</div>
			<div class="form-group row">
				<label class="col-md-3 col-form-label" for="inputEmail4">Belly Daging</label>
				<input class="col-md-2 form-control " type="number" step="any"  placeholder="Kg" id="belly_d" name="belly_d" value="<?php echo $proses[0]->belly_d?>">
				<div class="col-md-1"></div>
				<label class="col-md-3 col-form-label" for="inputEmail4">Daging Trimming</label>
				<input class="col-md-2 form-control " type="number" step="any"  placeholder="Kg" id="d_trimming" name="d_trimming" value="<?php echo $proses[0]->d_trimming?>">
			</div>
			<div class="form-group row">
				<label class="col-md-3 col-form-label" for="inputEmail4">Daging Kerok</label>
				<input class="col-md-2 form-control " type="number" step="any"  placeholder="Kg" id="kerok" name="kerok" value="<?php echo $proses[0]->kerok?>">
				<div class="col-md-1"></div>
				<label class="col-md-3 col-form-label" for="inputEmail4">Kulit</label>
				<input class="col-md-2 form-control " type="number" step="any"  placeholder="Kg" id="kulit" name="kulit" value="<?php echo $proses[0]->kulit?>">
			</div>
			<div class="form-group row">
				<label class="col-md-3 col-form-label" for="inputEmail4">Kepala</label>
				<input class="col-md-2 form-control " type="number" step="any"  placeholder="Kg" id="kepala" name="kepala" value="<?php echo $proses[0]->kepala?>">
				<div class="col-md-1"></div>
				<label class="col-md-3 col-form-label" for="inputEmail4">Tulang Giling</label>
				<input class="col-md-2 form-control " type="number" step="any"  placeholder="Kg" id="tulang_giling" name="limbah_sirip" value="<?php echo $proses[0]->tulang_giling?>">
			</div>
			<div class="form-group row">
				<label class="col-md-3 col-form-label" for="inputEmail4">Limbah Sirip</label>
				<input class="col-md-2 form-control " type="number" step="any"  placeholder="Kg" id="limbah_sirip" name="limbah_sirip" value="<?php echo $proses[0]->limbah_sirip?>">
				<div class="col-md-1"></div>
				<label class="col-md-3 col-form-label" for="inputEmail4">Limbah</label>
				<input class="col-md-2 form-control " type="number" step="any"  placeholder="Kg" id="limbah" name="limbah"value="<?php echo $proses[0]->limbah?>">
			</div>			
		</div>
		<h6 class="titleform">TENAGA KERJA</h6>
		<div class="form-group row">
			<label for="staticEmail" class="col-md-3 col-form-label">Harian</label>
			<div class="col-md-3">
				<input type="text" class="form-control" id="tk_harian_org" name="tk_harian_org" placeholder="Jumlah Orang" value="<?php echo $proses[0]->tk_harian_org?>">
			</div>
			<div class="col-md-3">
				<input type="text" class="form-control" id="tk_harian_jam" name="tk_harian_jam" placeholder="Jumlah Jam" value="<?php echo $proses[0]->tk_harian_jam?>" >
			</div>
		</div>
		<div class="form-group row">
			<label for="inputPassword" class="col-md-3 col-form-label">Jam</label>
			<div class="col-md-3">
				<input type="text" class="form-control" id="tk_jam_org" name="tk_jam_org" placeholder="Jumlah Orang" value="<?php echo $proses[0]->tk_jam_org?>">
			</div>
			<div class="col-md-3">
				<input type="text" class="form-control" id="tk_jam_jam" name="tk_jam_jam" placeholder="Jumlah Jam" value="<?php echo $proses[0]->tk_jam_jam?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="inputPassword" class="col-md-3 col-form-label">Borongan</label>
			<div class="col-md-3">
				<input type="text" class="form-control" id="tk_borongan_org" name="tk_borongan_org" placeholder="Jumlah Orang" value="<?php echo $proses[0]->tk_borongan_org?>">
			</div>
			<div class="col-md-3">
				<input type="text" class="form-control" id="tk_borongan_jam" name="tk_borongan_jam" placeholder="Jumlah Jam" value="<?php echo $proses[0]->tk_borongan_jam?>">
			</div>
		</div>
		<h6 class="titleform">PENUNJANG & PEMBANTU PROSES</h6>
		<div class="form-group row">
			<label for="staticEmail" class="col-md-9 col-form-label"><strong>Pemakaian Es</strong></label>
		</div>
		<div class="form-group row">
			<label for="staticEmail" class="col-md-3 col-form-label">Es Balok</label>
			<div class="col-md-3">
				<input type="text" class="form-control" id="es_balok_balok" name="es_balok_balok" placeholder="Kgs" value="<?php echo $proses[0]->es_balok_balok?>">
			</div>
			<div class="col-md-3">
				<input type="text" class="form-control" id="es_balok_harsat" name="es_balok_harsat" placeholder="Harsat" value="<?php echo $proses[0]->es_balok_harsat?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="staticEmail" class="col-md-3 col-form-label">Es Tube</label>
			<div class="col-md-3">
				<input type="text" class="form-control" id="es_tube_bag" name="es_tube_bag" placeholder="Kgs" value="<?php echo $proses[0]->es_tube_bag?>">
			</div>
			<div class="col-md-3">
				<input type="text" class="form-control" id="es_tube_harsat" name="es_tube_harsat" placeholder="Harsat" value="<?php echo $proses[0]->es_tube_harsat?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="staticEmail" class="col-md-9 col-form-label"><strong>Additif (Qualimax Garam)</strong></label>
		</div>
		<div class="form-group row">
			<label for="staticEmail" class="col-md-3 col-form-label">Kgs</label>
			<div class="col-md-3">
				<input type="text" class="form-control" id="additif_kgs" name="additif_kgs" placeholder="Kgs" value="<?php echo $proses[0]->additif_kgs?>">
			</div>
		</div>
		<div class="form-group row">
			<label for="staticEmail" class="col-md-3 col-form-label">Harsat</label>
			<div class="col-md-3">
				<input type="text" class="form-control" id="additif_harsat" name="additif_harsat" placeholder="Harsat" value="<?php echo $proses[0]->additif_harsat?>">
			</div>
		</div>
		<input type="hidden" id="nota_proses_awal" name="nota_proses_awal" value="<?php echo $proses[0]->nota_proses?>">
		<input type="hidden" id="nota_proses" name="nota_proses" value="a">
		<div class="form-group row">
			<div class="col-sm-10"></div>
			<button type="submit" id="submit" class="btn btn-primary">Simpan</button>
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
		var id = $("#id_intern").val();
		console.log(tahun);
		console.log(bulan);
		console.log(hari);
		jQuery("strong#no_nota").html(tahun+"."+bulan+"."+hari+"."+id+"."+no_nota);
		jQuery("input#nota_proses").val(tahun+"."+bulan+"."+hari+"."+id+"."+no_nota);
		// jQuery("input#nota_pembelian").val("b");
		$("#tanggal, #id_intern").change(function(){
			var tanggal = $("#tanggal").val();
			var tahun = tanggal.substring(0, 4);
			var bulan = tanggal.substring(5, 7);
			var hari = tanggal.substring(8,10);
			console.log(tahun);
			console.log(bulan);
			console.log(hari);
			var id = $("#id_intern").val();
			jQuery("strong#no_nota").html(tahun+"."+bulan+"."+hari+"."+id+"."+no_nota);
			jQuery("input#nota_proses").val(tahun+"."+bulan+"."+hari+"."+id+"."+no_nota);
			// jQuery("input#nota_pembelian").val("b");
		});
		// $("#id_supplier").change(function(){
		// 	var id = $("#id_supplier").val();
		// 	jQuery("h5#no_nota").html(tahun+"."+bulan+"."+hari+"."+id+"."+no_nota);
		// });


	});
</script>
</body>
</html>