<!doctype html>
<html>
	<head>
	<meta charset="utf-8">
	<title>Dasboard - Admin </title>

	</head>
	
    <link rel="stylesheet" href="../../style/css/bootstrap.css">
    <link rel="stylesheet" href="../../style/css/bootstrap-theme.css">
    <link rel="stylesheet" href="../../style/css/style.css">
    <link rel="stylesheet" href="../../style/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../../style/css/sb-admin.css">
    
    <?php
		date_default_timezone_set('Asia/Jakarta');
		@session_start();
		
		include "../../config/koneksi.php";
		include "../../page/controllers.php";
		$perintah = new oop();
		
    	@$tampil = mysql_fetch_array(mysql_query("SELECT * FROM tbl_admin WHERE username = '$_SESSION[username]'"));
		
		if(empty($_SESSION['username'])){
			echo"<script>alert('Akses Dilarang !!');document.location.href='../'</script>";
			exit();	
		}
	?>
<body>
<div class="strip-orange navbar-fixed-top"></div>
	<aside>
    	<table class="table">
        	<tr>
            	<td><center><img src="foto/<?php echo $tampil['foto'] ?>" width="133" height="133"
                style="padding:3px;border:thin solid #CCC; border-radius:360px;background:#FFF;" ></center></td>
            </tr>
            <tr>
            	<td>Nama &nbsp;&nbsp;: <?php echo substr($tampil['nama'],0,16) ?> </td>
          </tr>
             <tr>
                <td>Status &nbsp;: Pengelola</td>
            </tr>
        </table>
	</aside>
    
	<?php include "sidebar.php"; ?>
    
    <section>
    	<?php
        	switch ($_GET['menu']){
				case "tambahbr";
				include "tambah_barang.php";
				break;
				
				case "brmasuk";
				include "barang_masuk.php";
				break;
				
				case "jenisbr";
				include "jenis_barang.php";
				break;
				
				case "listbr";
				include "list_produk.php";
				break;
				
				case "pelangganol";
				include "pelanggan_online.php";
				break;
				
				case "pelanggandt";
				include "pelanggan_data.php";
				break;
				
				case "ongkir";
				include "ongkir.php";
				break;
				
				case "inforekening";
				include "inforekening.php";
				break;
				
				case "transaksi";
				include "transaksi.php";
				break;
				
				case "transaksiterbayar";
				include "transaksi_terbayar.php";
				break;
				
				case "transaksiterbayar=details_transaksi";
				include "details_transaksi.php";
				break;
				case "transaksi=details_transaksi";
				include "details_transaksi.php";
				break;
				
				case "gantipsd";
				include "ganti_password.php";
				break;
				
				case "gantigbr";
				include "ganti_gambar.php";
				break;
				
				case "logout";
				include "logout.php";
				break;
				
				case "edtprdk";
				include "edit_produk.php";
				break;
				
				case "edtjnprdk";
				include "edit_jenis_produk.php";
				break;
				
				case "edtplgndt";
				include "edit_pelanggan_data.php";
				break;
				
				case "lapdata";
				include "laporan.php";
				break;
			}
		?>
    </section>
</body>
	<script src="../../style/js/jquery-1.9.1.js"></script>
	<script src="../../style/js/bootstrap.js" type="text/javascript"></script>
	<script src="../../style/js/jquery.js"></script>
    
</html>

