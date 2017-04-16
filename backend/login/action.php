<?php
@session_start();

include "../../config/koneksi.php";
include "../../page/controllers.php";


$perintah = new oop();

$username = $_POST['username'];
$password = $_POST['password'];

if(isset($_POST['login'])){
	
	if($_POST['tt']=="mn"){
		$perintah->login("tbl_admin",$username,$password,"admin/index.php?menu=tambahbr");
	}else{
		$perintah->login("tbl_manager",$username,$password,"manager");
	}
}
?>