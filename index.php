<?php include "dbconnect.php"; 
	$qry = "SELECT * FROM penjualan";
	$aqry = mysql_query($qry);
?>

<!DOCTYPE html>
<html>
<head>
	<title>Tugas UAS</title>
</head>
<body>
<?php include "menubar.php";?>
<table border="1" width="100%">
	<tr>
		<th>Id Barang</th>
		<th>Nama Barang</th>
		<th>Jumlah Beli</th>
		<th>Harga</th>
		<th>Jumlah Harga</th>
		<th>Diskon</th>
		<th>Total</th>
	</tr>
	<?php 
		while ($dt = mysql_fetch_array($aqry)) {
			echo "<tr>";
			echo "<td>".$dt['IdBarang']."</td>";
			echo "<td>".$dt['NamaBarang']."</td>";
			echo "<td align='right'>".number_format($dt['jml_beli'],0,"",",")."</td>";
			echo "<td align='right'>".number_format($dt['harga'],2,",",".")."</td>";
			echo "<td align='right'>".number_format($dt['harga']*$dt['jml_beli'],2,",",".")."</td>";
			echo "<td align='right'>".number_format($dt['diskon'],2,",",".")."</td>";
			echo "<td align='right'>".number_format($dt['total'],2,",",".")."</td>";
			echo "</tr>";
		}
	?>
</table>
</body>
</html>