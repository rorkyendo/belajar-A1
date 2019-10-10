<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0">
    <title><?php echo $title;?></title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css');?>">
    <script type="text/javascript" src="<?php echo base_url('assets/js/bootstrap.min.js');?>"></script>
    <script type="text/javascript" src="<?php echo base_url('assets/js/jquery.js');?>"></script>
  </head>
  <body>
    <div class="container">
      <div class="row">
      <h3><?php echo $subtitle;?></h3>
      <form class="" action="<?php echo base_url('auth/doLogin');?>" method="post">
      <div class="form-group">
        <label for="Username">username</label>
        <input type="text" class="form-control" name="username">
      </div>
      <div class="form-group">
        <label for="Password">password</label>
        <input type="password" class="form-control" name="password">
      </div>
      <button type="submit" class="btn btn-info btn-sm">Login</button>
      </form>
      </div>
    </div>
  </body>
</html>
