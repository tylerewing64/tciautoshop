<!-- PHP SECTION -->
<?php
//connects to the database
include('config/db_connect.php');

//Includes the login bar file 
include('./Templates/loginbar.php');

//Turn off errors
error_reporting(E_ERROR); 

// Set the variable id to the productid 
$id = mysqli_real_escape_string($conn, $_GET['productid']);

// Get all columns from the products table where the productid is equal to the variable $id
$sql = "SELECT * FROM products WHERE productid = $id";

//runs the query & saves the result in the variable $result
$result = mysqli_query($conn, $sql);

//defines the variable result in a associative array
$product = mysqli_fetch_assoc($result);

//frees results
mysqli_free_result($result);

//closes connection
mysqli_close($conn);

?>

<!-- CSS SECTION -->
<style type="text/css">

.card{
    width:550px;
    length:600px;
    left: 430px;
    top:20px;
}

.price{
    font-size:30px;
}

.title{
    font-size:40px;
 }
 .btn1{ 

     position:center;
     border:25px;
     padding:10px;
 background: #2BBBAD;
    color:white;
   
  }

.desc {
    font-size:15px;
}

.keywords{
    font-size:10px;
}
.imgclass img {
    width:90%;
 
}
.submit{
 
   border:25px;
   padding:10px;
   background: #2BBBAD;
   color:white;
 
}

.linkdel {

    border:25px;
     padding:10px;
     
     color:red;

}
</style>

<!-- HTML SECTION -->

<html>
<!-- Print the product name value as the title -->
<title> <?php echo $product['pname'];  ?></title>
<body>

<!-- Include the header template-->
<?php include('Templates/header1.php') ?>

<!-- Create a card with no drop shadow -->
<div class ="card z-depth-0">
                <!-- Information to be contained inside the card -->
                <div class ="card-content center">
                <div class = "imgclass"><img src = 'file/<?php echo  ($product['pimg']); ?>  '></div>
                <div class ="title"> <?php echo htmlspecialchars($product['pname'])?></div>
                <div class="price"><?php echo htmlspecialchars($product['pprice'])?></div>

 
<!-- Checks to see if there is a login session currently active to generate a link then checks if the current session user is the 
user who posted to product he/she is viewing, if they are not then a link is generated which allows them to place a bid  -->                
<a href="placebid.php?productid=<?php echo $product['productid']?>"> <?php 
if (isset($_SESSION['usr'])){
if( $_SESSION['usr'] == $product['username'] )
{   echo "";

} else {
    echo  htmlspecialchars('Place Bid');

}

}


?></a>
<!-- Checks to see if there is a login session currently active to generate a link then checks if the current session user is the 
user who posted to product he/she is viewing, if they are then a link is generated which allows them to delete the product -->   

<a  class = "linkdel" href="delete.php?productid= <?php if( $_SESSION['usr'] == $product['username'] ){
  echo $product['productid'];} 

?>">
<?php if (isset($_SESSION['usr'])){

if( $_SESSION['usr'] == $product['username'] )
{  echo  htmlspecialchars('Delete Product');

} else {
    echo "</a>";
   }

}


?>
</a>


                    <!-- Displays the rest of the information inside the card -->

                    <div class = "desc"><br> <b class = "bdesc">DESCRIPTION</b> <br><?php echo htmlspecialchars($product['pdesc'])?> </div>
                    <div class = "keywords"><br><b>KEYWORDS</b> <br><?php echo htmlspecialchars($product['pkeywords'])?> </div>
                    <div class = "keywords"><br><b>POSTED BY:</b> <br><?php echo htmlspecialchars($product['username'])?> </div>
                    <div class = "keywords"><br><b>ID:</b> <br><?php echo htmlspecialchars($product['productid'])?> </div>

                    
                    



</div>
</div>



    <!-- Include footer file  -->
<?php include('Templates/footer.php') ?>
    </body>

</html>