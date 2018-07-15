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
      <h4 class="text-center padding-top5 padding-bottom5">Get started today!</h4>
      <div class="form-group">
        <label for="fname">First name</label>
        <input type="text" class="form-control" id="fname" placeholder="First name">
      </div>
      <div class="form-group">
        <label for="lname">Last name</label>
        <input type="text" class="form-control" id="lname" placeholder="Last name">
      </div>
      <div class="form-group">
        <label for="emailaddress">Email address</label>
        <input type="email" class="form-control" id="emailaddress" aria-describedby="emailHelp" placeholder="Email address">
      </div>
      <div class="form-group">
        <label for="company">Company name</label>
        <input type="text" class="form-control" id="company" placeholder="Company name">
      </div>
      <div class="form-group">
        <label for="password">Password</label>
        <input type="password" class="form-control" id="password" placeholder="Password">
      </div>
      <div class="form-group">
        <label for="repassword">Re-enter password</label>
        <input type="password" class="form-control" id="repassword" placeholder="Re-enter password">
      </div>
      <button type="submit" class="btn btn-primary">Register</button>
    </form>
    <div class="text-center action-links">
      <a href="<?php echo base_url('/index.php/login');?>">Back to login</a>
    </div>
  </div>
  <div class="col"></div>
</div>

<?php
require_once("footer.php");