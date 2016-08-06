<?php
// Koneksi Ke DAtabase
$server = "127.0.0.1";
$user = "root";
$password = "";
$db = "AMD";

$koneksi = mysql_connect($server, $user, $password)or die("error gan") ;
$db = mysql_select_db($db);

// Kumpulan fungsi strandard
define('br', '<br />');
?>
