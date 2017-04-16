<?php
$tgl = date('d - F - Y');
?>
<div class="alert alert-warning" role="alert">
	<a href=""><span class="glyphicon glyphicon-home"></span> Home</a> 
 			   <i class="icon-angle-right"></i>  Produk 
  			   <i class="icon-angle-right"></i>  Jenis Produk
               <i class="icon-angle-right"></i>  Data Jenis Produk
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

	<h2> Data Jenis Produk </h2>
    <hr>
     <form method="post">
      <table width="30%">
      		<tr>
    			<td><input type="text" name="cari" placeholder="Cari Kode Jenis atau Jenis" class="form-controll"/></td>
                <td><a href="index.php?menu=edtjnprdk" class="btn btn-warning"><i class="icon-refresh"></i></a></td>
            </tr>
     </table>
     </form><br />
	<table class="table table-striped">
    	<tr class="alert-warning" style="font-weight:bold;">
        	<td></td>
            <td>Kd_Jenis</td>
            <td>Jenis</td>
            <td>Aksi</td>
        </tr>
        <?php
		if(isset($_POST['cari'])){
			$cari = "where kd_jenis like '%$_POST[cari]%' or jenis like '%$_POST[cari]%'";
		}
		$no = 0; 
		@$a = $perintah->tampil("tbl_jenis $cari ORDER BY kd_jenis DESC");
		if($a == ''){
			echo "<tr><td colspan = '4' align='center'><strong>No Record</strong></td></tr>";
		} else {
			foreach($a as $data){
				$no++;
		?>
        <tr>
        	<td><?php echo $no ?></td>
            <td><?php echo $data[0] ?></td>
            <td><?php echo $data[1] ?></td>
            <td><div class="btn-group">
            		<a href="?menu=jenisbr&edit&id=<?php echo $data[0] ?>" class="btn btn-warning"><i class="icon-pencil"></i></a>
            		<a href="?menu=edtjnprdk&hapus&id=<?php echo $data[0]?>" class="btn btn-danger" 
                       onclick="return confirm('Hapus <?php echo $data[2] ?> ?')"><i class="icon-trash"></i></a>
            	</div>
           </td>
        </tr>
        <?php }
		}
		
		if(isset($_GET['hapus'])){
			$perintah->hapus("tbl_jenis","kd_jenis = '$_GET[id]'","?menu=edtjnprdk");
		}
		?>
    </table>