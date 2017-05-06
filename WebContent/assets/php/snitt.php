<?php
    header('Content-Type: text/html; charset=utf-8');
    include "integer.php";
    
    $dbhandle = mysqli_connect($hostname, $username, $password, "bzl_no") or die("Greier ikke koble til mysql");
    mysqli_set_charset($dbhandle, "utf8");
    
    $query = "SELECT skole, studie, ROUND(AVG(score),1) AS snitt FROM reviews GROUP BY skole, studie ORDER BY snitt DESC";
    $result = mysqli_query($dbhandle, $query);

    while ($row = mysqli_fetch_array($result)) {
        echo '<tr> <td class="skole">' 
      		. $row{'skole'} 
       		. '</td> <td class="studie">' 
      		. htmlspecialchars($row{'studie'}, ENT_QUOTES, 'UTF-8')
        	. '</td> <td class="score">' 
        	. $row{'snitt'} 
			. '</td> <td class="goodbad">' 
        	. positiveEllerNegativ($row{'snitt'})
        	. '</td> </tr>';
    }
    
    
    function positiveEllerNegativ($score) {
    	if ($score >= 5.0){
    		return "Bra";
    	} else {
    		return "Dårlig";
    	}
	} 
	
	mysqli_close($dbhandle);
?>
