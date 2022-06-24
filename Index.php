<html>
<head>
<title>Login</title>
<meta    http-equiv="Content-Type"content="text/html;charset=UTF-8">
<link   href="style.css"type="text/css"rel="stylesheet">
</head>
<body bgcolor=#DCDCDC>
<center>
<?php
include "header.php";
?>
<br><br><br><br><br><br><br>
<table bgcolor=#DEB887 width=30%>
<tr><td align=center><font face="Tahoma"color="black"size="3"><b>LOGIN</b></font></td></tr>
</table>
<form action="Periksalogin.php" method="POST">

<table bgcolor=#DEB887 width=30%>
<tr>
<td>&nbsp&nbsp</td>
<td><font face="Tahoma"color="black"size="2">User Name</font></td>
<td>:</td>
<td><input type="text" name="tUserName" size="30"></td>
</tr>
<tr>
<td>&nbsp&nbsp</td>
<td><font face="Tahoma"color="black"size="2">Password</font></td>
<td>:</td>
<td><input type="password" name="tPassword" size="30"></td>
</tr>
<tr>
<td>&nbsp&nbsp</td>
<td></td><td></td>
<td><input type="submit"value="Login">
<input type=button value="Cancel" onclick="parent.location='Index.php'"></td>
</tr>

</table>
<table bgcolor=#E9967A width=30%>
<tr><td align=center><font face="Tahoma"color="green"size="2"><b><br>Lupa Password? 
<a href="Frm_LupaPassword.php">Klik Disini</a></b></font></td></tr>
</table>
</form>
<br><br><br><br><br><br>
<?php
?>
</div>
<div id="footer">
<br>
<center><font color="black">Copyright &copy; 2022 - Mrs. Annita Faradila</font></center>
</div>
</center>
</body>
</html>