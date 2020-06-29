<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="container container-bg-white">
  <h5 class="titlepage">Pengaturan Profil - <?php echo $this->session->userdata("fullname"); ?></h5>
  <div>
    <div class="row">
      <div class="col-sm-3">
        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
          <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Umum</a>
          <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Keamanan</a>
        </div>
      </div>
      <div class="col-sm-9">
        <div class="tab-content" id="v-pills-tabContent">
          <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab">
            <div>
              <h5>Sunting Profil</h5>
            </div>
            <form action="<?php echo base_url('/profil/suntingProfil');?>" method="POST">
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label">Username</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control input-padding" required id="username" name="username" value="<?php echo $this->session->userdata("username"); ?>">
                </div>
                <small id="UsernameCheck" class="smallHelp"></small>
              </div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label">Nama Lengkap</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control input-padding" required id="fullname" name="fullname" value="<?php echo $this->session->userdata("fullname"); ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                <div class="col-sm-5">
                  <input type="date" class="form-control input-padding" required id="tgl_lahir" name="tgl_lahir" value="<?php echo $this->session->userdata("tgl_lahir"); ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label">Jabatan</label>
                <div class="col-sm-5">
                  <input type="text" readonly class="form-control input-padding" id="jabatan" name="jabatan" value="<?php echo $this->session->userdata("jabatan"); ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label">Alamat</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control input-padding" required id="alamat" name="alamat" value="<?php echo $this->session->userdata("alamat"); ?>">
                </div>
              </div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label">Nomor Telepon</label>
                <div class="col-sm-5">
                  <input type="text" class="form-control input-padding" id="no_telp" name="no_telp" value="<?php echo $this->session->userdata("no_telp"); ?>">
                </div>
              </div>
              <div class="form-group row">
                <div for="staticEmail" class="col-sm-3 col-form-label"></div>
                <div class="col-sm-5">
                  <button type="submit" class="btn btn-sm btn-primary bg-blue input-padding" id="simpan-sunting">SIMPAN PERUBAHAN</button>
                </div>
              </div>
            </form>
          </div>
          <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
            <h5>Ubah Kata Sandi</h5>
            <form action="<?php echo base_url('/profil/updatePassword');?>" method="POST">
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label">Saat Ini</label>
                <div class="col-sm-4">
                  <input type="Password" class="form-control input-padding" id="password" name="password">
                </div>
                <small class="warning-text smallHelp" id="oldPassCheck"></small>
              </div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label">Baru</label>
                <div class="col-sm-4">
                  <input type="Password" class="form-control input-padding" id="passwordBaru" name="passwordBaru">
                </div>
                <small id="" class="smallHelp text-muted">8 - 12 Karakter</small>
              </div>
              <div class="form-group row">
                <label for="staticEmail" class="col-sm-3 col-form-label">Ketik ulang yang Baru</label>
                <div class="col-sm-4">
                  <input type="Password" class="form-control input-padding" id="passwordKonfirmasi">
                </div>
                <small class="warning-text smallHelp" id="newPassCheck"></small>
              </div>
              <div class="form-group row">
                <div for="staticEmail" class="col-sm-3 col-form-label"></div>
                <div class="col-sm-8">
                  <button type="button" class="btn btn-sm btn-primary bg-blue input-padding" disabled id="simpanPasswordBaru">SIMPAN PERUBAHAN</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>  
  </div>
</div>  
<script src="<?php echo base_url('assets/js/jquery-3.2.1.slim.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/popper.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap-4.0.0/js/bootstrap.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/jquery.1.11.1.min.js')?>"></script>
<script src="<?php echo base_url('assets/js/ValidateNewPassword.js')?>"></script>
<script src="<?php echo base_url('assets/js/CekUsername.js')?>"></script>
<script src="<?php echo base_url('assets/js/ValidatePassword.js')?>"></script>
</body>
</html>