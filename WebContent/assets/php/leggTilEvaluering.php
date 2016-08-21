<?php
    header('Content-Type: text/html; charset=utf-8');
    include "integer.php";
    
    $dbhandle = mysqli_connect($hostname, $username, $password, "bzl_no") or die("Greier ikke koble til mysql");
    mysqli_set_charset($dbhandle, "utf8");

    $skole = mysqli_real_escape_string($dbhandle,$_GET['skole']);
    $studie = mysqli_real_escape_string($dbhandle,$_GET['studie']);
    $review = mysqli_real_escape_string($dbhandle,$_GET['review']);
    $score = mysqli_real_escape_string($dbhandle,$_GET['score']);
    
    $query = "INSERT INTO reviews (skole,studie,review,score) VALUES ('$skole','$studie','$review','$score')";
    $result = mysqli_query($dbhandle, $query);
	
	mysqli_close($dbhandle);
?>