<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta http-equiv="x-ua-compatible" content="ie=edge">

  <title><?= $title ?></title>

  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/fontawesome-free/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>dist/css/adminlte.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?= base_url('assets/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <!-- Tempus Dominus -->
  <link rel="stylesheet" href="<?= base_url('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') ?>">
  <!-- All css -->
  <link rel="stylesheet" href="<?= base_url('assets/owner/css/all.css?v='.time()) ?>">
  
  <!-- My Style -->
  <?php if(isset($style)) : ?>
  <link rel="stylesheet" href="<?= base_url('assets/owner/css/'.$style.'?v='.time()) ?>">
  <?php endif; ?>
  
</head>
<body class="hold-transition sidebar-mini layout-fixed layout-navbar-fixed
layout-footer-fixed">
<div class="wrapper">

