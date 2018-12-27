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
            <a href="<?php echo base_url();?>admin/paketan"><li class="list-group-item d-flex justify-content-between align-items-start active">Paketan</li></a>
            <a href="<?php echo base_url();?>admin/penyewaan"><li class="list-group-item d-flex justify-content-between align-items-start">Penyewaan</li></a>
            <a href="<?php echo base_url();?>admin/pembayaran"><li class="list-group-item d-flex justify-content-between align-items-start">Pembayaran</li></a>
            <!-- <a href="#"><li class="list-group-item d-flex justify-content-between align-items-start">Laporan</li></a> -->
          </ul>
        </div>
        <div class="col-md-9">
          <h1 class="text-primary text-left display-4">Tambah Paketan</h1>
          <div class="row">
            <div class="col-md-12">
              <div class="card-body">
                <form action="<?php echo base_url(); ?>admin/paketan/tambah" method="post">
                  <div class="form-group">
                    <label>Nama Paketan</label>
                    <input type="text" class="form-control" placeholder="Nama Paketan" required="required" name="namapaketan" id="namapaketan"> </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Harga Paketan</label>
                    <input type="text" class="form-control" id="hargapaketan" placeholder="Harga Paketan" name="hargapaketan"> </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Satuan Paketan</label>
                    <select class="custom-control custom-select" id="satuanpaketan" name="satuanpaketan">
                      <option selected="">Open this select menu</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">Status Paketan</label>
                    <select class="custom-control custom-select" id="statuspaketan" name="statuspaketan">
                      <option selected="">Open this select menu</option>
                      <option value="1">One</option>
                      <option value="2">Two</option>
                      <option value="3">Three</option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="exampleInputEmail1">ID Ruangan</label>
                    <select class="custom-control custom-select" id="idruangan" name="idruangan">
                      <option selected="">Open this select menu</option>
                      <?php $no=1; foreach($select_ruangan as $data_ruangan) { ?>
                        <option value="<?php echo $data_ruangan->id_ruangan; ?>"><?php echo $data_ruangan->nama_ruangan; ?></option>
                      <?php } ?>
                    </select>
                    <h1 class="m-3">Peralatan</h1>
                    <div class="form-group mx-3 peralatan">
                      <label for="exampleInputEmail1">Peralatan</label>
                      <select class="custom-control custom-select" id="idruangan" name="idperalatan[]">
                        <option selected="">Open this select menu</option>
                        <?php foreach($select_peralatan as $data_peralatan) { ?>
                          <option value="<?php echo $data_peralatan->id_peralatan; ?>"><?php echo $data_peralatan->nama_peralatan; ?> - <?php echo $data_peralatan->id_peralatan; ?></option>
                        <?php } ?>
                      </select>

                    </div>
                  </div>
                  <br>
                  <button type="button" class="btn btn-primary mx-3" onclick="peralatan()">Tambah Peralatan</button>

                  <br>
                  <br>
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
          <p>Apa anda yakin ingin menambahnya?</p>
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

  <script type="text/javascript">
    var counter = 0;

            function peralatan()
            {

              $(".peralatan").append('<div id="delete_peralatan'+ counter +'">'+
                                    '<br>'+
                                    '<select class="custom-control custom-select" id="idruangan" name="idperalatan[]">'+
                                      '<option selected="">Open this select menu</option>'+
                                      '<?php foreach($select_peralatan as $data_peralatan) { ?>'+
                                        '<option value="<?php echo $data_peralatan->id_peralatan; ?>"><?php echo $data_peralatan->nama_peralatan; ?> - <?php echo $data_peralatan->id_peralatan; ?></option>'+
                                      '<?php } ?>'+
                                    '</select></div>');
                            counter++;

            }
  </script>
</body>

</html>