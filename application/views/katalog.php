
  <div class="py-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3 p-3">
          <form class="p-3 shadowed" action="<?php echo base_url();?>beranda/katalog" method="GET">
            <div class="form-group">
              <label>Pencarian</label>
              <input type="text" class="form-control" placeholder="Nama" name="nama"> </div>
              <br>
            <!-- <div class="form-group">
              <label>Waktu</label>
            </div>
            <div class="form-group m-3">
              <label for="exampleInputEmail1">Dari</label>
              <input type="date" class="form-control" id="inlineFormInput" placeholder="Jane Doe"> </div> -->
            <!-- <div class="form-group m-3">
              <label for="exampleInputEmail1">Sampai</label>
              <input type="date" class="form-control" id="inlineFormInput" placeholder="Jane Doe"> </div> -->
            <button type="submit" class="btn btn-primary btn-block">
              <i class="fa fa-fw fa-search"></i>&nbsp;Cari</button>
          </form>
        </div>
        <div class="col-md-9">
          <h1 class="display-3 text-primary text-left">Katalog</h1>
          <div class="row my-3">

            <?php $i = 1; foreach ($get_all_katalog->result() as $key) { ?>
            <div class="col-md-3 align-self-center p-2">
              <div id="carousel<?php echo $i;?>" class="carousel slide" data-ride="carousel<?php echo $i;?>" >
                <?php 
                    $gbr = explode("|", $key->gambar); 
                    $gbr1 = explode("|", $key->gambar1); 
                    ?>
                      <div class="carousel-inner">
                        <?php for ($c=0; $c < count($gbr); $c++) { ?>
                            <div class="carousel-item <?php echo $c == 0 ? 'active':'';?>">
                              <img class="d-block img-fluid w-100" src="<?php echo base_url();?>assets/img/katalog/<?php echo $gbr[$c];?>">
                            </div>
                        <?php }; ?>

                        <?php for ($d=0; $d < count($gbr1); $d++) { ?>
                            <div class="carousel-item">
                              <img class="d-block img-fluid w-100" src="<?php echo base_url();?>assets/img/katalog/<?php echo $gbr1[$d];?>">
                            </div>
                        <?php }; ?>
                      </div>
                <a class="carousel-control-prev" href="#carousel<?php echo $i;?>" role="button" data-slide="prev">
                  <span class="carousel-control-prev-icon"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carousel<?php echo $i;?>" role="button" data-slide="next">
                  <span class="carousel-control-next-icon"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
              <h3 class="my-3"><?php echo $key->nama; ?></h3>
              <h4 class="btn btn-outline-primary"><?php echo $key->harga." / "; ?> <?php echo $key->satuan == 0 ? "Per Hari" : "Per Hari"; ?> </h4><br>
              <h6 class="btn btn-dark">Kapasitas <?php echo $key->kapasitas;?></h6><br>
              <p class=""><?php echo $key->deskripsi; ?></p><br>
              <div
                class="row">
                <div class="col-md-12">
                  <button 
                    onclick="javascript:addkeranjang(
                    '<?php echo $key->id;?>&<?php echo $key->nama;?>,<?php echo $key->harga;?>,<?php echo $key->deskripsi;?>,<?php echo $key->kapasitas;?>,<?php echo $key->tipe;?>,<?php echo $key->gambar;?>,<?php echo $key->gambar1;?>');" class="btn btn-primary btn-sm btn-block">Pesan</button>
                </div>
              </div>
            </div>
        <?php $i++; } ?>
          <div id="msg" ></div>
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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
    function addkeranjang(data)
    {
        var datas = data.split("&")
        $.ajax({
            url:"<?php echo base_url(); ?>beranda/AddKeranjangHandler",
            type:"POST",
            dataType:"JSON",
            data: { id: datas[0], detail: datas[1] },
            success: function(data)
            {
                if(data.status)
                {
                    $('#msg').html("<div style='position: fixed;bottom: 10px;right: 1%;' class='alert alert-success alert-dismissible fade show' role='alert'>"+data.msg+"</div>");
                    $("#msg").fadeTo(2000, 500).slideUp(500, function() {
                        $("#msg").slideUp(500);
                    });
                }
            }
        })
    }
</script>
</body>

</html>