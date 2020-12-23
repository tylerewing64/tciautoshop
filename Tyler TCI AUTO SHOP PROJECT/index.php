<!-- PHP SECTION -->

<?php
//Turn off errors
error_reporting(E_ERROR);

//connect to database
include('config/db_connect.php');
//write query for all products

//Make sure a session is started
session_start();

//Set username variable equal to the session user
$username = $_SESSION['usr'];

//write query to show all products that where created by the session user 
$sql = "SELECT productid, pname, pprice, pdesc, pimg, created_at, username  FROM  products WHERE username LIKE '%$username%'";


//make query and get results
$result = mysqli_query($conn, $sql);

//fetch the resulting rows as an array

$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

//Intializing 
$pname ='';
$pdesc= '';
$pimg='';

?>


<!-- CSS SECTION -->
<style type="text/css">
.card {

    width:200px;
    height:300px;
    



}
.desc{
    font-size: 30px;
    font-size: 2.1vw;



}
.btn1{ 

   align:center;
    border:25px;
    padding:10px;
    background: #2BBBAD;
    color:white;

  
 }
 .imgclass img {
    width:125px;
    height:125px;
}

.containerone{
   padding-left :550px;
}
body {
    margin: 0;
    width: 100vw;
    height: 100vh;
}

</style>


<!-- HTML SECTION -->
<!DOCTYPE html>
<html>
<title>My Listings </title>







<body>
<!-- Including the header template files -->
<?php include('Templates/loginbar.php') ?>
<?php include('Templates/header1.php') ?>
<h4 class="center grey-text">My Listings </h4>

<!-- Creates Container For The Table Cards -->
<div class = "container">
<!-- Row Class to create rows  -->
    <div class = "row">
<!-- Fetch each result from the array  -->
        <?php foreach($products as $product){ ?>
<!-- Creates the card and defines the drop shadow depth as 0  -->
        <div class = "col s6 m3">
            <div class ="card z-depth-0">
                <div class ="card-content center">
                   <!-- Prints the products name  -->  
                    <h6> <?php echo htmlspecialchars($product['pname'])?></h6>
                    <div class = "imgclass"><img src = 'file/<?php echo  ($product['pimg']); ?>'> </div>
                    <div class="desc"><?php echo htmlspecialchars($product['pprice'])?>
                    </div>
                 </div>
                             <div class= "button center-align">
                        <!-- Takes the user to the details file based on the productid of the product they clicked -->
                        <a href="details.php?productid=<?php echo $product['productid']?>">More Info </a>
                                </div>
            </div>
        </div>
        <?php } ?>
    </div>

</div>


<!-- Checks if there is a current session ongoing to display the add product and place bid options -->
<div class = "containerone">
<?php if( isset($_SESSION['usr']) ){
        echo '<a href="addproduct.php" class ="btn1 z-depth-0 ">Add Product</a>  ';
    }
?>


<?php if( isset($_SESSION['usr']) ){
        echo '<a href="checkbids.php" class ="btn1 z-depth-0 ">Check Bids</a>  ';
    }
?>
</div>

<?php include('Templates/footer.php') ?>


</body>
</html>
