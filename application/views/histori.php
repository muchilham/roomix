
  <div class="p-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="display-3 text-primary text-left">Histori</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="py-1">
    <div class="container">
        <?php foreach ($get_histori->result() as $key) { 
          // $gbr = explode("|", $key->gambar);
        ?>
      <div class="row my-2">
        <div class="col-md-2">
          <h4 class="btn btn-outline-primary"><?php echo $key->id_penyewaan; ?> </h4>
          <?php if($key->status_penyewaan == 1) { ?> <h5 class="btn btn-info">Accept Book</h5>
          <?php } else if($key->status_penyewaan == 2) { ?> <h5 class="btn btn-warning">Confirm Book</h5>
          <?php } else if($key->status_penyewaan == 3) { ?> <h5 class="btn btn-primary">Finish</h5>
          <?php } else if($key->status_penyewaan == 4) { ?> <h5 class="btn btn-success">Finished</h5>
          <?php } else  { ?> <h5 class="btn btn-danger">Canceled</h5>
          <?php } ?>
          <!-- <img class="img-fluid d-block" src="<?php echo base_url();?>assets/img/katalog/<?php echo $gbr[0];?>" width="120px" height="120px">  -->
          </div>
        <div class="col-md-8">
          <p class="">Ini Merupakan Histori anda dengan penyewaan pada 
            <br>Waktu Pakai: <?php echo $key->waktu_pakai;?>
            <br>Waktu Selesai: <?php echo $key->waktu_selesai;?>
            <br>Total Biaya: <u><?php echo $key->total_harga_sewa;?></u></p>
        </div>
        <div class="col-md-2">
          <?php 
          $cek_bukti_pembayaran = $this->Data_model->cek_bukti_pembayaran($key->id_penyewaan)->num_rows();

          if($cek_bukti_pembayaran == 0)
          {
          ?>
          <a class="btn btn-primary btn-block m-1" data-toggle="modal" data-target="#modal_<?php echo $key->id_penyewaan;?>" href="">Upload Bukti</a>
          <?php } else { ?>

          <button class="btn btn-primary btn-block m-1" disabled="">Upload Bukti</button>
          <?php } ?>
          <!-- <a class="btn btn-outline-primary btn-block m-1" href="#">Detail</a> -->
        </div>
      </div>

      <div id="modal_<?php echo $key->id_penyewaan;?>" class="modal fade" role="dialog">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Upload Bukti</h5>
              <button type="button" class="close" data-dismiss="modal">
                <span>×</span>
              </button>
            </div>
            <div class="modal-body">
              <form class="" action="<?php echo base_url();?>beranda/UploadBuktiHandler" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <input type="hidden" class="form-control" name="idpenyewaan" value="<?php echo $key->id_penyewaan;?>">
                </div>
                <div class="form-group">
                  <label>File Bukti</label>
                  <input type="file" class="form-control-file" name="buktipembayaran">
                </div>
                <button type="submit" class="btn btn-primary my-2">Submit</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    <?php } ?>
    </div>
  </div>
  <div class="py-5 text-white bg-primary">
    <div class="container">
      <div class="row">
        <div class="col-md-9">
          <p class="lead">Sign up to our newsletter for the latest news</p>
          <form class="form-inline">
            <div class="form-group">
              <input type="email" class="form-control" placeholder="Your e-mail here"> </div>
            <button type="submit" class="btn ml-3 btn-secondary">Subscribe</button>
          </form>
        </div>
        <div class="col-4 col-md-1 align-self-center">
          <a href="https://www.facebook.com" target="_blank">
            <i class="fa fa-fw fa-facebook fa-3x text-white"></i>
          </a>
        </div>
        <div class="col-4 col-md-1 align-self-center">
          <a href="https://twitter.com" target="_blank">
            <i class="fa fa-fw fa-twitter fa-3x text-white"></i>
          </a>
        </div>
        <div class="col-4 col-md-1 align-self-center">
          <a href="https://www.instagram.com" target="_blank">
            <i class="fa fa-fw fa-instagram text-white fa-3x"></i>
          </a>
        </div>
      </div>
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