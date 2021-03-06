<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container container-bg-white">
	<div class="row titlepage">
		<div class="col-lg-8">
			<h5 class="">Sunting Data Packing</h5>
		</div>
		<div class="col-lg-4">
			
		</div>
	</div>
	<form class="form-padding" id="form_input" action="<?php echo base_url('packing/simpanedit') ?>" method="post">
		<div class="form-group row">
			<label for="inputPassword" class="col-sm-3 col-form-label">Nota Packing</label>			
			<div class="col-sm-3">
				<input type="text" readonly name="nota_packing" class="form-control" value="<?php echo $packing[0]->nota_proses?>">


<!-- 				<?php
					if (is_array($nota_pembelian)) {
						echo '<select class="custom-select" required id="nota_pembelian" name="nota_pembelian">
								<option selected value="">Pilih Nota</option>';
						foreach ($nota_pembelian as $s) {
							echo '<option value="'.$s->nota_pembelian.'">'.$s->nota_pembelian.'</option>';
						}
						echo '</select>';
					}else{
						echo '<input type="text" readonly class="form-control" required id="nota_pembelian" name="nota_pembelian" value="'.$nota_pembelian.'">';
					}
					?> -->
			</div>
			</div>
			<h6 class="titleform" >MEDIUM</h6>
			<div id="dynamicInput">
				<div class="form-group row">
					<label class="col-md-1 col-form-label" for="inputEmail4">25%</label>
					<input class="col-md-3 form-control " type="number" step="any"placeholder="Kg" id="med_25" name="med_25" value="<?php echo $packing[0]->med_25?>">
					<div class="col-md-1"></div>
					<label class="col-md-1 col-form-label" for="inputEmail4">30%</label>
					<input class="col-md-3 form-control " type="number" step="any" placeholder="Kg" id="med_35" name="med_30" value="<?php echo $packing[0]->med_30?>">
				</div>
				<div class="form-group row">
					<label class="col-md-1 col-form-label" for="inputEmail4">40%</label>
					<input class="col-md-3 form-control " type="number" step="any" placeholder="Kg" id="med_40" name="med_40" value="<?php echo $packing[0]->med_40?>">
					<div class="col-md-1"></div>
					<label class="col-md-1 col-form-label" for="inputEmail4">50%</label>
					<input class="col-md-3 form-control " type="number" step="any" placeholder="Kg" id="med_50" name="med_50" value="<?php echo $packing[0]->med_50?>">
				</div>			
			</div>
			<h6 class="titleform" >REGULAR</h6>
			<div id="dynamicInput">
				<div class="form-group row">
					<label class="col-md-1 col-form-label" for="inputEmail4">25%</label>
					<input class="col-md-3 form-control " type="number" step="any"placeholder="Kg" id="reg_25" name="reg_25" value="<?php echo $packing[0]->reg_25?>">
					<div class="col-md-1"></div>
					<label class="col-md-1 col-form-label" for="inputEmail4">30%</label>
					<input class="col-md-3 form-control " type="number" step="any" placeholder="Kg" id="reg_30" name="reg_30" value="<?php echo $packing[0]->reg_30?>">
				</div>
				<div class="form-group row">
					<label class="col-md-1 col-form-label" for="inputEmail4">40%</label>
					<input class="col-md-3 form-control " type="number" step="any" placeholder="Kg" id="reg_40" name="reg_40" value="<?php echo $packing[0]->reg_40?>">
					<div class="col-md-1"></div>
					<label class="col-md-1 col-form-label" for="inputEmail4">50%</label>
					<input class="col-md-3 form-control " type="number" step="any" placeholder="Kg" id="reg_50" name="reg_50" value="<?php echo $packing[0]->reg_50?>">
				</div>			
			</div>
			<h6 class="titleform" >BULKPACK</h6>
			<div id="dynamicInput">
				<div class="col-lg-12 col-form-label"><strong style="color : #454545">MEDIUM</strong></div>
				<div class="form-group row">
					<label class="col-md-1 col-form-label" for="inputEmail4">25%</label>
					<input class="col-md-3 form-control " type="number" step="any"placeholder="Kg" id="bulkpack_med_25" name="bulkpack_med_25" value="<?php echo $packing[0]->bulkpack_med_25?>">
					<div class="col-md-1"></div>
					<label class="col-md-1 col-form-label" for="inputEmail4">30%</label>
					<input class="col-md-3 form-control " type="number" step="any" placeholder="Kg" id="bulkpack_med_30" name="bulkpack_med_30" value="<?php echo $packing[0]->bulkpack_med_30?>">
				</div>
				<div class="form-group row">
					<label class="col-md-1 col-form-label" for="inputEmail4">40%</label>
					<input class="col-md-3 form-control " type="number" step="any"placeholder="Kg" id="bulkpack_med_40" name="bulkpack_med_40" value="<?php echo $packing[0]->bulkpack_med_40?>">
					<div class="col-md-1"></div>
					<label class="col-md-1 col-form-label" for="inputEmail4">50%</label>
					<input class="col-md-3 form-control " type="number" step="any" placeholder="Kg" id="bulkpack_med_50" name="bulkpack_med_50" value="<?php echo $packing[0]->bulkpack_med_50?>">
				</div>
				<div class="col-lg-12 col-form-label"><strong style="color : #454545">REGULAR</strong></div>
				<div class="form-group row">
					<label class="col-md-1 col-form-label" for="inputEmail4">25%</label>
					<input class="col-md-3 form-control " type="number" step="any" placeholder="Kg" id="bulkpack_reg_25" name="bulkpack_reg_25" value="<?php echo $packing[0]->bulkpack_med_25?>">
					<div class="col-md-1"></div>
					<label class="col-md-1 col-form-label" for="inputEmail4">30%</label>
					<input class="col-md-3 form-control " type="number" step="any" placeholder="Kg" id="bulkpack_reg_30" name="bulkpack_reg_30" value="<?php echo $packing[0]->bulkpack_med_30?>">
				</div>
				<div class="form-group row">
					<label class="col-md-1 col-form-label" for="inputEmail4">40%</label>
					<input class="col-md-3 form-control " type="number" step="any" placeholder="Kg" id="bulkpack_reg_40" name="bulkpack_reg_40" value="<?php echo $packing[0]->bulkpack_med_40?>">
					<div class="col-md-1"></div>
					<label class="col-md-1 col-form-label" for="inputEmail4">50%</label>
					<input class="col-md-3 form-control " type="number" step="any" placeholder="Kg" id="bulkpack_reg_50" name="bulkpack_reg_50" value="<?php echo $packing[0]->bulkpack_med_50?>">
				</div>			
			</div>
			<h6 class="titleform" >KUNING / 2ND</h6>
			<div id="dynamicInput">
				<div class="col-lg-12 col-form-label"><strong style="color : #454545">REG DAGING KUNING</strong></div>
				<div class="form-group row">
					<label class="col-md-1 col-form-label" for="inputEmail4">25%</label>
					<input class="col-md-3 form-control " type="number" step="any"placeholder="Kg" id="reg_kuning_25" name="reg_kuning_25" value="<?php echo $packing[0]->reg_kuning_25?>">
					<div class="col-md-1"></div>
					<label class="col-md-1 col-form-label" for="inputEmail4">30%</label>
					<input class="col-md-3 form-control " type="number" step="any" placeholder="Kg" id="reg_kuning_30" name="reg_kuning_30" value="<?php echo $packing[0]->reg_kuning_30?>">
				</div>
				<div class="form-group row">
					<label class="col-md-1 col-form-label" for="inputEmail4">40%</label>
					<input class="col-md-3 form-control " type="number" step="any"placeholder="Kg" id="reg_kuning_40" name="reg_kuning_40" value="<?php echo $packing[0]->reg_kuning_40?>">
					<div class="col-md-1"></div>
					<label class="col-md-1 col-form-label" for="inputEmail4">50%</label>
					<input class="col-md-3 form-control " type="number" step="any" placeholder="Kg" id="reg_kuning_50" name="reg_kuning_50" value="<?php echo $packing[0]->reg_kuning_50?>">
				</div>
				<div class="col-lg-12 col-form-label"><strong style="color : #454545">REG 2ND</strong></div>
				<div class="form-group row">
					<label class="col-md-1 col-form-label" for="inputEmail4">25%</label>
					<input class="col-md-3 form-control " type="number" step="any" placeholder="Kg" id="reg_2nd_25" name="reg_2nd_25" value="<?php echo $packing[0]->reg_2nd_25?>">
					<div class="col-md-1"></div>
					<label class="col-md-1 col-form-label" for="inputEmail4">30%</label>
					<input class="col-md-3 form-control " type="number" step="any" placeholder="Kg" id="reg_2nd_30" name="reg_2nd_30" value="<?php echo $packing[0]->reg_2nd_30?>">
				</div>		
				<div class="form-group row">
					<label class="col-md-1 col-form-label" for="inputEmail4">40%</label>
					<input class="col-md-3 form-control " type="number" step="any" placeholder="Kg" id="reg_2nd_40" name="reg_2nd_40" value="<?php echo $packing[0]->reg_2nd_40?>">
					<div class="col-md-1"></div>
					<label class="col-md-1 col-form-label" for="inputEmail4">50%</label>
					<input class="col-md-3 form-control " type="number" step="any" placeholder="Kg" id="reg_2nd_50" name="reg_2nd_50" value="<?php echo $packing[0]->reg_2nd_50?>">
				</div>	
			</div>
			<h6 class="titleform">TENAGA KERJA</h6>
			<div class="form-group row">
				<label for="staticEmail" class="col-md-2 col-form-label">Harian</label>
				<div class="col-md-3">
					<input type="text" class="form-control" id="tk_harian_org" name="tk_harian_org" placeholder="Jumlah Orang" value="<?php echo $packing[0]->tk_harian_org?>"> 
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" id="tk_harian_jam" name="tk_harian_jam" placeholder="Jumlah Jam" value="<?php echo $packing[0]->tk_harian_jam?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="inputPassword" class="col-md-2 col-form-label">Jam</label>
				<div class="col-md-3">
					<input type="text" class="form-control" id="tk_jam_org" name="tk_jam_org" placeholder="Jumlah Orang" value="<?php echo $packing[0]->tk_jam_org?>">
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" id="tk_jam_jam" name="tk_jam_jam" placeholder="Jumlah Jam" value="<?php echo $packing[0]->tk_jam_jam?>"> 
				</div>
			</div>
			<div class="form-group row">
				<label for="inputPassword" class="col-md-2 col-form-label">Borongan</label>
				<div class="col-md-3">
					<input type="text" class="form-control" id="tk_borongan_org" name="tk_borongan_org" placeholder="Jumlah Orang" value="<?php echo $packing[0]->tk_borongan_org?>">
				</div>
				<div class="col-md-3">
					<input type="text" class="form-control" id="tk_borongan_jam" name="tk_borongan_jam" placeholder="Jumlah Jam" value="<?php echo $packing[0]->tk_borongan_jam?>">
				</div>
			</div>
			<h6 class="titleform">PENUNJANG & PEMBANTU PROSES</h6>
			<div class="form-group row">
				<label for="staticEmail" class="col-md-9 col-form-label"><strong>Pemakaian Es</strong></label>
			</div>
			<div class="form-group row">
				<label for="staticEmail" class="col-md-2 col-form-label">Es Balok</label>
				<div class="col-md-3">
					<input type="text" class="form-control" id="es_balok_balok" name="es_balok_balok" placeholder="Kgs" value="<?php echo $packing[0]->es_balok_balok?>">
				</div>
				<div class="col-md-1"></div>
				<div class="col-md-3">
					<input type="text" class="form-control" id="es_balok_harsat" name="es_balok_harsat" placeholder="Harsat" value="<?php echo $packing[0]->es_balok_harsat?>">
				</div>
			</div>
			<div class="form-group row">
				<label for="staticEmail" class="col-md-2 col-form-label">Es Tube</label>
				<div class="col-md-3">
					<input type="text" class="form-control" id="es_tube_bag" name="es_tube_bag" placeholder="Kgs" value="<?php echo $packing[0]->es_tube_bag?>">
				</div>
				<div class="col-md-1"></div>
				<div class="col-md-3">
					<input type="text" class="form-control" id="es_tube_harsat" name="es_tube_harsat" placeholder="Harsat" value="<?php echo $packing[0]->es_tube_harsat?>">
				</div>
			</div>
			<div class="row">
				<div class="col-md-6">
				<div class="form-group row">
					<label for="staticEmail" class="col-md-9 col-form-label"><strong>Plastik</strong></label>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-md-4 col-form-label">Kgs</label>
					<div class="col-md-6">
						<input type="text" class="form-control" id="plastik_kgs" name="plastik_kgs" placeholder="Kgs" value="<?php echo $packing[0]->plastik_kgs?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-md-4 col-form-label">Harga Satuan</label>
					<div class="col-md-6">
						<input type="text" class="form-control" id="plastik_harsat" name="plastik_harsat" placeholder="Harsat" value="<?php echo $packing[0]->plastik_harsat?>">
					</div>
				</div>
			</div>
			<div class="col-md-6">
				<div class="form-group row">
					<label for="staticEmail" class="col-md-3 col-form-label"><strong>MC A-1</strong></label>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-md-4 col-form-label">Kgs</label>
					<div class="col-md-6">
						<input type="text" class="form-control" id="mc_a1_kgs" name="mc_a1_kgs" placeholder="Kgs" value="<?php echo $packing[0]->mc_a1_kgs?>">
					</div>
				</div>
				<div class="form-group row">
					<label for="staticEmail" class="col-md-4 col-form-label">Harga Satuan</label>
					<div class="col-md-6">
						<input type="text" class="form-control" id="mc_a1_harsat" name="mc_a1_harsat" placeholder="Harsat" value="<?php echo $packing[0]->mc_a1_harsat?>">
					</div>
				</div>
			</div>	
			</div>

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