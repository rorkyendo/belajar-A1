<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title><?php echo $title;?></title>
  </head>
  <body>
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
  </body>
</html>
