<!-- PHP SECTION -->
<?php
//Connects to the database
include('config/db_connect.php');

//Turns off errors
error_reporting(E_ERROR); 
session_start();

 

//Checks if the submit button is clicked
if(isset($_POST['submit'])){

//Assign form data to the variables
$product_id = $_POST['product_id'];
$auctioneer= $_POST['auctioneer'];
$bid_amount = $_POST['bid_amount'];
$bidder = $_SESSION['usr'];
$bidder_contact = $_POST['bidder_contact'];


//Creates queries that insert data into the auction table 
$sqladd = "INSERT INTO auction( productid, bidder, auctioneer, bid_amount, bidder_contact ) VALUES('$product_id', '$bidder', '$auctioneer', '$bid_amount', '$bidder_contact' )";
// Selects all columns from table products where the productid is equal to the one entered
$sqlget = "SELECT * FROM products WHERE productid = '$product_id' ";



//Runs queries
mysqli_query($conn, $sqladd);
mysqli_query($conn, $sqlget);

echo "Bid was placed";
//Takes user to index file after completion
header("location: ./index.php"); 
echo "Bid was placed";

}

?>


<!-- CSS SECTION -->
<style type="text/css">
.form_add{
background-color:white;
max-width:460px;
margin:20px auto;
padding: 20px;
}

.img{

    padding:30px;
}





</style>

<!-- HTML SECTION -->
<!DOCTYPE html>
<html>
    <title>]Place a bid</title>


<!-- Inlcudes header templates -->
<?php include('Templates/loginbar.php') ?>
<?php include('Templates/header1.php') ?>

<!-- Creates container for form -->
<section class="container grey-text">
    <h4 class = "center"> Place A Bid </h4>
<!-- Creates  form -->
    <form class ="form_add" action ="placebid.php" method="POST"  >
        <label>Product Id:</label>
        <input type ="text" name ="product_id" required>
        <label>Sellers Name:</label>
        <input type ="text" name ="auctioneer"  required>
        <label>Amount you would like to Bid:</label>
        <input type = "text" name ="bid_amount" required>
        <label> Your email:</label>
        <input type = "text" name ="bidder_contact" required>

        <div class = "center">
        <input type="submit" name="submit" value="Place Bid" class ="btn brand z-depth-0">
        

            
</div>
</form>
    


</section>
</body>

<!-- Footer  -->
<?php include('Templates/footer.php') ?>



</html>
