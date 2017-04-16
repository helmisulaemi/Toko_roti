<link rel="stylesheet" href="../../style/css/bootstrap.css">
<?php
$tgl = date('d - F - Y');
?>
<div class="alert alert-warning" role="alert">
	<a href=""><span class="glyphicon glyphicon-home"></span> Home</a> 
 			   <i class="icon-angle-right"></i>  Pelanggan 
  			   <i class="icon-angle-right"></i>  Data Pelanggan Online
               <div class="right">
	<?php echo $tgl ?>,<span id="clock"></span>
</div>
</div>  
<script type="text/javascript">
    var detik = <?php echo date('s'); ?>;
    var menit = <?php echo date('i'); ?>;
    var jam   = <?php echo date('H'); ?>;
</script>
<script src="../../style/js/clock.js"></script>

	<h2> Data Pelanggan Yang Online</h2>
    <hr>
	<table class="table table-striped">
    	<tr class="alert-warning" style="font-weight:bold;">
        	<td></td>
            <td>Nama</td>
            <td>Username</td>
            <td>No Hp</td>
        </tr>
        <?php
		$no = 0; 
		$a = $perintah->tampil("tbl_pembeli where status = '1'");
		if($a == ''){
			echo "<tr><td colspan = '6' align='center'><strong>Tidak ada pelanggan yang Online</strong></td></tr>";
		} else {
			foreach($a as $data){
				$no++;
		?>
        <tr>
        	<td><?php echo $no ?></td>
            <td><?php echo $data[1] ?></td>
            <td><?php echo $data[7] ?></td>
            <td><?php echo $data[6] ?></td>
        </tr>
        <?php }
		}
		?>
    </table>