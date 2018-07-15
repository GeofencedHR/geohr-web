<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3">
          <h2>Subscribers</h2>

          <form class="form-inline">
    			 <div class="form-group mx-sm-3 mb-2">
    			    <input type="email" class="form-control" id="emailaddress" placeholder="Email address">
    			  </div>
    			  <div class="form-group mx-sm-3 mb-2">
    			    <select id="inputState" class="form-control">
    			        <option selected disabled="true">Status</option>
    			        <option>New</option>
    			        <option>Active</option>
    			        <option>Suspended</option>
    			    </select>
    			  </div>
    			  <button type="submit" class="btn btn-primary mb-2">Search</button>
    			</form>
        </div>