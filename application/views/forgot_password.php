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
      <h4 class="text-center padding-top5 padding-bottom5">Reset password</h4>
      <div class="form-group">
        <label for="emailAddress">Email address</label>
        <input type="email" class="form-control" id="emailAddress" aria-describedby="emailHelp" placeholder="Enter email">
      </div>
      <div class="form-group">
        <label for="emailAddressRe">Re-enter email address</label>
        <input type="email" class="form-control" id="emailAddressRe" aria-describedby="emailHelp" placeholder="Re-enter enter email">
      </div>
      <button type="submit" class="btn btn-primary">Reset</button>
    </form>
    <div class="text-center action-links">
      <a href="<?php echo base_url('/index.php/login');?>">Back to login</a>
    </div>
  </div>
  <div class="col"></div>
</div>

<?php
require_once("footer.php");