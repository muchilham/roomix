<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" type="text/css">
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/css/flat.css">
</head>

<body>
  <nav class="navbar navbar-expand-md bg-light navbar-light">
    <div class="container-fluid">
      <a class="navbar-brand" href="#">
        <i class="fa d-inline fa-lg fa-behance-square"></i>
        <b>RoomiX</b>
      </a>
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbar2SupportedContent">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse text-center justify-content-end" id="navbar2SupportedContent">
        <a class="btn navbar-btn ml-2 btn-light text-primary border border-primary">
          <i class="fa d-inline fa-lg fa-user-circle-o"></i><?php echo $this->session->nama_lengkap;?></a>
        <a class="btn navbar-btn ml-2 text-white btn-primary" href="<?php echo base_url();?>admin/index/logout">
          <i class="fa d-inline fa-lg fa-sign-out"></i>&nbsp;Keluar</a>
      </div>
    </div>
  </nav>
  <div class="py-5">
    <div class="container-fluid">
      <div class="row">
        <div class="p-3 col-md-3">
          <ul class="list-group">
            <a href="<?php echo base_url();?>admin/index"><li class="list-group-item d-flex justify-content-between align-items-start">Beranda</li></a>
            <a href="<?php echo base_url();?>admin/pengguna"><li class="list-group-item d-flex justify-content-between align-items-center">Pengguna </li></a>
            <a href="<?php echo base_url();?>admin/peralatan"><li class="list-group-item d-flex justify-content-between align-items-center"> Peralatan </li></a>
            <a href="<?php echo base_url();?>admin/ruangan"><li class="list-group-item d-flex justify-content-between align-items-center"> Ruangan </li></a>
            <a href="<?php echo base_url();?>admin/paketan"><li class="list-group-item d-flex justify-content-between align-items-start ">Paketan</li></a>
            <a href="<?php echo base_url();?>admin/penyewaan"><li class="list-group-item d-flex justify-content-between align-items-start active">Penyewaan</li></a>
            <a href="<?php echo base_url();?>admin/pembayaran"><li class="list-group-item d-flex justify-content-between align-items-start">Pembayaran</li></a>
            <!-- <a href="#"><li class="list-group-item d-flex justify-content-between align-items-start">Laporan</li></a> -->
          </ul>
        </div>
        <div class="col-md-9">
          <h1 class="text-primary text-left display-4">Penyewaan</h1>
          <div class="row">
          <div id="msg"><?php echo $this->session->flashdata('notif'); ?></div>
            <div class="col-md-12 my-4">
              <div class="row">
                <!-- <div class="col-md-12">
                  <a href="<?php echo base_url(); ?>admin/pengguna/tambah" class="btn btn-primary text-light">Tambah</a>
                </div> -->
              </div>
              <table class="table my-2">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>ID Penyewaan</th>
                    <th>Tipe Penyewaan</th>
                    <th>Waktu Pakai</th>
                    <th>Waktu Selesai</th>
                    <th>Total Harga Sewa</th>
                    <th>Waktu Penyewaan</th>
                    <th colspan="2">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach($select_penyewaan as $data_penyewaan) { ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data_penyewaan->id_penyewaan; ?></td>
                    <td><?php echo $data_penyewaan->tipe_penyewaan; ?></td>
                    <td><?php echo $data_penyewaan->waktu_pakai; ?></td>
                    <td><?php echo $data_penyewaan->waktu_selesai; ?></td>
                    <td><?php echo $data_penyewaan->total_harga_sewa; ?></td>
                    <td><?php echo $data_penyewaan->waktu_penyewaan; ?></td>
                    <?php if($data_penyewaan->status_penyewaan == '0') { ?>
                      <td> &nbsp; </td>
                      <td><button type="button" class="btn btn-icon waves-effect waves-light btn-danger" disabled> Canceled </button></td>
                    <?php } else if($data_penyewaan->status_penyewaan == '1') { ?>
                      <td><a href="<?php echo base_url(); ?>admin/penyewaan/ubahstatus/<?php echo $data_penyewaan->id_penyewaan; ?>/2"><button type="button" class="btn btn-icon waves-effect waves-light btn-primary"> Accept Book </button></a> </td>
                      <td><a href="<?php echo base_url(); ?>admin/penyewaan/ubahstatus/<?php echo $data_penyewaan->id_penyewaan; ?>/0"><button type="button" class="btn btn-icon waves-effect waves-light btn-danger"> Canceled </button></a></td>
                    <?php } else if($data_penyewaan->status_penyewaan == '2') { ?>
                      <td><a href="<?php echo base_url(); ?>admin/penyewaan/ubahstatus/<?php echo $data_penyewaan->id_penyewaan; ?>/3"><button type="button" class="btn btn-icon waves-effect waves-light btn-warning"> Confirm Book </button> </a></td>
                      <td><a href="<?php echo base_url(); ?>admin/penyewaan/ubahstatus/<?php echo $data_penyewaan->id_penyewaan; ?>/0"><button type="button" class="btn btn-icon waves-effect waves-light btn-danger"> Canceled </button></a></td>
                    <?php } else if($data_penyewaan->status_penyewaan == '3') { ?>
                      <td><a href="<?php echo base_url(); ?>admin/penyewaan/ubahstatus/<?php echo $data_penyewaan->id_penyewaan; ?>/4"><button type="button" class="btn btn-icon waves-effect waves-light btn-success"> Finish </button></a> </td>
                      <td><a href="<?php echo base_url(); ?>admin/penyewaan/ubahstatus/<?php echo $data_penyewaan->id_penyewaan; ?>/0"><button type="button" class="btn btn-icon waves-effect waves-light btn-danger"> Canceled </button></a></td>
                    <?php } else { ?>
                      <td><button type="button" class="btn btn-icon waves-effect waves-light btn-default" disabled=""> Finished </button> </td>
                      <td>&nbsp;</td>
                    <?php } ?>
                  
                  </tr>

                  <div class="modal" id="modal-hapus">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title">Konfirmasi</h5>
                          <button type="button" class="close" data-dismiss="modal">
                            <span>×</span>
                          </button>
                        </div>
                        <div class="modal-body">
                          <p>Apa anda yakin ingin menghapusnya?</p>
                        </div>
                        <div class="modal-footer">
                          <a href="<?php echo base_url(); ?>admin/pengguna/hapus/"><button type="button" class="btn btn-primary">Ya</button></a>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                        </div>
                      </div>
                    </div>
                  </div>

                  <?php } ?>
                </tbody>
              </table>
              <div class="row">
                <div class="col-md-12 align-self-center">
                  <ul class="pagination d-flex justify-content-center">
                    <li class="page-item">
                      <a class="page-link" href="#">
                        <span>«</span>
                        <span class="sr-only">Previous</span>
                      </a>
                    </li>
                    <li class="page-item">
                      <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                      <a class="page-link" href="#">2</a>
                    </li>
                    <li class="page-item">
                      <a class="page-link" href="#">3</a>
                    </li>
                    <li class="page-item">
                      <a class="page-link" href="#">4</a>
                    </li>
                    <li class="page-item">
                      <a class="page-link" href="#">
                        <span>»</span>
                        <span class="sr-only">Next</span>
                      </a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="modal" id="modal-hapus">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Konfirmasi</h5>
          <button type="button" class="close" data-dismiss="modal">
            <span>×</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apa anda yakin ingin menghapusnya?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-primary">Ya</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
        </div>
      </div>
    </div>
  </div>

  <div class="text-white bg-primary">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mt-3 text-center">
          <p>© Copyright 2018 RoomiX - All rights reserved.</p>
        </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>