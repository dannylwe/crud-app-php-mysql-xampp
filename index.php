<?php
// connect to database
$conn = mysqli_connect('localhost', 'acehanks', 'test1234', 'ninja_pizza');

// check connection
if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}

$sql = 'SELECT id, title, ingridents FROM pizzas';

// make query
$result = mysqli_query($conn, $sql);

// fetch resulting records
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

print_r($pizzas);
?>


<!DOCTYPE html>
<html lang="en">

    <!-- header and footer templates -->
    <?php include('templates/header.php'); ?>
    <?php include('templates/footer.php'); ?>


</html>