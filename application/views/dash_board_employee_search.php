<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3">
    <h2>Employees</h2>

    <?php echo form_open('/employees', 'class="form-inline" method="GET"'); ?>
    <div class="form-group mx-sm-3 mb-2">
        <input type="text" class="form-control" id="employeeId" placeholder="Employee ID" name="empId">
    </div>
    <div class="form-group mx-sm-3 mb-2">
        <select id="inputState" class="form-control" name="status">
            <option selected disabled="true">Status</option>
            <option value="ACTIVE">Active</option>
            <option value="SUSPENDED">Suspended</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary mb-2">
        <span data-feather="search"></span> Search
    </button>
    </form>
    <a href="<?php echo base_url('/index.php/employees/create'); ?>">
        <button class="btn btn-success mb-2">
            <span data-feather="plus-circle"></span>
            New employee
        </button>
    </a>
</div>