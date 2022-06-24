<html>
<head>
<title>Entry Data Catat</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="style.css" type="text/css" rel="stylesheet">
</head>
<body>
<font face="Tahoma" color="green" size="3"><b><br>Penambahan Data Catat</b>
</font>
<form action="Insert_User.php" method="POST">
<table align="left">
<tr>
<td><font face="Tahoma" color="black" size="2">Tanggal</font></td>
<td>:</td>
<td><input type="Date" name="tTanggal" size="30"></td>
</tr>
<tr>
<td><font face="Tahoma" color="black" size="2">Keamanan</font></td>
<td>:</td>
<td><input type="text" name="tNama" size="30"></td>
</tr>
<tr>
<td><font face="Tahoma" color="black" size="2">Karcis Pasar</font></td>
<td>:</td>
<td><input type="Number" name="tMasuk" size="30"></td>
</tr>
<tr>
<td><font face="Tahoma" color="black" size="2">Jumlah</font></td>
<td>:</td>
<td><input type="text" name="tStatus" size="30"></td>
</tr>
<tr>
<td></td><td></td>
<td><input type="submit" value="Add">
<input type=button value="Kembali" onclick=self.history.back()>
</td>
</tr>
</table>
</form>
</body>
</html>