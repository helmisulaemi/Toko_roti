<?php
include "../../config/koneksi.php";
?>
<!DOCTYPE html>
<html>
	<head>
    	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>LAPORAN DATA STOCK HABIS</title>
    </head>
    
    <body>
    	<style>
        	.utama{
				margin:0 auto;
				border:thin solid #000;
				width:700px;
			}
			.print{
				margin:0 auto;
				width:700px;
			}
			a{
				text-decoration:none;
			}
			.geser{
				padding-left:5px;
			}
        </style>
    <div class="print">
        <a href="#" onClick="document.getElementById('print').style.display='none';window.print();">
        	<img src="foto/print-icon.png" id="print" width="25" height="25" border="0" /></a>
    </div>
    <div class="utama">
    	<table width="98%" border="0" cellspacing="0" cellpadding="0" align="center" style="margin-top:10px;">
       		<tr>
            	<td width="7%" rowspan="3" align="center" valign="top">
                	<img src="foto/golden-wheat-vector2.jpg" width="55" height="55" />
                </td>
                <td width="93%"><strong>&nbsp;Laporan Data Stock Habis</strong></td>
            </tr>
            <tr>
            	<td valign="top">&nbsp;Toko Roti Sari Sari  </td>
            </tr>
            <tr>
            	<td valign="top">&nbsp;Jl.Raya Sukasari Bogor Jawa Barat </td>
            </tr>
      	</table>
        <table width="100%">
        	<tr><td><hr></td></tr>
        </table>
        <table cellspacing="1" border="1" align="center" width="95%">
        	<tr align="center">
            	<td>No</td>
                <td>Kode Barang</td>
                <td>Nama Barang</td>
                <td>Jenis Barang</td>
                <td>Stock</td>
                <td>Tanggal Kadaluarsa</td>
            </tr>
            <?php
				$no = 0;
            	$sql = mysql_query("SELECT * FROM qw_barang where stock = '' ORDER BY kd_barang ASC");
				while($data = mysql_fetch_array($sql)){
					$no++;
			?>
            <tr align="center">
            	<td><?php echo $no ?></td>
                <td><?php echo $data[0] ?></td>
                <td align="left" class="geser"><?php echo $data[2] ?></td>
                <td align="left" class="geser"><?php echo $data[9] ?></td>
                <td><?php echo $data[5] ?></td>
                <td ><?php echo $data[7] ?></td>
            </tr>
            <?php } ?>
        </table>
    <br>
   </div>
  </body>
  <center><p>&copy; <?php echo date('Y'); ?> TOKO SARI SARI </p></center>
 </html>