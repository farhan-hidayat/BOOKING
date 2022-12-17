  <div class="container">
  	<div class="jumbotron text-center bg-transparent margin-none">
  		<h1>Daftar Jadwal Lapangan Vigor Pontianak</h1>
  		<p></p>
  	</div>
  	<div class="page-section">
  		<div class="row">
  			<div class="col-md-12 col-lg-12">
  				<h4 class="page-section-heading"> DAFTAR JADWAL FUTSAL VIGOR </h4>
  				<a href="?p=keranjang-boking"><button class="btn btn-success"><i class="icon-plus"></i> &nbsp; Booking Lapangan</button></a>
  				</br>
  				</br>
  				<div class="panel panel-default">
  					<!-- Data table -->
  					<table data-toggle="data-table" class="table" cellspacing="0" width="100%">
  						<thead>
  							<tr>
  								<th>No</th>
  								<th>Tgl.Jadwal</th>
  								<th>Nomor Lapangan </th>
  								<th>Jam </th>
  								<th>Harga</th>
  								<th>Status</th>

  							</tr>
  						</thead>
  						<tfoot>
  							<th>No</th>
  							<th>Tgl.Jadwal</th>
  							<th>Nomor Lapangan </th>
  							<th>Jam </th>
  							<th>Harga</th>
  							<th>Status</th>
  						</tfoot>
  						<tbody>
  							<?php
								$no = 1;
								$tglSekarang = date("Ymd");
								$SQL = "SELECT * FROM trincian_boking,tjadwal,tlapangan WHERE 
										  trincian_boking.noLapangan=tlapangan.kdLapangan AND trincian_boking.kdJadwal=tjadwal.kdJadwal AND tjadwal.tglJadwal > '$tglSekarang' ORDER BY 
										  trincian_boking.tglBoking ASC ";
								$ExecuteQuery = mysqli_query($GLOBALS["___mysqli_ston"], $SQL) or die(mysqli_error($GLOBALS["___mysqli_ston"]));

								if ($no % 2 == 1) {
									$class = "odd gradeX";
								} else {
									$class = "even gradeC";
								}
								while ($_data = mysqli_fetch_array($ExecuteQuery)) {
									$tglJadwal = region($_data['tglBoking']);
									$harga = idr_f($_data['hargaBoking']);

									echo "
										<tr class=$class>
                                            <td>$no</td>
											<td>$tglJadwal</td>
                                            <td>$_data[noLapangan]</td>
                                            <td>$_data[jamBoking]</td>
											<td>$harga</td>
                                            <td>";
									if ($_data['statusBoking'] == "B") {
										echo "<label class='label label-danger'>Sudah Diboking</label>";
									} elseif ($_data['statusBoking'] == "R") {
										echo "
													<label class='label label-success'>Tersedia</label>
													";
									}


									echo "
											</td>
											
							        </tr>
                                        
										
										";
									$no++;
								}
								?>


  						</tbody>
  					</table>
  					<!-- // Data table -->
  				</div>
  			</div>
  		</div>
  	</div>
  </div>