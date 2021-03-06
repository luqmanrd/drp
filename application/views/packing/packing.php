<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- end navbar -->
<div class="container container-bg-white">
	<div class="row  titlepage">
		<div class="col-lg-9">
			<h5 class="">Data Packing</h5>
		</div>
		<div class="col-lg-3 text-right">
			<button type="button" class="btn btn-primary btn-sm btn-circle" onclick="location.href='<?php echo base_url('packing/input') ;?>';"><strong><img src="<?php echo base_url('assets/img/plus_button.png')?>"></strong></button>
		</div>
	</div>
	<?php 
	if ($jumlah_packing==0) {
		echo '<div class="col-md-12 col-form-label text-center strong-grey"><strong>- Data Tidak Tersedia -</strong></div>';
	}else{?>
		<div style="padding-left: 2rem; padding-right: 2rem;">
			<table class="table table-hover table-responsive-lg">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Nomor Nota</th>
						<th scope="col"></th>
						<th scope="col"></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = $this->uri->segment('3') + 1;
					foreach($packing as $s){ 
						?>
						<tr>
							<td><?php echo $no++?></td>
							<td><?php echo $s->nota_packing?></td>
							<td class="text-right">
								<a href="<?php echo base_url('packing/detail/'.$s->nota_packing) ?>">Detail</a>
							</td>
							<td class="text-right">
								<button type="button"  onclick="location.href='<?php echo base_url('packing/sunting/'.$s->nota_packing) ?>';" class="btn btn-success btn-sm btn-circle"><img src="<?php echo base_url('assets/img/edit_button.png')?>"></button>
								<button data-toggle="modal" data-target="#myModal" type="button" class="btn btn-danger btn-sm btn-circle" id="delete" onclick="set_modal('<?php echo base_url('packing/hapus/'."$s->nota_packing");?>', '<?php echo $s->nota_packing?>');"><img src="<?php echo base_url('assets/img/delete_button.png')?>"></button>
							</td>		
						</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
		<div class="row">
			<div class="col">
				<!--Tampilkan pagination-->
				<?php echo $pagination; ?>
			</div>
		</div>
	<?php } ?>
</div>
<div id="myModal" class="modal fade" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Hapus</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
				<p id="modalHelp">Apakah Anda yakin menghapus Data Penerimaan - </p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
				<button type="button" class="btn btn-danger" id="modalDelete">Hapus</button>
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
	function set_modal(url, nama_intern) {
		document.getElementById("modalHelp").innerHTML = "Apakah Anda yakin menghapus Data Packing - <strong>"+ nama_intern +"</strong> ?";
		$('#modalDelete').attr('onclick', "location.href='"+ url +"'");
	}
</script>
</body>
</html>