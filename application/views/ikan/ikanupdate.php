<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container container-bg-white">
  <h5 class="titlepage">Sunting Data intern - <?php echo $ikan[0]->nama_ikan; ?></h5>
  <div>
    <form action="<?php echo base_url('ikan/simpanedit')?>" method="post">
      <div class="row profil-margin">
        <div class="col-sm-5 col-form-label text-right">
          <strong>ID intern</strong>
        </div>
        <div class="col-sm-4">
          <input type="text" class="form-control input-padding" readonly="true" id="id_ikan" name="id_ikan" value="<?php echo $ikan[0]->id_ikan; ?>">
        </div>
      </div>
      <div class="row profil-margin">
        <div class="col-sm-5 col-form-label text-right">
          <strong>Nama intern</strong>
        </div>
        <div class="col-sm-4">
          <input type="text" class="form-control input-padding" required id="nama_ikan" name="nama_ikan" value="<?php echo $ikan[0]->nama_ikan; ?>">
        </div>
      </div>
      <div class="row profil-margin">
        <div class="col-sm-5 text-right">
        </div>
        <div class="col-sm-7">
          <button type="submit" class="btn btn-sm btn-primary bg-blue">Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>  
<script src="<?php echo base_url('assets/js/jquery-3.2.1.slim.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/popper.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-4.0.0/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/jquery.1.11.1.min.js')?>"></script>
</body>
</html>