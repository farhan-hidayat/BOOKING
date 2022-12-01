  <div id="content-header">
    <div id="breadcrumb"> <a href="index.html" title="Go to Home" class="tip-bottom"><i class="icon-home"></i> Home</a></div>
  </div>
  <!--End-breadcrumbs-->

  <!--Action boxes-->
  <div class="container-fluid">
    <div class="quick-actions_homepage">
      <ul class="quick-actions">
        <li class="bg_lb"> <a href="?load=dashboard"> <i class="icon-dashboard"></i> My Dashboard </a> </li>
        <li class="bg_lg"> <a href="?load=pengguna"> <i class="icon-signal"></i> Module Pengguna</a> </li>
        <li class="bg_lg"> <a href="?load=jadwal"> <i class="icon-signal"></i> Module Jadwal</a> </li>
        <li class="bg_ly"> <a href="?load=lapangan"> <i class="icon-inbox"></i> Module Lapangan </a> </li>
        <li class="bg_lo"> <a href="?load=member"> <i class="icon-th"></i> Module Member</a> </li>
        <li class="bg_ls"> <a href="?load=boking"> <i class="icon-fullscreen"></i> Module Boking</a> </li>
        <li class="bg_lo"> <a href="#"> <i class="icon-th-list"></i> <span class="label label-important">
              <?php
              $totInvoice = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tboking");
              $tot = mysqli_num_rows($totInvoice);
              echo "$tot";
              ?>
            </span>Total Invoice</a> </li>
        <li class="bg_ls"> <a href="#"> <i class="icon-tint"></i><span class="label label-important">
              <?php
              $totInvoiceLunas = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tboking WHERE statusBayar='L'");
              $totL = mysqli_num_rows($totInvoiceLunas);
              echo "$totL";
              ?>
            </span> Total Invoice Lunas</a> </li>
        <li class="bg_lb"> <a href="#"> <i class="icon-pencil"></i><span class="label label-important">
              <?php
              $totInvoiceB = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tboking WHERE statusBayar='B'");
              $totB = mysqli_num_rows($totInvoiceB);
              echo "$totB";
              ?>
            </span>Total Invoice Belum Lunas</a> </li>
        <li class="bg_lg"> <a href="#"> <i class="icon-calendar"></i><span class="label label-important">
              <?php
              $totMember = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tmember");
              $totM = mysqli_num_rows($totMember);
              echo "$totM";
              ?>
            </span> Total member</a> </li>
        <li class="bg_lr"> <a href="#"> <i class="icon-info-sign"></i> <span class="label label-important">
              <?php
              $tgl = date("Ymd");
              $totJadwal = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tjadwal WHERE tglJadwal='$tgl' ");
              $totJ = mysqli_num_rows($totJadwal);
              echo "$totJ";
              ?>
            </span>Total Jadwal Hari Ini</a> </li>

      </ul>
    </div>
    <!--End-Action boxes-->

    <!--Chart-box-->

    <!--End-Chart-box-->
    <hr />
    <div class="row-fluid">
      <div class="span12">
        <div class="widget-box">
          <div class="widget-title"> <span class="icon"><i class="icon-th"></i></span>
            <h5>Semua Data Boking</h5>
          </div>
          <div class="widget-content nopadding">
            <table class="table table-bordered data-table">
              <thead>
                <tr>
                  <th>#</th>
                  <th>No.Invoice</th>
                  <th>Tgl Invoice</th>
                  <th>Atas Nama</th>
                  <th>Kontak</th>
                  <th>Total Bayar</th>
                  <th>Status Bayar</th>

                </tr>
              </thead>
              <tbody>
                <?php
                $SQL = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM tboking  ORDER BY noInvoice ASC");
                $no = 1;
                while ($_data = mysqli_fetch_array($SQL)) {
                  $tglInvoice = region($_data['tglInvoice']);
                  $total = idr_f($_data['totalBayar']);
                  if ($no % 2 == 1) {
                    $class = "gradeU";
                  } else {
                    $class = "gradeX";
                  }

                  echo "
				  <tr class='$class'>
                  <td>$no</td>
				  <td>$_data[noInvoice]</td>
				  <td>$tglInvoice</td>
				  <td>$_data[an]</td>
				  <td>$_data[kontak]</td>
				  <td>$total</td>
				  <td>";
                  if ($_data['statusBayar'] == "L") {
                    echo "Lunas";
                  } elseif ($_data['statusBayar'] == "B") {
                    echo "Belum Lunas";
                  } else {
                    echo "DP";
                  }

                  echo "</td>
				 
                  
                       </tr> 
				   
				   ";


                  $no++;
                }
                ?>


              </tbody>
              <tfoot>
                <th colspan="2">Total</th>
                <th colspan="2"><?php $lunas = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(totalbayar) as lunas FROM tboking where statusbayar='L' ORDER BY noInvoice ASC");
                                $data_lunas = mysqli_fetch_array($lunas);
                                $hasil = idr_f($data_lunas['lunas']);
                                if ($no % 2 == 1) {
                                  $class = "gradeU";
                                } else {
                                  $class = "gradeX";
                                }
                                echo $hasil ?> (Lunas)</th>
                <th colspan="2"><?php $galbay = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(totalbayar) as galbay FROM tboking where statusbayar='B' ORDER BY noInvoice ASC");
                                $data_galbay = mysqli_fetch_array($galbay);
                                $hasil2 = idr_f($data_galbay['galbay']);
                                if ($no % 2 == 1) {
                                  $class = "gradeU";
                                } else {
                                  $class = "gradeX";
                                }
                                echo $hasil2 ?> (Belum Lunas)</th>
                <th><?php $dp = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT sum(totalbayar) as dp FROM tboking where statusbayar='D' ORDER BY noInvoice ASC");
                    $data_dp = mysqli_fetch_array($dp);
                    $ddp = $data_dp['dp'] / 2;
                    $hasil3 = idr_f($ddp);
                    if ($no % 2 == 1) {
                      $class = "gradeU";
                    } else {
                      $class = "gradeX";
                    }
                    echo $hasil3 ?> (DP)</th>
              </tfoot>
            </table>
          </div>
        </div>




      </div>
    </div>

    <!--end-Footer-part-->
    <script src="js/jquery.min.js"></script>
    <script src="js/jquery.ui.custom.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/jquery.uniform.js"></script>
    <script src="js/select2.min.js"></script>
    <script src="js/jquery.dataTables.min.js"></script>
    <script src="js/matrix.js"></script>
    <script src="js/matrix.tables.js"></script>