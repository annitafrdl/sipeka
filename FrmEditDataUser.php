<head>
<title>Edit Data User</title>
<style type="text/css" media="screen"> body
{
font-family:'Trebuchet MS'
}
*
{
-webkit-transition:all .21s ease-in-out;
-moz-transition:all .21s ease-in-out;
-o-transition:all .21s ease-in-out;
-ms-transition:all .21s ease-in-out; 
transition:all .21s ease-in-out
}
.clear
{
clear:both
}
header
{
width:300px;
margin:100px auto 0
}

.navigation
{
position:relative;
background:#fefefe;
box-shadow:0 1px 4px #e0e0e0;
-webkit-box-shadow:0 1px 4px #e0e0e0;
-moz-box-shadow:0 1px 4px #e0e0e0;
border:1px solid #e0e0e0
}
.navigation ul
{
margin:0;
padding:0
}

.navigation ul li
{
float:left;
list-style:none;
position:relative
}

.navigation ul li a
{
display:block;
color:#404040;
text-decoration:none;
padding:5px
}

.navigation ul li a:hover
{
background:#404040;
color:#fefefe
}

.navigation ul li ul
{
position:absolute;
display:none;
width:150px;
background:#fefefe;
box-shadow:0 1px 4px #e0e0e0;
-webkit-box-shadow:0 1px 4px #e0e0e0;
-moz-box-shadow:0 1px 4px #e0e0e0;
border:1px solid #e0e0e0;
margin:0 auto
}

.navigation ul ul ul
{
display:none;
position:absolute;
right:-150px;
top:0
}

.navigation ul li:hover > ul,.navigation ul ul li:hover > ul
{
display:block
}

.navigation ul li.clear,.navigation ul ul li
{
float:none
}

</style>
</HEAD>
<body bgcolor="DCDCDC" >
<center>
<br><br>
<?php
include "Koneksi.php";
$tKode = $_GET['Kode'];
$query=mysqli_query($connection,"SELECT * FROM tbl_user WHERE UserName='$tKode'");
while ($row=mysqli_fetch_array($query)){
$vUserName = $row['UserName'];
$vPassword = $row['Password'];
$vKPassword = $row['Password'];
$vStatus = $row['Status']; 15
?>
<table bgcolor=#DEB887 width=30% align='center'>
<font face='Tahoma' color='black' size=3><b>Edit Data User</b></font>
<form method="post" action="UpdateDataUser.php" enctype='multipart/form-data'>
<br>
<tr>
<td><font face='Tahoma' color='black' size=2>User Name</font></td><td>:</td>
<td><input type='text' name='tUserName' size='30' value='<?php echo 
$vUserName?>'>&nbsp;
</td>
</tr>
<tr>
<td><font face='Tahoma' color='black' size=2>Password</font></td><td>:</td>
<td><input type='password' name='tPassword' size='30' value='<?php echo
$vPassword?>'>&nbsp; 
</tr>
<tr>
<td><font face='Tahoma' color='black' size=2>Konfirmasi Password</font></td><td>:</td>
<td><input type='password' name='tKPassword' size='30' value='<?php echo
$vKPassword?>'>&nbsp;
</td>
</tr>
<tr>
<td><font face='Tahoma' color='black' size=2>Status</font></td><td>:</td>
<td><input type='text' name='tStatus' size='30' value='<?php echo 
$vStatus?>'> &nbsp;
</td>
</tr>
<tr>
<td></td><td></td>
<td><font size='2'><input type='submit' name='submit' value='Update'>
<input type="button" value="Cancel" onclick=self.history.back()>
</font>
</td>
</tr>
</table>
</form>
<?php
}
?>
</body>
</html>