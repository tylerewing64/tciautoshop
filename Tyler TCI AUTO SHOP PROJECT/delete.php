<?php 
//Connects to the database
include('config/db_connect.php');

//Gets the product id from the url
    $id = mysqli_real_escape_string($conn, $_GET['productid']);
// query to delete records from the products and the auction tables where the product id is equal to the id variable
    $sql = "DELETE FROM products where productid = $id";
    $sqltwo = "DELETE FROM auction where productid = $id";
//Runs the querys
    mysqli_query($conn, $sql);
    mysqli_query($conn, $sqltwo);
    
 //Redirects you to the index page   
header("location: ./index.php");
    


?>

