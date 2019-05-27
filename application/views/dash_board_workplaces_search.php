<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Dushan
 * Date: 10/17/2018
 * Time: 12:22 AM
 */
?>

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 mb-3">
    <h2>Work places</h2>

    <form class="form-inline">
        <div class="form-group mx-sm-3 mb-2">
            <input type="text" class="form-control" id="workplace" placeholder="Name">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Search</button>
    </form>
    <a href="<?php echo base_url('/index.php/work_places/create'); ?>">
        <button class="btn btn-success mb-2">
            <span data-feather="plus-circle"></span>
            New work place
        </button>
    </a>
</div>