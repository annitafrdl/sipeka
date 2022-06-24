<html>
<head>
<meta charset="UTF-8">
<TITLE>Menu Utama</TITLE>
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

<BODY>

<center>
<nav class="navigation">
<ul>
<li><a href="#">File</a>
<ul>
<li><a href="Hal_Menu11.php"> </a></li>
<li><a href="FrmHome.php?page=FrmDaftarCatat.php"> Data Catat </a></li>
<li><a href="FrmHome.php?page=FrmDaftarParkir.php"> Data Parkir </a></li>
<li><a href="FrmHome.php?page=FrmDaftarUser.php"> Data User </a></li>
</ul>
</li>
<li><a href="#">Transaksi</a>
<ul>
<li><a href="Hal_Menu21.php"> Sub Menu 2.1</a></li>
<li><a href="Hal_Menu22.php"> Sub Menu 2.2</a></li>
<li><a href="FrmHome.php?page=FrmDaftarUser.php"> Data User </a></li>
</ul>
<li><a href="#">Menu 3</a>
<ul>
<li><a href="Hal_Menu31.php"> Sub Menu 3.1</a></li>
<li><a href="Hal_Menu32.php"> Sub Menu 3.2</a></li>
<li><a href="Hal_Menu33.php"> Sub Menu 3.3</a></li>
</ul>
</li>
<li><a href="#">Menu 4</a>
<ul>
<li><a href="Hal_Menu41.php"> Sub Menu 4.1</a></li>
<li><a href="Hal_Menu42.php"> Sub Menu 4.2</a></li>
<li><a href="Hal_Menu43.php"> Sub Menu 4.3</a></li>
</ul>
</li>
<li><a href="Hal_Menu5.php">Menu 5</a>
<li class="clear"></li>
</ul>
</nav>
</body>
</html>