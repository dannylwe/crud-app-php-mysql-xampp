<?php
// connect to database
$conn = mysqli_connect('localhost', 'acehanks', 'test1234', 'ninja_pizza');

// check connection
if(!$conn){
    echo 'Connection error: ' . mysqli_connect_error();
}

$sql = 'SELECT id, title, ingridents FROM pizzas ORDER BY created_at';

// make query
$result = mysqli_query($conn, $sql);

// fetch resulting records
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free memory and close connection
mysqli_free_result($result);
mysqli_close($conn);
// print_r($pizzas);
?>


<!DOCTYPE html>
<html lang="en">

    <!-- header and footer templates -->
    <?php include('templates/header.php'); ?>

    <h4 class="center grey-text"></h4>
    <div class="container">
        <div class="row">
            <?php foreach($pizzas as $pizza): ?>
                <div class="col s6 md3">
                    <div class="card z-depth-0">
                        <div class="card-content center">
                            <h6><?php echo htmlspecialchars($pizza['title']); ?></h6>
                            <ul>
                                <?php foreach(explode(',', $pizza['ingridents']) as $ing): ?>
                                    <li><?php echo htmlspecialchars($ing) ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>
                        <div class="card-action right-align">
                            <a href="#" class="brand-text">More Info</a>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
        </div>
    </div>

    <?php include('templates/footer.php'); ?>


</html>