<!-- PHP SECTION -->
<?php
//Connects to database
$conn = mysqli_connect('localhost', 'root', '', 'login');

//If a connection error exists print connection error
if(!$conn){
    echo 'connection error';

}

//Checks if the submit button is pressed
if(isset($_POST['submit'])){


//Add data to database
$product_name = $_POST['pname'];
$product_price= $_POST['pprice'];
$product_description = $_POST['pdesc'];
$product_img = $_POST['p_img'];
$product_keywords = $_POST['pkeywords'];


//Checks to see if p_img is set
  if(isset($_FILES['p_img'])){
    //Set the variables needed for move_uploaded_file function
    $file_name = $_FILES['p_img']['name'];
    $file_tmp = $_FILES['p_img']['tmp_name'] ;

    //Defines what a file ext is by exploding the string by the punctuation mark
    $fileExt = explode ('.', $file_name);
    $fileActualExt= strtolower(end($fileExt));
    //Creates an array that contains allowed file extensions that can be uploaded to the site
    $allowed = array('jpg', 'jpeg', 'png', 'gif');
    

    //Checks the file's extension and if the extension is in the $allowed array 
    if(in_array($fileActualExt, $allowed)){
    //Gives the uploaded files an unique name when placed in the destination file
    $file_name_new  = uniqid('',true).".".$fileActualExt;
    //Name the upload folder
    $upload_folder = "file/";
    //Moves file to the destination
    $movefile = move_uploaded_file( $file_tmp, $upload_folder .$file_name_new);

   //Starts a new session 
   session_start();
   //Sets the username variable to the current username of the person in session
   $username = $_SESSION['usr'];
   //Creates query which inserts all the form data into the products table
   $sqladd = "INSERT INTO products( pname, pprice, pdesc, pimg, pkeywords, username ) VALUES('$product_name', '$product_price', '$product_description', '$file_name_new', '$product_keywords', '$username')";
   
   //Run the query
   mysqli_query($conn, $sqladd);

   //Returns to the index 
   header("location: ./index.php");


  }
  //If the user did not meet the if statements requirements then print you did not upload an image
   else {
 

      echo "You did not upload an image !";
  }
    
    }
    


}
//Intializing
$pimg = '';
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

.register-link{
    padding:30px;
}



</style>

<!-- HTML SECTION -->
<!DOCTYPE html>
<html>
<title>Add A Product</title>


<!-- Including the header template files  -->
<?php include('Templates/loginbar.php') ?>
<?php include('Templates/header1.php') ?>

<!-- Creates a Form -->
<section class="container grey-text">
    <h4 class = "center"> List A Product</h4>
    <form class ="form_add" action ="addproduct.php" method="POST"  enctype = "multipart/form-data" >
        <label>Product Name:</label>
        <input type ="text" name ="pname" required>
        <label>Product Price:</label>
        <input type ="text" name ="pprice"  required>
        <label>Product Description:</label>
        <input type = "text" name ="pdesc" required>
        <label>Product Keywords:</label>
        <input type = "text" name ="pkeywords" required>         
        <label>Product Image:</label>
        <input type = "file" class = "img" name ="p_img" required>



        <div class = "center">
            <input type="submit" name="submit" value="submit" class ="btn brand z-depth-0">

            
</div>
</form>



</section>
</body>

<!-- Footer -->
<?php include('Templates/footer.php') ?>



</html>
