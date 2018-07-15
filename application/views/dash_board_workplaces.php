<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("dash_board_header.php");
?>
		<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3">
          <h2>Work places</h2>

          <form class="form-inline">
    			 <div class="form-group mx-sm-3 mb-2">
    			    <input type="text" class="form-control" id="workplace" placeholder="Name">
    			  </div>
    			  <button type="submit" class="btn btn-primary mb-2">Search</button>
    			</form>
          <a href="#">
            <button class="btn btn-success mb-2">
              <span data-feather="plus-circle"></span>
              New work place
            </button>
          </a>
        </div>
        
          <div class="table-responsive">
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>No. of employees</th>
                  <th>Created on</th>
                  <th>Action</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Coffee bean - Dehiwala</td>
                  <td>04</td>
                  <td>10:30 PM on 20/10/2018</td>
                  <td>
                  	<a href="#" class="badge badge-info">View</a>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>DSI - Mount lavinia</td>
                  <td>03</td>
                  <td>8:30 PM on 21/11/2018</td>
                  <td>
                  	<a href="#" class="badge badge-info">View</a>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
       
<?php
require_once("dash_board_footer.php");