<html>
<head>
<style media="screen" type="text/css"> 
html
body { 
	margin:0; 
	padding:0; 
	height:100%;
}
#container {
min-height:100%; 
position:relative;
}
#header { 
	background:#FFFFFF; 
	padding:10px;
}
#body { 
	padding:10px;
	padding-bottom:60px; /* Height of the footer */
}
#footer { 
	position:absolute; 
	bottom:0; 
	width:100%;
	height:50px; /* Height of the footer */ 
	background:#FFFACD;
}
</style>
</head>
<body>
<div id="container">
<div id="header">
<?php
include "Header.php";
include "Menu.php";
?>
</div>
<div id="body">
<?php
if (isset($_GET["page"])){
$vPage=$_GET["page"];
include "$vPage";
}else{
$vPage="";
}

?>
</div>
<div id="footer">
<br>
<center><font color="black">Copyright &copy; 2022 - Mrs. Annita Faradila</font></center>
</div>
</div>
</body>
</html>