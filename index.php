<?php
// connect to database
$conn = mysqli_connect('localhost', 'acehanks', 'test1234', 'ninja_pizza');

// check connection
if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}
?>


<!DOCTYPE html>
<html lang="en">

    <!-- header and footer templates -->
    <?php include('templates/header.php'); ?>
    <?php include('templates/footer.php'); ?>


</html>