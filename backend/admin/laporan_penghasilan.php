<?php
include "../../config/koneksi.php";
?>
<!DOCTYPE html>
<html>
	<head>
    	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
        <title>LAPORAN PENGHASILAN</title>
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
                <td width="93%"><strong>&nbsp;Laporan Penghasilan</strong></td>
            </tr>
            <tr>
            	<td valign="top">&nbsp;Toko Roti Sari Sari </td>
            </tr>
            <tr>
            	<td valign="top">&nbsp;Jl.Raya Sukasari Bogor Jawa Barat </td>
            </tr>
      	</table>
        <table width="100%">
        	<tr><td><hr></td></tr>
        </table>
        <?php
        	if($_GET['bulan'] == '01'){
			$bln = "Januari";
		}elseif($_GET['bulan'] == '02'){
			$bln = "Februari";
		}elseif($_GET['bulan'] == '03'){
			$bln = "Maret";
		}elseif($_GET['bulan'] == '04'){
			$bln = "April";
		}elseif($_GET['bulan'] == '05'){
			$bln = "Mei";
		}elseif($_GET['bulan'] == '06'){
			$bln = "Juni";
		}elseif($_GET['bulan'] == '07'){
			$bln = "Juli";
		}elseif($_GET['bulan'] == '08'){
			$bln = "Agustus";
		}elseif($_GET['bulan'] == '09'){
			$bln = "September";
		}elseif($_GET['bulan'] == '10'){
			$bln = "Oktober";
		}elseif($_GET['bulan'] == '11'){
			$bln = "November";
		}elseif($_GET['bulan'] == '12'){
			$bln = "Desembser";
		}
		?>
        <table width="95%" align="center">
        	<tr><td>Bulan : <?php echo $bln;?></td></tr>
        </table>
        <table cellspacing="1" border="1" align="center" width="95%">
        	<tr align="center">
            	<td>No</td>
                <td>Kode Barang</td>
                <td>Nama Pembeli</td>
                <td>Total</td>
            </tr>
            <?php
				$no = 0;
            	$sql = mysql_query("SELECT * FROM  qw_transaksi where pembayaran='Sudah Bayar' and month(tgl_transaksi)='$_GET[bulan]'");
				while($data = mysql_fetch_array($sql)){
					$no++;
			?>
            <tr align="center">
            	<td><?php echo $no ?></td>
                <td><?php echo $data[0] ?></td>
                <td align="left" class="geser"><?php echo $data[2] ?></td>
                <td align="left" class="geser"><?php $ongkir = mysql_fetch_array(mysql_query("Select ongkos from tbl_ongkir where kota = '$data[5]'"));echo"Rp. ".number_format($data['total']+$ongkir['ongkos'],0,",",".")?></td>
            </tr>
            <?php } 
				$hit = mysql_query("select kd_transaksi,sum(total+$ongkir[ongkos])as penghasilan from qw_transaksi where pembayaran='Sudah Bayar' and month(tgl_transaksi)='$_GET[bulan]'");
				$total = mysql_fetch_array($hit);
			?>
            <tr align="center">
            	
                <td colspan="3" >Total</td>
                <td align="left" class="geser"><?php echo"Rp. ".number_format($total['penghasilan'],0,",",".")?></td>
            </tr>
        </table>
    <br>
   </div>
  </body>
  <center><p>&copy; <?php echo date('Y'); ?> TOKO SARI SARI </p></center>
 </html> 