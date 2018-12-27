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
            <a href="<?php echo base_url();?>admin/peralatan"><li class="list-group-item d-flex justify-content-between align-items-center active"> Peralatan </li></a>
            <a href="<?php echo base_url();?>admin/ruangan"><li class="list-group-item d-flex justify-content-between align-items-center"> Ruangan </li></a>
            <a href="<?php echo base_url();?>admin/paketan"><li class="list-group-item d-flex justify-content-between align-items-start ">Paketan</li></a>
            <a href="<?php echo base_url();?>admin/penyewaan"><li class="list-group-item d-flex justify-content-between align-items-start ">Penyewaan</li></a>
            <a href="<?php echo base_url();?>admin/pembayaran"><li class="list-group-item d-flex justify-content-between align-items-start">Pembayaran</li></a>
            <!-- <a href="#"><li class="list-group-item d-flex justify-content-between align-items-start">Laporan</li></a> -->
          </ul>
        </div>
        <div class="col-md-9">
          <h1 class="display-3 text-primary text-left">Peralatan</h1>
          <div class="row">
            <div class="col-md-12 my-4">
              <div class="row">
              <div id="msg"><?php echo $this->session->flashdata('notif'); ?></div>
                <div class="col-md-12">
                  <a href="<?php echo base_url(); ?>admin/peralatan/tambah" class="btn btn-primary text-light">Tambah</a>
                </div>
              </div>
              <table class="table my-2">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Peralatan</th>
                    <th>Deskripsi</th>
                    <th>Harga</th>
                    <th>Satuan</th>
                    <th>Stock</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                <?php $no=1; foreach($select_peralatan as $data_peralatan) { ?>
                  <tr>
                    <td><?php echo $no++; ?></td>
                    <td><?php echo $data_peralatan->nama_peralatan; ?></td>
                    <td><?php echo $data_peralatan->deskripsi_peralatan; ?></td>
                    <td><?php echo $data_peralatan->harga_peralatan; ?></td>
                    <td><?php echo $data_peralatan->satuan_peralatan; ?></td>
                    <td><?php echo $data_peralatan->stok_peralatan; ?></td>
                    <td><?php echo $data_peralatan->status_peralatan; ?></td>
                    <td>
                      <a href="<?php echo base_url(); ?>admin/peralatan/ubah/<?php echo $data_peralatan->id_peralatan; ?>" class="btn btn-outline-primary">Ubah</a>&nbsp; &nbsp;
                      <a class="btn btn-primary" href="#modal-hapus" data-toggle="modal" data-target="#modal-hapus<?php echo $data_peralatan->id_peralatan; ?>">Hapus</a>
                    </td>
                  </tr>

                  <div class="modal" id="modal-hapus<?php echo $data_peralatan->id_peralatan; ?>">
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
                          <a href="<?php echo base_url(); ?>admin/peralatan/hapus/<?php echo $data_peralatan->id_peralatan; ?>"><button type="button" class="btn btn-primary">Ya</button></a>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                        </div>
                      </div>
                    </div>
                  </div>

                <?php } ?>
                </tbody>
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