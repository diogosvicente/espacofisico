<?php defined('BASEPATH') OR exit('No direct script access allowed');?>
<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Language" content="pt-br">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title><?= $page_title; ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
    <meta name="description" content="This is an example dashboard created using build-in elements and components.">
    <meta name="msapplication-tap-highlight" content="no">
    <!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="<?php echo base_url('assets/Login_v19/images/logomarca-uerj.png'); ?>"/>
    <!--
    =========================================================
    * ArchitectUI HTML Theme Dashboard - v1.0.0
    =========================================================
    * Product Page: https://dashboardpack.com
    * Copyright 2019 DashboardPack (https://dashboardpack.com)
    * Licensed under MIT (https://github.com/DashboardPack/architectui-html-theme-free/blob/master/LICENSE)
    =========================================================
    * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.
    -->
<link href='<?= base_url("assets/template/src/css/main.css"); ?>' rel='stylesheet'>
<?php
    echo (isset($fullcalendar) && $fullcalendar == true) ?
    "<link href='" . base_url("assets/fullcalendar-5.3.2/lib/main.css") . "' rel='stylesheet' />" : "" ;

    echo (isset($moment) && $moment == true) ?
    "<script src='" . base_url('assets/daterangepicker/moment.min.js') . "'></script>" : "" ;

    if (isset($sweet_alert) && $sweet_alert == true) { ?>

        <script type="text/javascript" src="<?= base_url('assets/sweet_alert_2/sweetalert2@10.js'); ?>"></script>
        <script type="text/javascript" src="<?= base_url('assets/jquery/jquery-3.5.1.min.js'); ?>"></script>

    <?php }

    if (isset($datatables) && $datatables == true) { ?>

        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/DataTables/DataTables-1.10.22/css/jquery.dataTables.min.css') ?>">
        <link rel="stylesheet" type="text/css" href="<?= base_url('assets/DataTables/Buttons-1.6.5/css/buttons.dataTables.min.css') ?>">

    <?php }

    echo (isset($font_awesome) && $font_awesome == true) ?
    "<link href='" . base_url("assets/login/fonts/font-awesome-4.7.0/css/font-awesome.min.css") . "' rel='stylesheet' />" : "" ;

    if (isset($select_multiple) AND $select_multiple == true){ ?>

        <link href="<?= base_url('assets/multiple-select-master/css/multiple-select.css'); ?>" rel="stylesheet" type="text/css">
        <script type="text/javascript" src="<?= base_url('assets/jquery/jquery-3.5.1.min.js'); ?>"></script>

    <?php }

    if (isset($datepicker_multiple) AND $datepicker_multiple == true){ ?>

        <script type="text/javascript" src="<?php echo base_url('assets/datepicker-multiple/js/bootstrap-datepicker.min.js'); ?>"></script>
        <link rel="stylesheet" href="<?php echo base_url('assets/datepicker-multiple/css/bootstrap-datepicker3.css'); ?>"/>
    
    <?php }

    if (isset($daterangepicker) AND $daterangepicker == true){ ?>

        <script type="text/javascript" src="<?php echo base_url('assets/daterangepicker/daterangepicker.min.js'); ?>"></script>
        <link rel="stylesheet" href="<?php echo base_url('assets/daterangepicker/daterangepicker.css'); ?>"/>
    
    <?php }
?>

</head>


