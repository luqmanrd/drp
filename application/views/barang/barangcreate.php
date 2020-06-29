<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container container-bg-white">
  <h5 class="titlepage">Tambah Data Harga</h5>
  <div>
    <form action="<?php echo base_url('barang/simpan')?>" method="post">
      <div class="row profil-margin">
        <div class="col-sm-5 col-form-label text-right">
          <strong>Jenis Ikan</strong>
        </div>
        <div class="col-sm-4">
          <select class="custom-select" required id="id_ikan" name="id_ikan">
            <option selected value="">Pilih Jenis Ikan</option>
            <?php 
            foreach($ikan as $s){ 
              ?>
              <option value="<?php echo $s->id_ikan?>"><?php echo $s->nama_ikan?></option>
            <?php } ?>
          </select>
        </div>
      </div>
      <div class="row profil-margin">
        <div class="col-sm-5 col-form-label text-right">
          <strong>Size</strong>
        </div>
        <div class="col-sm-4">
          <input type="text" class="form-control input-padding" required id="size" name="size" value="">
        </div>
      </div>
      <div class="row profil-margin">
        <div class="col-sm-5 col-form-label text-right">
          <strong>Harga</strong>
        </div>
        <div class="col-sm-4">
          <input type="text" class="form-control input-padding" required id="harga" name="harga" value="">
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