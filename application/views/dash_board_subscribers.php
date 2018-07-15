<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("dash_board_header.php");
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
        
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Plan</th>
                  <th>Registered on</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Jack</td>
                  <td>jack@gmail.com</td>
                  <td>FREE</td>
                  <td>10:30 PM on 20/10/2018</td>
                  <td>
                  	<span class="badge badge-warning">New</span>
                  </td>
                  <td>
                  	<a href="#" class="badge badge-info">View</a>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Saman</td>
                  <td>saman@gmail.com</td>
                  <td>FREE</td>
                  <td>8:30 PM on 21/11/2018</td>
                  <td>
                  	<span class="badge badge-success">Active</span>
                  </td>
                  <td>
                  	<a href="#" class="badge badge-info">View</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
       
<?php
require_once("dash_board_footer.php");