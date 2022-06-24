<?php
include "Koneksi.php";
$vUserName = $_POST['tUserName'];
$vPassword = $_POST['tPassword'];
$vk_Password = $_POST['tKPassword'];
$vStatus = $_POST['tStatus']; 
if ($vPassword<>$vk_Password) {
?>
<script type="text/javascript">
var answer = confirm("Input Password dan Konfirmasi Password tidak sama !, Mau diulang ?")
if (answer){
window.location = "FrmEntryDataUser.php";
}else{
window.location = "FrmHome.php?page=FrmDaftarUser.php";
}
</script>
<?php
} else {
$query=mysqli_query ($connection,"INSERT INTO tbl_user(UserName, Password, Status) VALUES ('$vUserName','$vPassword','$vStatus')") or die (mysqli_error());
if($query) {
?>
<script language="JavaScript"> document.location='FrmHome.php?page=FrmDaftarUser.php'</script>
<?php
}
}
?>