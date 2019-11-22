<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
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
            <?php echo $this->session->flashdata('notif');?>
            <form class="" action="<?php echo base_url('auth/doResetPassword');?>" method="post">
            <div class="form-group">
              <label for="Email">Masukkan Email</label>
              <input type="email" class="form-control" name="email">
            </div>
            <button type="submit" class="btn btn-info btn-sm">Reset</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </body>
</html>
