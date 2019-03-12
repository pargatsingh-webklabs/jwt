<?php
alert('sd');
die();
     $q=$_GET["id"]; 
	
    $sql="SELECT `path_name` FROM `path_tags` WHERE path_name LIKE '%#%'";
    $result = mysql_query($sql);
    $json=array();

    while($row = mysql_fetch_array($result)) {
      array_push($json, $row['hashtagsss']);
    }

    echo json_encode($json);
?>