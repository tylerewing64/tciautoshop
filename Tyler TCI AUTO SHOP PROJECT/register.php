<?php

//Connects to database
include('config/db_connect.php');



if(isset($_POST['submit'])){
    echo $_POST['email'];

//Add data to database

$email = $_POST['reg_email'];
$username = $_POST['reg_username'];
$password = $_POST['reg_password'];

//Create Query
$sql = "INSERT INTO users(email, usr, pwd) VALUES('$email', '$username', '$password')";

//Runs query
mysqli_query($conn, $sql);

//Redirect to index
header("location: ./index.php");




}


?>





<!-- CSS SECTION -->
<style type="text/css">
.form_reg{
background-color:white;
max-width:460px;
margin:20px auto;
padding: 20px;
}

.register-link{
    padding:30px;
}

</style>


<!-- HTML SECTION -->
<!DOCTYPE html>
<html>
    <title>Register</title>


<!-- Including templates files -->
<?php include('Templates/loginbar.php') ?>
<?php include('Templates/header1.php') ?>

<body>
<!-- Create form -->
<section class="container grey-text">
    <h4 class = "center"> Register</h4>
    <form class ="form_reg" action ="register.php" method="POST">
        <label>Email:</label>
        <input type ="text" name ="reg_email">
        <label>Username:</label>
        <input type ="text" name ="reg_username">
        <label>Password:</label>
        <input type = "text" name ="reg_password">

        <div class = "center">
            <input type="submit" name="submit" value="sumbit" class ="btn brand z-depth-0">
</div>


</form>

</section>
</body>


<!-- Footer -->
<?php include('Templates/footer.php') ?>


</body>
</html>
