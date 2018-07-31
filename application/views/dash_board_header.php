<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once("header.php");
?>

<nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-sm-3 col-md-2 mr-0" href="#">GeoHR dashboard</a>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-light" href="#">Hello <?php echo $name ?>,</a>
        <a class="p-2 text-light" href="<?php echo base_url('/index.php/login/logout'); ?>">Sign out</a>
    </nav>
</nav>

<div class="container-fluid">
    <div class="row">

        <?php
        require_once("dash_board_sidebar.php");
        ?>

        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">