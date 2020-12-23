<!-- PHP SECTION -->
<?php
//Connects to database
include('config/db_connect.php');


//Checks if the submit button is set
if(isset($_POST['submit'])){

//sets variables to the form values entered
$usr = $_POST['username'];
$pwd = $_POST['password'];

//Create a query to select all columns from the user table where the usr is equal to usr variable and pwd equal to pwd variable
$query = "select * from users where usr = '$usr' and pwd = '$pwd'";
$result = mysqli_query($conn,$query);

//Checks if there is a row that is equal to the result of the query
if($row=mysqli_fetch_assoc($result)){
//Starts a new session
    session_start();
//Sets the session variables to the rows correlated with it in the users table
    $_SESSION['id'] = $row['id'];
    $_SESSION['usr'] = $row['usr'];
    $_SESSION['email'] = $row['email'];
    $_SESSION['created_at'] = $row['created_at'];


//Redirects to the header file
    header("location: ./index.php");



}

else {

    echo "Wrong Email or Password!! ";
}


}
    

?>
<!-- CSS SECTION -->
<style type="text/css">
.form_log{
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

<title>Login </title>



<!-- Include the header template files -->
<?php include('Templates/loginbar.php') ?>
<?php include('Templates/header1.php') ?>
<body>
<!-- Create form-->
<section class="container grey-text">
    <h4 class = "center"> Login</h4>
    <form class ="form_log" action ="login.php" method="POST">
        <label>Username:</label>
        <input type ="text" name ="username">
        <label>Password:</label>
        <input type = "text" name ="password">

        <div class = "center">
            <input type="submit" name="submit" value="sumbit" class ="btn brand z-depth-0">
</div>
<!-- Link to register form -->
<div class = "center register-link">
    <a href ="register.php">Dont have an account?</a>
</div>

</form>

</section>
</body>


<!-- Footer -->
<?php include('Templates/footer.php') ?>



</html>
