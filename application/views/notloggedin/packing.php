<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- end navbar -->
<div class="container container-bg-white">
	<div class="row  titlepage">
		<div class="col-lg-9">
			<h5 class="">Data Packing</h5>
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
								<a href="<?php echo base_url('notloggedin/packingdetail/'.$s->nota_packing) ?>">Detail</a>
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
	</div>
<?php } ?>
</div>

<script src="<?php echo base_url('assets/js/jquery-3.2.1.slim.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/popper.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-4.0.0/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/jquery.1.11.1.min.js')?>"></script>
</body>
</html>