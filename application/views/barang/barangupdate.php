<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container container-bg-white">
  <h5 class="titlepage">Sunting Data Harga</h5>
  <div>
    <form action="<?php echo base_url('barang/simpanedit')?>" method="post">
      <div class="row profil-margin">
        <div class="col-sm-5 col-form-label text-right">
          <strong>Jenis Ikan</strong>
        </div>
        <div class="col-sm-4">
          <select class="custom-select" required id="id_ikan" name="id_ikan">
            <option value="">Pilih Jenis Ikan</option>
            <?php 
            foreach($ikan as $s){ 
              
              if ($s->id_ikan==$barang[0]->id_ikan) {
                echo "<option selected value="."$s->id_ikan".">"."$s->nama_ikan"."</option>";
              }else{
                echo "<option value="."$s->id_ikan".">"."$s->nama_ikan"."</option>";
              }
            } ?>
          </select>
        </div>
      </div>
      <div class="row profil-margin">
        <div class="col-sm-5 col-form-label text-right">
          <strong>Size</strong>
        </div>
        <div class="col-sm-4">
          <input type="text" class="form-control input-padding" required id="size" name="size" value="<?php echo $barang[0]->size?>">
        </div>
      </div>
      <div class="row profil-margin">
        <div class="col-sm-5 col-form-label text-right">
          <strong>Harga</strong>
        </div>
        <div class="col-sm-4">
          <input type="text" class="form-control input-padding" required id="harga" name="harga" value="<?php echo $barang[0]->harga?>">
        </div>
      </div>
      <input type="hidden" name="id" id="id" value="<?php echo $barang[0]->id?>">
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