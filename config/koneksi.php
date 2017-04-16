<?php
$host	  = "localhost";
$user	  = "root";
$pass 	  = "";
$database = "db_roti";

	mysql_connect($host,$user,$pass) or die ("Tidak tersambung ke Server");
	mysql_select_db($database) or die ("Database tidak ditemukan");
?>