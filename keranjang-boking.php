  <div class="container">
    <div class="jumbotron text-center bg-transparent margin-none">
      <h1>KERANJANG BOKING ANDA</h1>
      <p></p>
    </div>
    <div class="page-section">
      <div class="row">
        <div class="col-md-12 col-lg-12">
          <h4 class="page-section-heading"> DAFTAR RINCIAN KERANJANG BOKING</h4>
          <div class="panel panel-default">
            <!-- Data table -->
            <table class="table">
              <tbody>
                <form action="prosesBoking.php?p=boking&action=tambah-boking" method="POST" enctype="multipart/form-data">
                  <tr>
                    <td colspan="6" align="left">
                      <?php
                      $query = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT MAX(noInvoice) As noInvoice FROM tboking");
                      $kode = mysqli_fetch_array($query);
                      $kodeJadi = $kode["noInvoice"];
                      $noOrder = (int)substr($kodeJadi, 4, 6);
                      $noOrder++;
                      $char = "INV-";
                      $newID = $char . sprintf("%06s", $noOrder);
                      echo "<label class='label label-danger'><h5><font color='#FFFFFF'>INVOICE : <strong># $newID </font></strong></h5></label>";
                      ?>

                    </td>
                  </tr>
                  <tr>
                    <th>Tgl Jadwal</th>
                    <th>Nomor Lapangan</th>
                    <th>Jam</th>
                    <th>Harga</th>
                  </tr>
                  <tr>
                    <td> <input type="date" data-date-format="dd-mm-yyyy" class="span11" name="jadwal">
                    </td>
                    <td><select name="lapangan" id="lapangan">
                        <option>-- Pilih Nomor Lapangan --</option>
                        <?php
                        $lapangan = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tlapangan ORDER BY noLapangan ASC");
                        while ($lap = mysqli_fetch_array($lapangan)) {
                          echo "<option data-harga='$lap[harga]' value='$lap[kdLapangan]'>$lap[noLapangan]</option>";
                        }
                        ?>
                      </select>
                    </td>
                    <td><select name="jam">
                        <option>-- Pilih Jam Operasional--</option>
                        <?php
                        $jam = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tjam ORDER BY jam ASC");
                        while ($j = mysqli_fetch_array($jam)) {
                          echo "<option value='$j[jam]'>$j[jam]</option>";
                        }
                        ?>
                      </select>
                    </td>
                    <td><span id="harga">0</span></td>
                  </tr>

                  <tr>
                    <td colspan="4" align="right">
                      <button type="submit" class="btn btn-success">Lanjutkan Transaksi</button>
                    </td>
                  </tr>
                </form>
              </tbody>
            </table>


          </div>
        </div>
      </div>
    </div>
  </div>