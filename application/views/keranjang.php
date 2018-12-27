
  <div class="p-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12">
          <h1 class="display-3 text-primary text-left">Keranjang</h1>
        </div>
      </div>
    </div>
  </div>
  <div class="py-1">
    <div class="container">
      <?php 
      $totalbiaya = 0;
      for ($i=0; $i < 100; $i++) 
      {
        if($this->session->has_userdata("id".$i))
        {
          $ids = $this->session->userdata("id".$i);
          $details = explode(",", $this->session->userdata("detail".$i));
          $foto = explode("|", $details[5]);
          $deskripsi = $details[2];
          $totalbiaya = $totalbiaya + $details[1];
        ?>
          <div class="row my-2">
            <div class="col-md-2">
              <img class="img-fluid d-block" src="<?php echo base_url();?>assets/img/katalog/<?php echo $foto[0];?>" width="120px" height="120px">
            </div>
            <div class="col-md-8">
              <p class=""><?php echo $deskripsi; ?></p>
            </div>
            <div class="col-md-1">
              <p class=""><a href="<?php echo base_url();?>beranda/DeleteKeranjangHandler/<?php echo $ids.'|'.$deskripsi;?>" class="btn btn-primary btn-lg text-light"><i class="fa d-inline fa-trash-o"></i></a></p>
            </div>
            <div class="col-md-1">
              <?php
              if ($this->session->has_userdata("status".$i))
              {
                if($this->session->userdata("status".$i) == 1)
                {
                ?>
                <p class=""><span class="btn btn-outline-success btn-lg"><i class="fa d-inline fa-check"></i> Tersedia</span></p>
                <?php } 
                else {
                ?>
                <p class=""><span class="btn btn-outline-danger btn-lg"><i class="fa d-inline fa-times"></i> Tidak Tersedia</span></p>
                <?php }
              }
              ?>
            </div>
          </div>
        <?php 
        }
      }
      ?>
    </div>
  </div>
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-2"> </div>
        <div class="col-md-8">
          <table class="table text-center">
            <thead>
              <tr>
                <th>&nbsp;</th>
                <th class="text-center">Biaya</th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <td>Total Biaya</td>
                <td class="bg-light"><?php echo $totalbiaya; ?></td>
              </tr>
              <tr>
                <td>Pajak</td>
                <td class="bg-light"><?php echo $totalbiaya * 10 / 100;?></td>
              </tr>
              <tr></tr>
              <tr>
                <td></td>
                <td class="bg-light">
                  <h1><?php echo ($totalbiaya + ($totalbiaya * 10 / 100));?></h1>
                </td>
                <td></td>
              </tr>
              <tr>
                <td> </td>
                <td>
                  <a  href="#modal-booking" data-toggle="modal" data-target="#modal-booking" class="btn btn-outline-primary text-primary btn-lg btn-block">Booking</a>
                </td>
                <td>
                  <a href="#" class="btn btn-primary btn-lg text-light btn-block">Batal</a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
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
  <div class="modal fade" id="modal-booking">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <form class="" action="<?php echo base_url();?>beranda/BookingHandler" method="POST" enctype="multipart/form-data">
          <div class="modal-header">
            <h5 class="modal-title">Waktu Pemakaian</h5>
            <button type="button" class="close" data-dismiss="modal">
              <span>×</span>
            </button>
          </div>
          <div class="modal-body">
              <div class="form-group">
                <input type="hidden" class="form-control" name="totalbiaya" value="<?php echo ($totalbiaya + ($totalbiaya * 10 / 100));?>">
              </div>
              <div class="form-group">
                <label>Waktu Mulai</label>
                <input type="date" class="form-control" name="waktupakai" required=""> </div>
              <div class="form-group">
                <label>Waktu Selesai</label>
                <input type="date" class="form-control" name="waktuselesai" required=""> </div>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
            <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
          </div>

        </form>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>