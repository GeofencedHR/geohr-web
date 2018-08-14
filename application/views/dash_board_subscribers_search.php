<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3">
    <h2>Subscribers</h2>

    <?php echo form_open('/subscribers', 'class="form-inline" method="GET"'); ?>

    <div class="form-group mx-sm-3 mb-2">
        <input type="email" class="form-control" id="emailaddress" placeholder="Email address" name="email">
    </div>
    <div class="form-group mx-sm-3 mb-2">
        <select id="inputState" class="form-control" name="status">
            <option selected disabled="true">Status</option>
            <option value="NEW">NEW</option>
            <option value="ACTIVE">ACTIVE</option>
            <option value="SUSPENDED">SUSPENDED</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary mb-2">
        <span data-feather="search"></span> Search
    </button>
    </form>
</div>