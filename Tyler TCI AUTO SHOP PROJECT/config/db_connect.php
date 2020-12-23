<?php
//Connects to the database login

$conn = mysqli_connect('localhost', 'root', '', 'login');


if(!$conn){
    echo 'connection error';

}



?>