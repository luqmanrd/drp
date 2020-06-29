<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container container-bg-white">
	<div class="row  titlepage">
		<div class="col-lg-10">
			<h5 class="">Data Penerimaan Barang</h5>
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
							<a href="<?php echo base_url('notloggedin/penerimaandetail/'.$s->nota_pembelian) ?>">Detail</a>
						</td>
						<td class="text-right">
							<button class="btn btn-info btn-circle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								<img src="<?php echo base_url('assets/img/print_button.png')?>">
							</button>
							<div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
								<a class="dropdown-item" href="<?php echo base_url('cetak/pembelian/'.$s->nota_pembelian) ?>">Nota Pembelian</a>
								<a class="dropdown-item" href="<?php echo base_url('cetak/penerimaan/'.$s->nota_pembelian) ?>">Nota Terima Barang</a>
							</div>
						</td>		
					</tr>
				<?php } ?>
			</tbody>
		</table>
	</div>
	<div class="col-lg-12 text-right">
		<a href="<?php echo base_url('notloggedin/terima')?>"><strong>Selengkapanya </strong>>>></a>
	</div>
<?php } ?>
</div>

<div class="container container-bg-white" style="margin-top: 20px">
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
				$no = 1;
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
	<div class="col-lg-12 text-right">
		<a href="<?php echo base_url('notloggedin/proses')?>"><strong>Selengkapanya </strong>>>></a>
	</div>
<?php } ?>
</div>
<div class="container container-bg-white" style="margin-top: 20px">
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
				$no = 1;
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
	<div class="col-lg-12 text-right">
		<a href="<?php echo base_url('notloggedin/packing')?>"><strong>Selengkapanya </strong>>>></a>
	</div>
<?php } ?>
</div>
<script src="<?php echo base_url('assets/js/jquery-3.2.1.slim.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/popper.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-4.0.0/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/jquery.1.11.1.min.js')?>"></script>