
  <div class="py-5">
    <div class="container">
      <div class="row">
        <div class="col-md-3"> </div>
        <div class="col-md-6">
          <div class="card text-dark p-3">
            <div class="card-body">
              <h1 class="mb-4">Pendaftaran</h1>
              <form  action="<?php echo base_url();?>beranda/RegisterHandler" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                  <label>Username</label>
                  <input type="text" class="form-control" placeholder="Username" required="required" name="iduser"> </div>
                <div class="form-group">
                  <label>Password</label>
                  <input type="password" class="form-control" placeholder="Password" required="required" name="password"> </div>
                <div class="form-group">
                  <label>Nama lengkap</label>
                  <input type="text" class="form-control" placeholder="Nama lengkap" required="required" name="namalengkap"> </div>
                <div class="form-group">
                  <label>Email</label>
                  <input type="email" class="form-control" placeholder="Email" required="required" name="email"> </div>
                <div class="form-group">
                  <label>Alamat</label>
                  <input type="text" class="form-control" placeholder="Alamat" required="required" name="alamat"> </div>
                <div class="form-group">
                  <label>No Telepon</label>
                  <input type="text" class="form-control" placeholder="No Telepon" required="required" name="notelp"> </div>
                <button type="submit" class="btn btn-secondary my-2">Login</button>
              </form>
            </div>
          </div>
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
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>