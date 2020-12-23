<!-- PHP SECTION -->

<?php
include('config/db_connect.php');
//write query for all products

$sql = "SELECT productid, pname, pprice, pdesc, pimg, created_at  FROM  products WHERE pkeywords LIKE '%vparts%' OR '%vehicles parts' ";


//make query and get results
$result = mysqli_query($conn, $sql);

//fetch the resulting rows as an array

$products = mysqli_fetch_all($result, MYSQLI_ASSOC);

//Intializing variables
$pname ='';
$pdesc= '';
$created_at ='';
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


.headimg{
    
  
    width : 1360px;
    height:200px;
    margin:0px;
    object-fit: cover;

    
}

</style>

<!-- HTML SECTION -->
<!DOCTYPE html>
<html>
    
<title>Vehicle Parts</title>


<!-- Including header files for header section of the webpage -->
<?php include('Templates/loginbar.php') ?>
<?php include('Templates/header1.php') ?>

<!-- Getting the header image from the root file -->
<img class = "headimg" src = "m8.jpg">

<h4 class="center grey-text">Vehicle parts</h4>

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
<div class = "containerone">
<?php if( isset($_SESSION['usr']) ){
        echo '<a href="addproduct.php" class ="btn1 z-depth-0 ">Add Product</a>  ';
    }
?>


<?php if( isset($_SESSION['usr']) ){
        echo '<a href="placebid.php" class ="btn1 z-depth-0 ">Place Bid</a>  ';
    }
?>
</div>

<?php include('Templates/footer.php') ?>


</body>
</html>
