<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $title;?></title>
  </head>
  <body>
    <div class="row">
      <h3><?php echo $subtitle;?></h3>
      <form class="" action="<?php echo base_url('auth/doCreate');?>" method="post">
      <div class="form-group">
          <label for="NIM">NIM</label>
          <input type="text" class="form-control" name="nim">
      </div>
      <div class="form-group">
        <label for="Nama_lengkap">Nama Lengkap</label>
        <input type="text" class="form-control" name="nama_lengkap">
      </div>
      <div class="form-group">
        <label for="Jenkel">Jenis Kelamin</label>
        <select class="form-control" name="jenkel">
          <option value="">-Pilih Jenis Kelamin-</option>
          <option value="L">Laki-laki</option>
          <option value="P">Perempuan</option>
        </select>
      </div>
      <div class="form-group">
        <label for="Alamat">Alamat</label>
        <textarea name="alamat" rows="8" cols="80" class="form-control"></textarea>
      </div>
      <div class="form-group">
        <label for="Fakultas">Fakultas</label>
        <input type="text" class="form-control" name="fakultas">
      </div>
      <div class="form-group">
        <label for="Prodi">Program Studi</label>
        <input type="text" class="form-control" name="prodi">
      </div>
      <div class="form-group">
        <label for="Username">username</label>
        <input type="text" class="form-control" name="username">
      </div>
      <div class="form-group">
        <label for="Password">password</label>
        <input type="password" class="form-control" name="password">
      </div>
      <button type="submit" class="btn btn-info btn-sm">Daftar</button>
      </form>
    </div>
  </body>
</html>
