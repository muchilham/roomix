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
            <a href="<?php echo base_url();?>admin/ruangan"><li class="list-group-item d-flex justify-content-between align-items-center active"> Ruangan </li></a>
            <a href="<?php echo base_url();?>admin/paketan"><li class="list-group-item d-flex justify-content-between align-items-start ">Paketan</li></a>
            <a href="<?php echo base_url();?>admin/penyewaan"><li class="list-group-item d-flex justify-content-between align-items-start ">Penyewaan</li></a>
            <a href="<?php echo base_url();?>admin/pembayaran"><li class="list-group-item d-flex justify-content-between align-items-start">Pembayaran</li></a>
            <!-- <a href="#"><li class="list-group-item d-flex justify-content-between align-items-start">Laporan</li></a> -->
          </ul>
        </div>
        <div class="col-md-9">
          <h1 class="text-primary text-left display-4">Perbarui Ruangan</h1>
          <div class="row">
            <div class="col-md-12">
              <div class="card-body">
                <form action="<?php echo base_url(); ?>admin/ruangan/ubah/<?php echo $data_ruangan->id_ruangan; ?>" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                    <label>Nama Ruangan</label>
                    <input type="text" class="form-control" placeholder="Nama Ruangan" required="required" id="namaruangan" name="namaruangan" value="<?php echo $data_ruangan->nama_ruangan; ?>"> </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Deskripsi Ruangan</label>
                    <textarea class="form-control" id="deskripsiruangan" rows="3" placeholder="Deskripsi Ruangan" name="deskripsiruangan"><?php echo $data_ruangan->deskripsi_ruangan; ?></textarea>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Harga Ruangan</label>
                    <input type="text" class="form-control" id="hargaruangan" placeholder="Harga Ruangan" name="hargaruangan" value="<?php echo $data_ruangan->harga_ruangan; ?>"> </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Satuan Ruangan</label>
                    <select class="custom-control custom-select" id="satuanruangan" name="satuanruangan">
                      <option selected="" value="Open this select menu">Open this select menu</option>
                      <option value="0" <?php if($data_ruangan->satuan_ruangan == '0') { echo "selected"; } ?>>Per Hari</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label>Kapasitas Ruangan</label>
                    <input type="number" class="form-control" placeholder="Kapasitas Ruangan" required="required" id="kapasitasruangan" name="kapasitasruangan" value="<?php echo $data_ruangan->kapasitas_ruangan; ?>"> </div>
                  <div class="form-group">
                    <label>Gambar Ruangan 1 </label>
                    <input type="file" class="form-control" required="required" id="gambarruangan1" name="gambarruangan1"> </div>
                  <div class="form-group">
                    <label>Gambar Ruangan 2 </label>
                    <input type="file" class="form-control" required="required" id="gambarruangan2" name="gambarruangan2"> </div>
                  <div class="form-group">
                    <label>Gambar Ruangan 3 </label>
                    <input type="file" class="form-control" required="required" id="gambarruangan3" name="gambarruangan3"> </div>
                  <div class="form-group">
                    <label>Gambar Ruangan 4 </label>
                    <input type="file" class="form-control" required="required" id="gambarruangan4" name="gambarruangan4"> </div>
                  <div class="form-group">
                    <label>Gambar Ruangan 5 </label>
                    <input type="file" class="form-control" required="required" id="gambarruangan5" name="gambarruangan5"> </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Status Ruangan</label>
                    <select class="custom-control custom-select" id="statusruangan" name="statusruangan">
                      <option selected="" value="Open this select menu">Open this select menu</option>
                      <option value="0" <?php if($data_ruangan->status_ruangan == '0') { echo "selected"; } ?>>Tidak Aktif</option>
                      <option value="1" <?php if($data_ruangan->status_ruangan == '1') { echo "selected"; } ?>>Aktif</option>
                    </select>
                  </div>
                  <button type="submit" class="btn btn-secondary my-2" name="submit">Submit</button>
                </form>
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
          <p>Apa anda yakin ingin mengubahnya?</p>
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