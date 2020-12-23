
<!-- PHP SECTION -->
<?php
//Connects to database
include('config/db_connect.php');



//Checks to see if the submit button was pressed 
if(isset($_GET["submit"])) {

//Sets keywords to the value entered into the search button
$keywords = $_GET["search"]; 
//create a query to select all columns from the table products where the keywords are equal to the keywords entered into the search bar or equal to the product name 
$query = "SELECT productid, pname, pprice, pdesc, pimg, created_at  FROM products WHERE pkeywords LIKE '%$keywords%'  OR pname LIKE '%$keywords%'";
}

$result = mysqli_query($conn, $query);

//Fetch results
$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

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
    
   margin-left:620px;
   
    border:25px;
    padding:10px;
    background: #2BBBAD;
    color:white;
  
 }
 .imgclass img {
    width:125px;
    height:125px;
}

</style>

<!DOCTYPE html>
<html>
<!-- Prints the keyword entered  -->
<title>Search results for <?php echo $keywords;  ?></title>


<!-- Include header template files -->
<?php include('Templates/loginbar.php') ?>
<?php include('Templates/header1.php') ?>

<h4 class="center grey-text">Search results</h4>
 

<body>
<!-- Creates Container For The Table Cards -->
<div class = "container">
<!-- Row Class to create rows  -->
    <div class = "row">

<!-- Fetch each result from the array  -->
        <?php foreach($products as $product){ ?>
        <div class = "col s6 m3">
<!-- Creates the card and defines the drop shadow depth as 0  -->
            <div class ="card z-depth-0">
                <!-- Prints the products name  --> 
                <div class ="card-content center">
                    <h6> <?php echo htmlspecialchars($product['pname'])?></h6>
                    <div class = "imgclass"><img src = 'file/<?php echo  ($product['pimg']); ?>'> </div>
                    <div class="desc"><?php echo htmlspecialchars($product['pprice'])?>
                    </div>
                 </div>
                             <div class= "button center-align">
                        <a href="details.php?productid=<?php echo $product['productid']?>">More Info </a>
                                </div>
            </div>
        </div>
        <?php } ?>
    </div>

</div>
<!-- Checks if there is a current session ongoing to display the add product and place bid options -->
<?php if( isset($_SESSION['usr']) ){
        echo '<a href="addproduct.php" class ="btn1 z-depth-0 ">Add Product</a>  ';
    }
?>

<?php include('Templates/footer.php') ?>


</body>
</html>
