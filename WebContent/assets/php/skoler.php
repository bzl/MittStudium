<?php
    header('Content-Type: text/html; charset=utf-8');
    include "integer.php";
    
    $dbhandle = mysqli_connect($hostname, $username, $password, "bzl_no") or die("Greier ikke koble til mysql");
    mysqli_set_charset($dbhandle, "utf8");
    
    $query = "SELECT * FROM skolene";
    $result = mysqli_query($dbhandle, $query);
        
    while ($row = mysqli_fetch_array($result)) {
        echo "<option>" . $row{'navn'} . "</option>";
    }
	
#	mysqli_close($dbhandle);
?>