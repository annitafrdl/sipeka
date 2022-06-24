<html>
<head>
<title>Beranda</title>
</head>
<body>
<table width="100%" border="0">
<tr height=10%>
<td colspan="3" bgcolor=#FFFACD align="left"><img src="gambar3.jpg" width=165 height=165 
	style="float:left">
	<center><br><br>
	<font face="Time New Rowman" color="black" size="6">
	 	Sistem Informasi Pencatatan Keuangan Pasar Pada Badan Usaha Milik Desa (BUMDes) Berbasis Web Mobile di Kantor Desa Taringgul Tonggoh Kecamatan Wanayasa</font></td></tr>
</tr>
<tr>
<td bgcolor=#FFA07A width=70%>
<font face="cambria" color="white" size=4>&nbsp&nbsp
<script type='text/javascript'>
<!--
var months = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
var myDays = ['Minggu', 'Senin', 'Selasa', 'Rabu', 'Kamis', 'Jum&#39;at', 'Sabtu']; 
var date = new Date();
var day = date.getDate();
var month = date.getMonth(); 
var thisDay = date.getDay(),
	thisDay = myDays[thisDay]; 
var yy = date.getYear();
var year = (yy < 1000) ? yy + 1900 : yy;
document.write(thisDay + ', ' + day + ' ' + months[month] + ' ' + year);
//-->
</script>
</font>
</td>
<td bgcolor="#FFA07A" width=10%>
<font face="cambiria" color="white" size=4>&nbsp&nbsp
<?php
if (isset($_GET["pUser"])){
$tUser=$_GET["pUser"];
}else{
$tUser="Annita";
}
echo $tUser;
?>
</td>
<td bgcolor=#FFA07A width=5% align="center">
<input type="button" name="logout" value="Logout" onclick=”parent.location='index.php'”>
</td>
</tr>
</table>
</body>
</html>