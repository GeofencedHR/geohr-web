<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("header.php");
?>

<style type="text/css">
  .logo {
    margin-top: 30px;
    margin-bottom: 5px;
  }

  .action-links {
    margin-top: 10px;
  }
</style>

<div class="row">
  <div class="col"></div>
  <div class="col">
    <div class="d-flex justify-content-center logo">
      <img class="mr-3" src="<?php echo base_url('resources/images/logo-transparent.png');?>" alt="Generic placeholder image">
    </div>
    <form>
      <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
      </div>
      <button type="submit" class="btn btn-primary">Login</button>
    </form>
    <div class="text-center action-links">
      <a href="#">Forgot password?</a> or <a href="#">Don't have an account?</a>
    </div>
  </div>
  <div class="col"></div>
</div>

<?php
require_once("footer.php");