<?php
include "../config/koneksi.php";

session_start();
	mysql_query("UPDATE tbl_pembeli set status = '0' where nama_pengguna = '$_SESSION[nama_pengguna]'");
	mysql_query("DELETE FROM tbl_barang_keluar where id_session = '$_SESSION[nama_pengguna]' and status ='1'");
session_destroy();
echo "<script>alert('Logout Telah Berhasil');document.location.href='../'</script>";
?>