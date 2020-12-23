<!-- PHP SECTION -->
<?php
//Turns off errors
error_reporting(E_ERROR);

// Connects to database
include('config/db_connect.php');
//Makes sure the session is active
session_start();
//Sets the username to the value of the currents sessions username
$username = $_SESSION['usr'];

// Query that gets all columns from auction table where the auctioneer is equal to the $username variale
$sqlget = "SELECT * FROM auction WHERE auctioneer LIKE '%$username%'";



//make query and get results
$result = mysqli_query($conn, $sqlget);

//fetch the resulting rows as an array

$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

//Intializes the variable 
$pname ='';
$pdesc= '';
$pimg='';

?>

<!-- CSS SECTION -->
<style type="text/css">
.card {

    width:200px;
    height:350px;
    



}

.btn1{ 

   align:center;
    border:25px;
    padding:10px;
    background: #2BBBAD;
    color:white;

  
 }
 .imgclass img {
    width:20px;
    height:20px;
    margin:0px;
}

.bidc {
    font-size:12px;
    margin:0px;
    padding:0px;
}




</style>

<!-- HTML SECTION -->
<!DOCTYPE html>
<html>
    <title>Check Bids</title>


<!-- Inlcude the header files from the template file -->
<?php include('Templates/loginbar.php') ?>
<?php include('Templates/header1.php') ?>

<h4 class="center grey-text">Offers </h4>

<body>
<!-- Creates Container For The Table Cards -->

<div class = "container">
 <!-- Row Class to create rows  -->
    <div class = "row">
    <!-- Fetch each result from the array  -->
        <?php foreach($products as $product){ ?>
        <div class = "col s12 m3">
<!-- Creates the card and defines the drop shadow depth as 0  -->
            <div class ="card z-depth-0">
                <div class ="card-content center">
                <!-- Prints the products name  --> 
                 <div><b>Bid placed by: </b> <?php echo htmlspecialchars($product['bidder'])?></div><br>
                 <div><b> Offer Amount: </b><?php echo htmlspecialchars($product['bid_amount'])?> </div><br>
                 <div ><b> Time Placed: </b><br><?php echo htmlspecialchars($product['bid_time'])?> </div><br>
                 <div class = 'bidc' ><b> Bidder's Email: </b><br><?php echo htmlspecialchars($product['bidder_contact'])?> </div><br>
                </div>

                <div class= "button center-align">
                     <!-- Link to the product  --> 
                <a href="details.php?productid=<?php echo $product['productid']?>">Product Link </a>
                 </div>
            </div>
        </div>
        <?php } ?>
    </div>

</div>

 <!-- Footer --> 
<?php include('Templates/footer.php') ?>


</body>
</html>
