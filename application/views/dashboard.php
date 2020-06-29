<?php
defined('BASEPATH') OR exit('No direct script access allowed');
$this->session->set_userdata('referred_from', current_url());
?>
<div class="container container-bg-white">
	<div class="row  titlepage">
		<div class="col-lg-10">
			<h5 class="">Data Penerimaan Barang</h5>
		</div>
		<div class="col-lg-2 text-right">
			<button type="button" class="btn btn-primary btn-sm btn-circle" onclick="location.href='<?php echo base_url('terima/input') ;?>';"><img src="<?php echo base_url('assets/img/plus_button.png')?>"></button>
		</div>
	</div>
	<?php 
	if ($jumlah_terima==0) {
		echo '<div class="col-md-12 col-form-label text-center strong-grey"><strong>- Data Tidak Tersedia -</strong></div>';
	}else{?>
		<div style="padding-left: 2rem; padding-right: 2rem;">
			<table class="table table-hover table-responsive-lg">
				<thead>
					<tr>
						<th scope="col">No</th>
						<th scope="col">Nomor Nota</th>
						<th scope="col">Tanggal</th>
						<th scope="col">Supplier</th>
						<th scope="col">Total Berat</th>
						<th scope="col"></th>
						<th scope="col"></th>
					</tr>
				</thead>
				<tbody>
					<?php 
					$no = 1;
					foreach($terima as $s){ 
						?>
						<tr>
							<td><?php echo $no++?></td>
							<td><?php echo $s->nota_pembelian?></td>
							<td><?php echo $s->tanggal?></td>
							<td><?php echo $s->nama_supplier?></td>
							<td><?php echo $s->totalberat?></td>
							<td>
								<a href="<?php echo base_url('terima/detail/'.$s->nota_pembelian) ?>">Detail</a>
							</td>
							<td class="text-right">
								<button class="btn btn-info btn-circle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
									<img src="<?php echo base_url('assets/img/print_button.png')?>">
								</button>
								<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
									<a class="dropdown-item" href="<?php echo base_url('cetak/pembelian/'.$s->nota_pembelian) ?>">Nota Pembelian</a>
									<a class="dropdown-item" href="<?php echo base_url('cetak/penerimaan/'.$s->nota_pembelian) ?>">Nota Terima Barang</a>
								</div>
								<button type="button"  onclick="location.href='<?php echo base_url('terima/sunting/'.$s->nota_pembelian) ?>';" class="btn btn-success btn-sm btn-circle"><img src="<?php echo base_url('assets/img/edit_button.png')?>"></button>
								<button data-toggle="modal" data-target="#myModal" type="button" class="btn btn-danger btn-sm btn-circle" id="delete" onclick="set_modal('<?php echo base_url('terima/hapus/'."$s->nota_pembelian");?>', 'Data Penerimaan <strong> - <?php echo $s->nota_pembelian?>');"><img src="<?php echo base_url('assets/img/delete_button.png')?>"></button>
								</td>		
							</tr>
						<?php } ?>
					</tbody>
				</table>
			</div>
			<div class="col-lg-12 text-right">
				<a href="<?php echo base_url('terima')?>"><strong>Selengkapanya </strong>>>></a>
			</div>
		<?php } ?>
	</div>

	<div class="container container-bg-white" style="margin-top: 20px">
		<div class="row  titlepage">
			<div class="col-lg-9">
				<h5 class="">Data Proses</h5>
			</div>
			<div class="col-lg-3 text-right">
				<button type="button" class="btn btn-primary btn-sm btn-circle" onclick="location.href='<?php echo base_url('proses/input') ;?>';"><img src="<?php echo base_url('assets/img/plus_button.png')?>"></button>
			</div>
		</div>
		<?php 
		if ($jumlah_proses==0) {
			echo '<div class="col-md-12 col-form-label text-center strong-grey"><strong>- Data Tidak Tersedia -</strong></div>';
		}else{?>
			<div style="padding-left: 2rem; padding-right: 2rem;">
				<table class="table table-hover table-responsive-lg">
					<thead>
						<tr>
							<th scope="col">No</th>
							<th scope="col">Nota Pembelian</th>
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
								<td><?php echo $s->nota_pembelian?></td>
								<td><?php echo $s->nota_proses?></td>
								<td><?php echo $s->rm_diproses?></td>
								<td><a href="<?php echo base_url('proses/detail/'.$s->nota_proses) ?>">Detail</a></td>
								<td class="text-right">
									<button type="button" onclick="location.href='<?php echo base_url("cetak/proses/".$s->nota_proses) ;?>';" class="btn btn-info btn-sm btn-circle"><img src="<?php echo base_url('assets/img/print_button.png')?>"></button>
									<button type="button" onclick="location.href='<?php echo base_url('proses/sunting/'."$s->nota_proses") ;?>';" class="btn btn-success btn-sm btn-circle"><img src="<?php echo base_url('assets/img/edit_button.png')?>"></button>
									<button data-toggle="modal" data-target="#myModal" type="button" class="btn btn-danger btn-sm btn-circle" id="delete" onclick="set_modal('<?php echo base_url('proses/hapus/'."$s->nota_proses");?>', 'Data Proses <strong> - <?php echo $s->nota_proses?>');"><img src="<?php echo base_url('assets/img/delete_button.png')?>"></button>
									</td>		
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
				<div class="col-lg-12 text-right">
					<a href="<?php echo base_url('proses')?>"><strong>Selengkapanya </strong>>>></a>
				</div>
			<?php } ?>
		</div>
		<div class="container container-bg-white" style="margin-top: 20px">
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
							$no = 1;
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
										<button data-toggle="modal" data-target="#myModal" type="button" class="btn btn-danger btn-sm btn-circle" id="delete" onclick="set_modal('<?php echo base_url('packing/hapus/'."$s->nota_packing");?>', 'Data Packing <strong> - <?php echo $s->nota_packing?>');"><img src="<?php echo base_url('assets/img/delete_button.png')?>"></button>
										</td>
									</tr>
								<?php } ?>
							</tbody>
						</table>
					</div>
					<div class="col-lg-12 text-right">
						<a href="<?php echo base_url('/packing')?>"><strong>Selengkapanya </strong>>>></a>
					</div>
				<?php } ?>

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
								<p id="modalHelp"></p>
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
					document.getElementById("modalHelp").innerHTML = "Apakah Anda yakin menghapus "+ nama_intern +"</strong> ?";
					$('#modalDelete').attr('onclick', "location.href='"+ url +"'");
				}
			</script>