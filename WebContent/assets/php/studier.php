<?php
    header('Content-Type: text/html; charset=utf-8');
    include "integer.php";
    
    $dbhandle = mysqli_connect($hostname, $username, $password, "bzl_no") or die("Greier ikke koble til mysql");
    mysqli_set_charset($dbhandle, "utf8");
    $skole = mysqli_real_escape_string($dbhandle,$_GET['skole']);
	
    
    $query = "SELECT DISTINCT studie FROM reviews WHERE skole='$skole'";
    $result = mysqli_query($dbhandle, $query);
    
    while ($row = mysqli_fetch_array($result)) {
        echo "<option>" . $row{'studie'} . "</option>";
    }
	
#	mysqli_close($dbhandle);
?>