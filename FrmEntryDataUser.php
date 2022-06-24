<html>
<head>
<title>Entry Data User</title>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link href="style.css" type="text/css" rel="stylesheet">
</head>
<body bgcolor="DCDCDC">
<br><br><br>
<center>
<table bgcolor=#DEB887 width=35%>
<tr><td align=center><font face="Tahoma" color="black" size="3"><b><br>Tambah Data User</b></font></td></tr><br>
<form action="Insert_User.php" method="POST">
<table align="center">
<table bgcolor=#DEB887 width=35%>
<tr><td><font face="Tahoma" color="black" size="2">User Name</font></td>
<td>:</td>
<td><input type="text" name="tUserName" size="30"></td>
</tr>
<tr>
<td><font face="Tahoma" color="black" size="2">Password</font></td>
<td>:</td>
<td><input type="password" name="tPassword" size="30"></td>
</tr>
<tr>
<td><font face="Tahoma" color="black" size="2">Konfirmasi Password
</font></td>
<td>:</td>
<td><input type="password" name="tKPassword" size="30"></td>
</tr>
<tr>
<td><font face="Tahoma" color="black" size="2">Status</font></td>
<td>:</td>
<td><input type="text" name="tStatus" size="30"></td>
</tr>
<tr>
<td></td><td></td>
</td>
</tr>
</table>
<table bgcolor=#E9967A width=35%>
<td align=center><input type="submit" value="Add">
<input type=button value="Kembali" onclick=self.history.back()>
</table>
</form>
</body>
</html>