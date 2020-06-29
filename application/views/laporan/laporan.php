<div class="container container-bg-white">
	<div class="row  titlepage">
		<div class="col-lg-9">
			<h5 class="">Laporan</h5>
		</div>
	</div>
	<form>
		<div class="row justify-content-center">
			<div class="col-lg-1"></div>
			<div class="col-lg-2">
				<input type="date" name="tgl_awal" id="tgl_awal" max="<?php echo date('Y-m-d'); ?>" class="form-control form-control-sm">
			</div>
			<div class="col-lg-1"></div>
			<div class="col-lg-2">
				<div class="col-form-label text-center strong-grey"><strong>- Pilih Tanggal -</strong></div>
			</div>
			<div class="col-lg-1"></div>
			<div class="col-lg-2">
				<input type="date" name="tgl_akhir" id="tgl_akhir" max="<?php echo date('Y-m-d'); ?>" class="form-control form-control-sm">
			</div>
			<div class="col-lg-1"></div>
		</div>	
	</form>
	<div id="tes" class="container">
	</div>
</div>
<script src="<?php echo base_url('assets/js/jquery-3.2.1.slim.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/popper.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-4.0.0/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/jquery.1.11.1.min.js')?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#tgl_awal, #tgl_akhir").change(function(){
			var tgl_awal = $("#tgl_awal").val();
			var tgl_akhir = $("#tgl_akhir").val();
			console.log(tgl_awal);
			$.ajax({  
				type: "POST",  
				url: "<?php echo base_url('laporan/getData');?>",  
				data: {tgl_awal: tgl_awal, tgl_akhir: tgl_akhir},  
				cache: false,  
				success: function(result){  
					jQuery("div#tes").html(result);  
					console.log(result);
				}  
			});	  
		});
		// $("#id_supplier").change(function(){
		// 	var id = $("#id_supplier").val();
		// 	jQuery("h5#no_nota").html(tahun+"."+bulan+"."+hari+"."+id+"."+no_nota);
		// });


	});
</script>