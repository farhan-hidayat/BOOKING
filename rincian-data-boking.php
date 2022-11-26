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
                                        <div class="form-group form-control-material">
                                            <input type="text" class="form-control" name="txtNmLengkap"  placeholder="Nama Lengkap">
                                            <label>Nama Lengkap</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-control-material">
                                            <input type="email" class="form-control" name="txtEmail"  placeholder="Your last name">
                                            <label>Email</label>
                                        </div>
                                    </div>
                                     <div class="col-md-6">
                                        <div class="form-group form-control-material">
                                            <input type="text" class="form-control" name="txtKontak"  placeholder="Nama Lengkap">
                                            <label>No.Hp/Telpon</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group form-control-material">
                                            <input type="text" name="txtAlamat" class="form-control" placeholder="Alamat">
                                            <label>Alamat</label>
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

        