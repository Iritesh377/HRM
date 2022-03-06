<?php

$sname= "63.250.41.150";
$unmae= "techybug_HRM";
$password = "R$jKpqewNf$+";

$db_name = "techybug_HRM";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
	echo "Connection failed!";
}