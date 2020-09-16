<?php
    include "config/config.php";


    if(isset($_GET['delete'])) {
        $id = $_GET['delete'];
        $query  = "DELETE FROM  stock_mobile WHERE id = " . $id;
        $conn   =  mysqli_query($connection, $query);
        $_SESSION['danger'] = "Delete Successfull!"; 
	    header('location: index.php');
    }
    
   

?>