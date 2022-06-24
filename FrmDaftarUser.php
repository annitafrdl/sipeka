<html>
<head>
<link href='style.css' type='text/css' rel='stylesheet'>
<title>Daftar User</title>
</head>
<body bgcolor="#DCDCDC">
<?php
include "Koneksi.php";
$query=mysqli_query ($connection,"SELECT * FROM tbl_user order by Username Asc")or die (mysql_error());
$jumlah = mysqli_num_rows($query);
?>
<center>
<font color='darkgreen' face='Tahoma' size=5><br>DAFTAR USER</b></font><br>
<a href=FrmHome.php?page=FrmEntryDataUser.php">Tambah Data User</a><br>
<a href="FrmHome.php">Home</a><br><br>
<table border="0" cellpadding="2" cellspacing="2" bordercolor="blue" bgcolor="white">
<tr bgcolor='brown' height="30"><font color='white'>
<th align='center'><font color='white' face='Tahoma' size=2 width=5%>No</font></th>
<th align='center'><font color='white' face='Tahoma' size=2 width=20%>User Name</font>
</th>
<th align='center'><font color='white' face='Tahoma' size=2 width=20%>Password</font>
</th>
<th align='center'><font color='white' face='Tahoma' size=2 width=20%>Status</font></th>
<th align='center'><font color='white' face='Tahoma' size=2 width=20%>Pilihan Proses</font>
</th>
</tr>
<?php
$j=0;
while ($row=mysqli_fetch_array($query)) {
?>
<tr>
<td align='center' bgcolor='#CCFF66'><font face='Arial' size=2 width=5%><?php echo$j+1;?>
</font></td>
<td align='left' bgcolor='#CCFF66'><font face='Arial' size=2 width=20%><?php echo
$row["UserName"];?></font></td>
<td align='left' bgcolor='#CCFF66'><font face='Arial' size=2 width=20%><?php echo
$row["Password"];?></font></td>
<td align='left' bgcolor='#CCFF66'><font face='Arial' size=2 width=20%><?php echo
$row["Status"];?></font></td>
<td align='center' bgcolor='#CCFF66' width=20%>
<a href= "FrmHome.php?page=DeleteDataUser.php" ?Kode=<?php echo $row['UserName'] ?>" style="text-decoration: none" title="Hapus">
<font face='tahoma' size='2' onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Delete</font>
</a>
<a href="FrmHome.php?page=FrmEditDataUser.php" ?Kode=<?php echo $row['UserName']?>" style="text- decoration:none" title="Edit">
<font face='tahoma' size='2'>Edit</font>
</a>
</td>
</tr>
<?php
$j++;
}
?>
</table>
</center>
</body>
</html>