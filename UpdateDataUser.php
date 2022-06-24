<?php
include "Koneksi.php";
$vUserName = $_POST['tUserName'];
$vPassword = $_POST['tPassword'];
$vKPassword=$_POST['tKPassword'];
$vStatus = $_POST['tStatus'];
if ($vPassword<>$vKPassword) {
?>
<script type="text/javascript">
var answer = confirm("Input Password dan Konfirmasi Password tidak sama !, Mau diulang ?") if (answer){
window.location = "frmEditDataUser.php?Kode=<?php echo $vUserName?>";
}else{
window.location = "FrmHome.php?page=frmDaftarUser.php";
}
</script>
<?php
} else {
$query=mysqli_query($connection,"UPDATE tbl_user SET UserName='$vUserName', Password='$vPassword', Status='$vStatus'
WHERE UserName='$vUserName'")or die (mysqli_error()); if($query) {
?>
<script language="JavaScript"> document.location='FrmHome.php?page=FrmDaftarUser.php'</script>
<?php
}
}
?>