<?php
	@session_start();
	include "config/koneksi.php";
	@$sql = mysql_query("SELECT * FROM tbl_pembeli where nama_pengguna = '$_POST[username]'");
	@$cek = mysql_num_rows($sql);
	@$cari_kd = mysql_query("SELECT max(kd_pembeli)as kode from tbl_pembeli");
	@$tm_cari = mysql_fetch_array($cari_kd);
	@$kode = substr($tm_cari['kode'],6,3);
	@$tambah = $kode+1;
	if($tambah < 10){
		$id = "PB516000".$tambah;
	} elseif($tambah < 100){
		$id = "PB51600".$tambah;
	} elseif($tambah < 1000) {
		$id = "PB5160".$tambah;
	} else {
		$id = "PB516".$tambah;
	}
@$table = "tbl_pembeli";
@$field = array('kd_pembeli'=>$id,
			   'nama'=>$_POST['nama'],
			   'alamat'=>$_POST['alamat'],
			   'jk'=>$_POST['jk'],
			   'kota'=>$_POST['kota'],
			   'no_hp'=>$_POST['nohp'],
			   'kode_pos'=>$_POST['kode_pos'],
			   'nama_pengguna'=>$_POST['username'],
			   'password'=>$_POST['password'],
			   'status'=>'0',
			   'tingkatan'=>'2',
			   );
@$alamat = "index.php?menu=login";
	if(isset($_POST['submit'])){
		if($cek>0){
			echo "<script>alert('Register Gagal Silahkan gunakan username yang lain !!!');document.location.href='index.php?menu=register'</script>";
		}else{
		$perintah->simpan($table,$field,$alamat);
		}
	}
?>