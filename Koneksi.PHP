<?php
$host = "localhost";
$username = "root";
$password = "";
$databasename = "db_poladasar";
$connection = mysqli_connect($host, $username, $password) or die("Kesalahan Koneksi ... !!");
mysqli_select_db($connection,$databasename) or die("Databasenya Error");