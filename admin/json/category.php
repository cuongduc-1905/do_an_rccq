<?php 
    header("content_type:appliction/json");
    include 'config/connect.php';
    $cats = mysqli_query($conn,"SELECT * FROM category");
    $result = [];
    While($result = mysql_fetch_assoc($cats){
    	$result = $cats;
    });
    echo json_decode($result);
   
 ?>
