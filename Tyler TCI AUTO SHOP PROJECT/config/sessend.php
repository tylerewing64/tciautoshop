<?php
//connec to database
include('db_connect.php');
//Include the loginbar
include('../Templates/loginbar.php');
//Ends session
session_unset();



?>


<html>
    <body>

    <?php
    //goes to the index
    header("location: ../index.php"); 
    
    
    ?>

    </body>

</html>