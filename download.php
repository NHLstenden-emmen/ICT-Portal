<?php 
$id = $_GET['vak'];
include('inc/mysql.php');
$DB = new MySQL();

$result = $DB->Get("SELECT vak, moduleboek FROM vakken WHERE vak_id = '$id'");
$download = $result->fetch_assoc();

$bin = $download['moduleboek'];

$bestand = $download['vak'].' - moduleboek.pdf';


header('Content-type: application/x-download');
header('Content-Disposition: attachment; filename="'.$bestand.'"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: '.strlen($bin));
set_time_limit(0);
echo $bin;
exit;
?>