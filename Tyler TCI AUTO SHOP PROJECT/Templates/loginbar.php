<?php 
//Start a session

session_start();


?>

<style type= "text/css">

*{
    padding: 0;
    margin: 0;
}

body {
    font-family: montserrat;
}

.login-bar  {
background-color: black;
margin: 0;
height: 20px;


}
.login-bar  li {
    display: inline;
    
    color: white;

}

.login-bar a{ 
    margin-left:1270px;
    text-decoration: none;
    color: white;


    
}

html, body, {
    position:fixed;
    top:0;
    bottom:0;
    left:0;
    right:0;
}

</style>

<head></head>

<body><div class = "login-bar">

    <ul>
    
    
     
        


   
        
        <li> 
        <?php 
        //Checks if there is an active session to decide wether to display the login or logout button
        if( !isset($_SESSION['usr']) ){

        echo "<a href= 'login.php'>Login </a>";
        
        
            
        }
        else {
       
       echo "<a href= 'config/sessend.php'>Logout</a>";
       
       
            
            
        }




        
        
        ?>  </li>
        
        


        </ul>     

    
</div>
</body>
