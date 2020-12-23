<!-- PHP SECTION -->
<?php
//Connects to the database
include('./config/db_connect.php');

//Checks if the session is set
if( isset($_SESSION['usr']) ){
//Sets variable name to the current sessions username
$name = $_SESSION['usr'];
} 
else {

$name = "Guest";
}

?>


<!-- CSS SECTION -->
<style type="text/css">
    
    .search-bar {
        
 
 
  
    }

    .brand{
        color:white !important;
    }

    .brand-text{
        color:black !important;
        position:absolute;
        left:20px;

    }
    .nav-text{
        color:black;
        padding-left:10px;
    }
    .nav-text:hover{
        color:#2BBBAD;
      
    }

    .nav-text1  {

     color: black;
    font-size:25px;
    
    }

    .nav-text1:hover{
        color:#2BBBAD;
      
    }

    .form_top{
        margin:0px;
        padding:0px;
        position:
    }
    
    body{
    margin: 0;
    width: 100vw;
    height: 100vh;
}
   

</style>
<HTML>
<head>

    <title></title>



</head>
<body>
<body class="grey lighten-4">

    <nav class = "white z-depth-0">
    
        <div class ="container">
        <form  class = "form_top" action ="search.php" method = "get">
            <a href="index.php" class ="brand-logo brand-text">TCI AUTO SHOP</a>
            <ul id="nav-mobile" class="right hide-on-small-and-down">
            <li><a href="newlistings.php" class="nav-text">New Listings</a></li>
            <li><a href="vehicles.php" class="nav-text">Vehicles</a></li>
            <li><a href="vehiclesparts.php" class="nav-text">Vehicles Parts</a></li>



            <li><input type="text" class ="search-bar" name ="search" placeholder="Search.."></li>
            <li><input type ="submit" class ="btn brand z-depth-0" name = "submit">Search</a></li>
            <li class= "nav-text1">Welcome <?php echo htmlspecialchars($name); ?></li>
            </form>

            
            </ul> 
        </div>
    </nav> 
</body>
    </html>