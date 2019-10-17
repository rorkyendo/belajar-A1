<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">
    <title><?php echo $title;?></title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
  </head>
  <body>
  <div class="container">
    <div class="row">
      <div class="panel panel-default">
        <div class="panel-body">
          <h3 class="text-center"><?php echo $subtitle;?></h3>
          <hr/>
              <!-- <form class="" action="<?php echo base_url('auth/doCreate');?>" method="post"> -->
              <form class="" id="formRegister">
              <div class="form-group">
                  <label for="NIM">NIM</label>
                  <input type="text" class="form-control" name="nim" id="nim" onkeyup="cekNim('this.value')">
                  <font color="" id="notif">Disini respon data akan dicek</font>
              </div>
              <div class="form-group">
                <label for="Nama_lengkap">Nama Lengkap</label>
                <input type="text" class="form-control" name="nama_lengkap" id="nama_lengkap">
              </div>
              <div class="form-group">
                <label for="Jenkel">Jenis Kelamin</label>
                <select class="form-control" name="jenkel" id="jenkel">
                  <option value="">-Pilih Jenis Kelamin-</option>
                  <option value="L">Laki-laki</option>
                  <option value="P">Perempuan</option>
                </select>
              </div>
              <div class="form-group">
                <label for="Alamat">Alamat</label>
                <textarea name="alamat" rows="8" cols="80" class="form-control" id="alamat"></textarea>
              </div>
              <div class="form-group">
                <label for="Fakultas">Fakultas</label>
                <input type="text" class="form-control" name="fakultas" id="fakultas">
              </div>
              <div class="form-group">
                <label for="Prodi">Program Studi</label>
                <input type="text" class="form-control" name="prodi" id="prodi">
              </div>
              <div class="form-group">
                <label for="Username">username</label>
                <input type="text" class="form-control" name="username" id="username">
              </div>
              <div class="form-group">
                <label for="Password">password</label>
                <input type="password" class="form-control" name="password" id="password">
              </div>
            <button type="button" class="btn btn-info btn-sm" id='daftar'>Daftar</button>
            </form>
            <div class="form-group">
              <div class="alert alert-info" id='infoProses'>Disini Tampil info proses penyimpanan data</div>
            </div>

            <script type="text/javascript">
              $('#daftar').click(function(){
                $('#infoProsesModal').modal('show');
                var nim = $('#nim').val()
                var nama_lengkap = $('#nama_lengkap').val()
                var jenkel = $('#jenkel').val()
                var alamat = $('#alamat').val()
                var fakultas = $('#fakultas').val()
                var prodi = $('#prodi').val()
                var username = $('#username').val()
                var password = $('#password').val()
                $.ajax({
                  url:'<?php echo base_url('auth/doRegisterWithJquery');?>',
                  type:'post',
                  data:'nim='+nim+'&nama_lengkap='+nama_lengkap+'&jenkel='+jenkel+'&alamat='+alamat+'&fakultas='+fakultas+'&prodi='+prodi+'&username='+username+'&password='+password,
                  success:function(data){
                    $('#infoProses').text(data);
                  },error:function(){
                    $('#infoProses').text('Ada kesalahan');
                  }
                });
              })
            </script>
            <script type="text/javascript">
              function cekNim(nim){
                $.ajax({
                  url:'<?php echo base_url('auth/cekNim/');?>',
                  type:'get',
                  data:'nim='+nim,
                  success:function(msg){
                    if (msg == 'true') {
                      $("#notif").text('Data nim sudah ada!');
                      $("#notif").prop('color','red');
                      $("#daftar").attr('disabled',true);
                    }else if (msg == 'false') {
                      $("#notif").text('Data nim dapat digunakan!');
                      $("#notif").prop('color','green');
                      $("#daftar").attr('disabled',false);
                    }
                  },error:function(){
                    alert('Terjadi kesalahan')
                  }
                });
              }
            </script>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
