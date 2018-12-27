<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url();?>assets/css/flat.css">
</head>

<body>
  <nav class="navbar navbar-expand-md bg-light navbar-light">
    <div class="container">
      <a class="navbar-brand" href="#">
        <i class="fa d-inline fa-lg fa-behance-square"></i>
        <b>TSAMARA</b>
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>">
              <i class="fa fa-fw fa-home"></i>&nbsp;Beranda</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="<?php echo base_url();?>beranda/katalog">
              <i class="fa fa-fw fa-tasks"></i>&nbsp;Ruang &amp; Peralatan</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">
              <i class="fa d-inline fa-lg fa-envelope-o"></i> Kontak</a>
          </li>
        </ul>
        <?php if(!$this->session->logged_in)
        { ?>
        <a class="btn navbar-btn ml-2 text-white btn-secondary" href="<?php echo base_url();?>beranda/login">
          <i class="fa d-inline fa-lg fa-sign-in"></i>Masuk</a>
        <a class="btn navbar-btn ml-2 text-white btn-primary" href="<?php echo base_url();?>beranda/register">
          <i class="fa d-inline fa-lg fa-pencil-square-o"></i>Daftar</a>
        <?php } else
        {
          ?>
        <div class="btn-group">
          <button class="btn dropdown-toggle btn-outline-primary" data-toggle="dropdown"> <?php echo $this->session->nama_lengkap; ?></button>
          <div class="dropdown-menu">
            <a class="dropdown-item" href="<?php echo base_url();?>beranda/keranjang">Keranjang Belanja</a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="<?php echo base_url();?>beranda/histori">Histori</a>
          </div>
        </div>
        <a class="btn navbar-btn ml-2 text-white btn-primary" href="<?php echo base_url();?>beranda/logout">
          <i class="fa d-inline fa-lg fa-sign-out"></i>keluar</a>
      </div>
    <?php } ?>
    </div>
  </nav>