<?
$id_lapangan = $_POST['lapangan'];

$jam = mysqli_query($GLOBALS["___mysqli_ston"], "SELECT * FROM trincian_booking where kdlapangan='" . $id_lapangan . "' ORDER BY noLapangan ASC");

$html = "<option>-- Pilih Jam Operasional--</option>";
while ($j = mysqli_fetch_array($jam)) {
    $html .= "<option value='$j[kdRincianBooking]'>$j[jam]</option>";
}

$callback = array('jam' => $html);
echo json_encode($callback);
