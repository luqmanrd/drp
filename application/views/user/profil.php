<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container container-bg-white">
	<h5 class="titlepage">Profil - <?php echo $this->session->userdata("fullname"); ?></h5>
	<div class="row profil-margin">
		<div class="col-sm-5 text-right">
			<strong>Nama</strong>
		</div>
		<div class="col-sm-7"><?php echo $this->session->userdata("fullname"); ?></div>
	</div>
	<div class="row profil-margin">
		<div class="col-sm-5 text-right">
			<strong>Username</strong>
		</div>
		<div class="col-sm-7"><?php echo $this->session->userdata("username"); ?></div>
	</div>
	<div class="row profil-margin">
		<div class="col-sm-5 text-right">
			<strong>Tanggal Lahir</strong>
		</div>
		<div class="col-sm-7"><?php echo $this->session->userdata("tgl_lahir"); ?></div>
	</div>
	<div class="row profil-margin">
		<div class="col-sm-5 text-right">
			<strong>Jabatan</strong>
		</div>
		<div class="col-sm-7"><?php echo $this->session->userdata("jabatan"); ?></div>
	</div>
	<div class="row profil-margin">
		<div class="col-sm-5 text-right">
			<strong>Alamat</strong>
		</div>
		<div class="col-sm-7"><?php echo $this->session->userdata("alamat"); ?></div>
	</div>
	<div class="row profil-margin">
		<div class="col-sm-5 text-right">
			<strong>Nomor Telepon</strong>
		</div>
		<div class="col-sm-7"><?php echo $this->session->userdata("no_telp"); ?></div>
	</div>
	<div class="row profil-margin">
		<div class="col-sm-5 text-right">
		</div>
		<div class="col-sm-7">
			<button type="button" class="btn btn-sm btn-primary bg-blue" onclick="window.location='<?php echo base_url('profil/pengaturan');?>'">Sunting</button>
		</div>
	</div>
</div>
<script src="<?php echo base_url('assets/js/jquery-3.2.1.slim.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/popper.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-4.0.0/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/jquery.1.11.1.min.js')?>"></script>
</body>
</html>
