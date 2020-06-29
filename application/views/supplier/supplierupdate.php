<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container container-bg-white">
  <h5 class="titlepage">Sunting Data Supplier - <?php echo $supplier[0]->nama_supplier; ?></h5>
  <div>
    <form action="<?php echo base_url('supplier/simpanedit')?>" method="post">
      <div class="row profil-margin">
        <div class="col-sm-5 col-form-label text-right">
          <strong>ID Supplier</strong>
        </div>
        <div class="col-sm-4">
          <input type="text" class="form-control input-padding" readonly="true" id="id_supplier" name="id_supplier" value="<?php echo $supplier[0]->id_supplier; ?>">
        </div>
      </div>
      <div class="row profil-margin">
        <div class="col-sm-5 col-form-label text-right">
          <strong>Nama Supplier</strong>
        </div>
        <div class="col-sm-4">
          <input type="text" class="form-control input-padding" required id="nama_supplier" name="nama_supplier" value="<?php echo $supplier[0]->nama_supplier; ?>">
        </div>
      </div>
      <div class="row profil-margin ui-widget">
        <div class="col-sm-5 col-form-label text-right">
          <strong>Asal Daerah</strong>
        </div>
        <div class="col-sm-4">
          <input type="text" class="form-control input-padding" required id="asal_daerah" name="asal_daerah" value="<?php echo $supplier[0]->asal_daerah; ?>">
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
<script type="text/javascript" src="<?php echo base_url('assets/js/jquery-ui.js') ?>"></script>
<script type="text/javascript">
  var opsi = [<?php 
      foreach($asaldaerah as $a){
        echo '"'.$a->asal_daerah.'",';
      }
  ?>];
  $("#asal_daerah").autocomplete({source:opsi});
</script>
</body>
</html>