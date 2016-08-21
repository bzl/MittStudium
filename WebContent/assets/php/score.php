<?php
    header('Content-Type: text/html; charset=utf-8');
    include "integer.php";
    
    $dbhandle = mysqli_connect($hostname, $username, $password, "bzl_no") or die("Greier ikke koble til mysql");
    mysqli_set_charset($dbhandle, "utf8");

    $skole = mysqli_real_escape_string($dbhandle,$_GET['skole']);
    $studie = mysqli_real_escape_string($dbhandle,$_GET['studie']);
    
    $query = "SELECT ROUND(AVG(score),1) FROM reviews WHERE skole='$skole' AND studie='$studie'";
    $result = mysqli_query($dbhandle, $query);

    while ($row = mysqli_fetch_array($result)) {
        echo $row{'ROUND(AVG(score),1)'};
    }
	
	mysqli_close($dbhandle);
?>