<html>
<head>
<link href='style.css' type='text/css' rel='stylesheet'>
<title>Daftar Parkir</title>
</head>
<body bgcolor="#C0C0FF">
<?php
include "Koneksi.php";
$query=mysqli_query ($connection,"SELECT * FROM tb_parkir order by Tanggal Asc")or die (mysql_error());
$jumlah = mysqli_num_rows($query);
?>
<center>
<font color='darkgreen' face='Tahoma' size=5><b><br>DAFTAR PARKIR</b></font><br>
<a href="FrmEntryDataUser.php">Tambah Data Parkir</a><br>
<a href="FrmHome.php">Home</a><br><br>
<table border="0" cellpadding="2" cellspacing="2" bordercolor="blue" bgcolor="white">
<tr bgcolor='brown' height="30"><font color='white'>
<th align='center'><font color='white' face='Tahoma' size=2 width=5%>No</font></th>
<th align='center'><font color='white' face='Tahoma' size=2 width=20%>Tanggal</font>
</th>
<th align='center'><font color='white' face='Tahoma' size=2 width=20%>Nama</font>
</th>
<th align='center'><font color='white' face='Tahoma' size=2 width=20%>Masuk</font></th>
<th align='center'><font color='white' face='Tahoma' size=2 width=20%>Persentase</font></th>
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
$row["Tanggal"];?></font></td>
<td align='left' bgcolor='#CCFF66'><font face='Arial' size=2 width=20%><?php echo
$row["Nama"];?></font></td>
<td align='left' bgcolor='#CCFF66'><font face='Arial' size=2 width=20%><?php echo
$row["Masuk"];?></font></td>
<td align='left' bgcolor='#CCFF66'><font face='Arial' size=2 width=20%><?php echo
$row["Persentase"];?></font></td>
<td align='center' bgcolor='#CCFF66' width=20%>
<a href="DeleteUser.php?Kode=<?php echo $row['UserName'] ?>" style="text-decoration: none" title="Hapus"><font face='tahoma' size='2' onclick="return confirm('Apakah anda yakin akan menghapus data ini?')">Delete</font>
</a>
<a href="frmEditDataUser.php?Kode=<?php echo $row['UserName']?>" style="text- decoration:none" title="Edit"><font face='tahoma' size='2'>Edit</font>
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