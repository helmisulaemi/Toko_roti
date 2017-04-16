
<?php 
@session_start();

@$username = $_POST['username'];
@$password = $_POST['password'];
@$nama_form = "index.php";

	if(isset($_POST['login'])){
			$sql = "SELECT * FROM tbl_pembeli WHERE nama_pengguna = '$username' and password = '$password'";
			$jalan = mysql_query($sql);
			$tampil = mysql_fetch_array($jalan);
			$cek = mysql_num_rows($jalan);
				if($cek > 0){
			  		$_SESSION['nama_pengguna'] = $username;
					$_SESSION['kd_pembeli'] = $tampil['kd_pembeli'];
					$_SESSION['kota'] = $tampil['kota'];
			  		echo "<script>alert('Semalat Datang $username');document.location.href='$nama_form'</script>";
					mysql_query("UPDATE tbl_pembeli set status = '1' where nama_pengguna = '$username'");
		  		} else {
			 		 echo "<script>alert('Login gagal cek username dan password !!!');</script>";
		  		}
		
	}
?>