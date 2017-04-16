<?php
$tgl = date('d - F - Y');
$tgl_masuk = date('Y-m-d');
?>
<div class="alert alert-warning" role="alert">
	<a href=""><span class="glyphicon glyphicon-home"></span> Home</a> 
 			   <i class="icon-angle-right"></i>  Laporan 
  			   <i class="icon-angle-right"></i>  Data Laporan
               <div class="right">
	<?php echo $tgl ?>,      <span id="clock"></span>
</div>
</div>  
<script type="text/javascript">
    var detik = <?php echo date('s'); ?>;
    var menit = <?php echo date('i'); ?>;
    var jam   = <?php echo date('H'); ?>;
</script>
<script src="../../style/js/clock.js"></script>

	<h2>Data Laporan</h2>
    <hr>
    <form method="post">
    	<table class="table">
    		<tr>
            	<td align="center">Pilih Laporan</td>
                <td>:</td>
                <td>
                <select name="pilih" class="form-control" required>
                	<option value=""></option>
                	<option value="dataroti">Laporan Data Roti</option>
                    <option value="stockhabis">Laporan Stock Habis</option>
                	<option value="datamasuk">Laporan Barang Masuk</option>
                    <option value="penghasilan">Laporan Penghasilan</option>
                </select>
                </td>
                <td><input type="submit" name="lihat" value="LIHAT LAPORAN" class="btn btn-warning"></td>
            </tr>
    	</table>
    </form>
    <?php
    	if(isset($_POST['lihat'])){
			if($_POST['pilih']=='dataroti'){
				echo "<script>document.location.href='laporan_data_roti.php?menu=laporandataroti'</script>";
			} elseif($_POST['pilih']=='datamasuk'){
				echo "<script>document.location.href='laporan_barang_masuk.php?menu=laporandatamasuk'</script>";
			} elseif($_POST['pilih']=='stockhabis'){
				 echo "<script>document.location.href='laporan_stock_habis.php?menu=laporanstockhabis'</script>";
			} else {
				echo "<script>document.location.href='?menu=lapdata&laporanpenghasilan=penghasilan'</script>";
			}	
		}
		
		echo @$bln;
		if(!empty($_GET['laporanpenghasilan'])){
	?>
    <form method="post">
    	<table class="table" style="width:87%">
        	<tr>
            	<td align="center">Pilih Bulan</td>
                <td>:</td>
                <td><select name="bulan" class="form-control" required>
                		<option value=""></option>
                        <?php
                        	$sql = mysql_query("select tgl_transaksi from qw_transaksi where pembayaran = 'Sudah Bayar' Group BY month(tgl_transaksi)");
							while($dtgl = mysql_fetch_array($sql)){
							$tgl = substr($dtgl[0],5,2);
		if($tgl == '01'){
			$bln = "Januari";
		}elseif($tgl == '02'){
			$bln = "Februari";
		}elseif($tgl == '03'){
			$bln = "Maret";
		}elseif($tgl == '04'){
			$bln = "April";
		}elseif($tgl == '05'){
			$bln = "Mei";
		}elseif($tgl == '06'){
			$bln = "Juni";
		}elseif($tgl == '07'){
			$bln = "Juli";
		}elseif($tgl == '08'){
			$bln = "Agustus";
		}elseif($tgl == '09'){
			$bln = "September";
		}elseif($tgl == '10'){
			$bln = "Oktober";
		}elseif($tgl == '11'){
			$bln = "November";
		}elseif($tgl == '12'){
			$bln = "Desembser";
		}
						?>
                        <option value="<?php echo $tgl ?>"><?php echo $bln ?></option>
                     <?php } ?>  
                    </select>
                </td>
                <td><input type="submit" name="tampil" value="TAMPILKAN" class="btn btn-warning" /></td>
            </tr>
        </table>
    </form>
	<?php } 
		if(isset($_POST['tampil'])){
			echo "<script>document.location.href='laporan_penghasilan.php?menu=laporan&bulan=$_POST[bulan]'</script>";
		}
	?>