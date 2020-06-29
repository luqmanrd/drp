<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$this->session->set_userdata('referred_from', current_url());
?>
<!-- end navbar -->
<div class="container container-bg-white">
	<div class="row  titlepage">
		<div class="col-lg-9">
			<h5 class="">Data Proses</h5>
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
					$no = $this->uri->segment('3') + 1;
					foreach($proses as $s){ 
						?>
						<tr>
							<td><?php echo $no++?></td>
							<td><?php echo $s->nota_pembelian?></td>
							<td><?php echo $s->nota_proses?></td>
							<td><?php echo $s->rm_diproses?></td>
							<td><a href="<?php echo base_url('notloggedin/prosesdetail/'.$s->nota_proses) ?>">Detail</a></td>
							<td class="text-right">
								<button type="button" onclick="location.href='<?php echo base_url("cetak/proses/".$s->nota_proses) ;?>';" class="btn btn-info btn-sm btn-circle"><img src="<?php echo base_url('assets/img/print_button.png')?>"></button>
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

</div>

<script src="<?php echo base_url('assets/js/jquery-3.2.1.slim.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/popper.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-4.0.0/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/jquery.1.11.1.min.js')?>"></script>
</body>
</html>