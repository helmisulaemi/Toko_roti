<?php
	class oop{
		function simpan($table,array $field,$alamat){
			$sql = "INSERT INTO $table SET";
			foreach($field as $key => $value){
				$sql .=" $key = '$value' ,";
			}
			$sql = rtrim($sql,',');
			$jalan = mysql_query($sql);
			if($jalan){
				echo "<script>alert('Data berhasil disimpan');document.location.href='$alamat'</script>";
			} else {
				echo mysql_error();
			}
		}
		
		function update($table, array $field, $where, $alamat){
			$sql = "UPDATE $table SET";
			foreach($field as $key => $value){
				$sql .=" $key = '$value',";
			}
			$sql = rtrim($sql,',');
			$sql.="WHERE $where";
			$jalan = mysql_query($sql);
			if($jalan){
				echo "<script>alert('Data berhasil diupdate');document.location.href='$alamat'</script>";
			} else {
				echo mysql_error();
			}
		}
		
		function tampil($table){
			$sql = "SELECT * FROM $table";
			$tampil = mysql_query($sql);
			while($data = mysql_fetch_array($tampil))
				$isi[] = $data;
			return @$isi;
		}
		
		function edit($table,$where){
			$sql = "SELECT * FROM $table WHERE $where";
			$data = mysql_fetch_array(mysql_query($sql));
			return $data;
		}
		
		function hapus($table,$where,$alamat){
			$sql = "DELETE FROM $table WHERE $where";
			$jalan = mysql_query($sql);
			if($jalan){
				echo "<script>alert('Data berhasil dihapus');document.location.href='$alamat'</script>";
			} else {
				echo mysql_error();
			}
		}
		
		function login($table,$username,$password,$nama_form,$refresh){
			@session_start();
			$sql = "SELECT * FROM $table WHERE username = '$username' and password = '$password' ";
			$jalan = mysql_query($sql);
			$tampil = mysql_fetch_array($jalan);
			$cek = mysql_num_rows($jalan);
				if($cek > 0){
			  		$_SESSION['username'] = $username;
			  		echo "<script>alert('Semalat Datang $username');document.location.href='$nama_form'</script>";
		  		} else {
			 		 echo "<script>alert('Login gagal cek username dan password !!!');document.location.href='$refresh'</script>";
		  		}
				
		}
		
		function upload($foto,$tempat){
			$alamat = $foto['tmp_name'];
		  	$namafile = $foto['name'];
		  	move_uploaded_file($alamat, "$tempat/$namafile");
		  	return $namafile;
		}
	}
?>