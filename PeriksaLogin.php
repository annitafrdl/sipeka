<?php
//Periksa Login
include"Koneksi.php";
$vUserName=$_POST["tUserName"];
$vPassword=$_POST["tPassword"];
echo $vUserName;
echo $vPassword;
$cari="SELECT * From tbl_user WHERE UserName='$vUserName' and Password='$vPassword'";
$hasil=mysqli_query($connection,$cari)or die (mysql_error());
//$row=mysql_fetch_row($hasil);
//$ada=mysql_num_rows($hasil);
if($row=mysqli_fetch_array($hasil))
{
if($row['Status']=='Administrator'){
?><script>
document.location="FrmHome.php?pUser=<?php echo $row['UserName']?>";
</script>
<?php
}
else
{
?><script>
	document.location="FrmHome.php?pUser=<?php echo $row['UserName']?>";
</script>
<?php
}
}
else
{
?><script>
alert("UserName atau Password anda salah !");
document.location="Index.php";
</script>
<?php
}
?>