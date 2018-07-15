<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("header.php");
?>

<div class="row">
  <div class="col"></div>
  <div class="col">
    <div class="d-flex justify-content-center logo">
      <img src="<?php echo base_url('resources/images/logo-transparent.png');?>" alt="Generic placeholder image">
    </div>
    <form>
      <h4 class="text-center padding-top5 padding-bottom5">Login</h4>
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
      <a href="<?php echo base_url('/index.php/login/forgot_password');?>">Forgot password?</a> or 
      <a href="<?php echo base_url('/index.php/login/register');?>">Don't have an account?</a>
    </div>
  </div>
  <div class="col"></div>
</div>

<?php
require_once("footer.php");