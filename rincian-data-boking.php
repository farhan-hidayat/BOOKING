  <div class="container">
      <div class="jumbotron text-center bg-transparent margin-none">
          <h1>RINCIAN INFORMASI ANDA</h1>
          <p></p>
      </div>
      <div class="page-section">
          <div class="row">
              <div class="col-md-12 col-lg-12">
                  <h4 class="page-section-heading"> Isilah Data Anda Dengan Lengkap dan Benar</h4>
                  <div class="panel panel-default">
                      <div class="panel-body">
                          <form action="prosesBoking.php?p=boking&action=selesai-boking" method="post" enctype="multipart/form-data">
                              <div class="row">
                                  <div class="col-md-6">
                                      <label>Nama Lengkap</label>
                                      <div class="form-group form-control-material">
                                          <input type="text" class="form-control" id="wiz-lusername" name="txtNmLengkap" placeholder="Nama Lengkap">
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <label>Email</label>
                                      <div class="form-group form-control-material">
                                          <input type="email" class="form-control" id="wiz-email" name="txtEmail" placeholder="Your last name">
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <label>No.Hp/Telpon</label>
                                      <div class="form-group form-control-material">
                                          <input type="number" class="form-control" id="wiz-nohp1" name="txtKontak" placeholder="Nama Lengkap">
                                      </div>
                                  </div>
                                  <div class="col-md-6">
                                      <label>Alamat</label>
                                      <div class="form-group form-control-material">
                                          <input type="text" name="txtAlamat" class="form-control" placeholder="Alamat">
                                      </div>
                                  </div>
                              </div>

                              <button type="submit" class="btn btn-primary">Selesai Boking</button>
                          </form>
                      </div>


                  </div>
              </div>
          </div>
      </div>
  </div>