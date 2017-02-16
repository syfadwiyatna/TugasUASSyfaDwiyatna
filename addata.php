<!DOCTYPE html>
<?php 
include "dbconnect.php"; 
$reporterror = '';
$Id = "";
$Namabarang = "";
$jml = "";
$hrg = "";

if(isset($_POST['Simpan'])){
	$err = '';
	$Id = addslashes($_POST['Idbarang']);
	$Namabarang = addslashes($_POST['Namabarang']);
	$jml = addslashes($_POST['jml']);
	$hrg = addslashes($_POST['hrg']);

	if($err == '' && $Id == '')$err = "Id Barang Belum di Isi !";
	if($err == '' && $Namabarang == '')$err = "Nama Barang Belum di Isi !";
	if($err == '' && $jml == '')$err = "Jumlah Barang Belum di Isi !";
	if($err == '' && $jml == "-")$err = "Jumlah Barang Tidak Valid !";
	if($err == '' && $jml <= 0)$err = "Jumlah Barang Tidak Boleh Kurang dari 1";
	if($err == '' && $hrg == '')$err = "Harga Barang Belum di Isi !";
	if($err == '' && $hrg == "-")$err = "Harga Barang Tidak Valid !";
	if($err == '' && $hrg <= 0)$err = "Harga Barang Tidak Boleh Kurang dari 1";

	if($err !='')$reporterror = "<span style='color:red;font-size:12px;'>".$err."<br></span>";

	if($err == ''){
		$tothar = intval($jml) * intval($hrg);
		if($tothar >= 500000 AND $tothar < 1000000 ){
			$diskon = 20000;
		}elseif ($tothar > 1000000) {
			$diskon = $tothar * 0.1;
		}else{
			$diskon = 0;
		}

		$total = $tothar - $diskon;
		$qry = "INSERT INTO penjualan VALUES('$Id','$Namabarang','$jml','$hrg','$diskon','$total')";
		$aqry = mysql_query($qry);
		if($aqry)header('Location: index.php');
	}
}

?>
<html>
<head>
	<title>Tambah Data</title>
	<script type="text/javascript">
		function isNumberKey(evt) {
			var charCode = (evt.which) ? evt.which : event.keyCode
			if (charCode > 31 && (charCode < 48 || charCode > 57))
			
			return false;
			return true;
		}
	</script>
</head>
<body>
<?php include "menubar.php";?>
<?php echo $reporterror; ?>
<form method="post" action="addata.php">
	<table>
	<tr>
		<td>Id Barang</td>
		<td>:</td>
		<td><input type="text" name="Idbarang" value="<?php echo $Id;?>" size="30"></td>
	</tr>
	<tr>
		<td>Nama Barang</td>
		<td>:</td>
		<td><input type="text" name="Namabarang" size="30" value="<?php echo $Namabarang;?>" ></td>
	</tr>
	<tr>
		<td>Jumlah Beli</td>
		<td>:</td>
		<td><input type="text" name="jml" onkeypress="return isNumberKey(event)" id="jml" value="<?php echo $jml;?>" size="30"></td>
	</tr>
	<tr>
		<td>Harga Satuan</td>
		<td>:</td>
		<td><input type="text" name="hrg" id="hrg" onkeypress="return isNumberKey(event)" size="30" value="<?php echo $hrg;?>" ></td>
	</tr>
	<tr>
		<td><input type="submit" name="Simpan" value="Simpan"></td>
	</tr>
	</table>
</form>

</body>
</html>