<?php 

include('./config/db_connect.php');
//check GET id params
if(isset($_GET['id'])){
    $id = mysqli_real_escape_string($conn, $_GET['id']);
    $sql = "SELECT * FROM pizzas WHERE id = $id";

    //get result
    $result = mysqli_query($conn, $sql);
    //get single record
    $singlePizza = mysqli_fetch_assoc($result);

    mysqli_free_result($result);
    mysqli_close($conn);

}
?>

<!DOCTYPE html>
<html lang="en">

<!-- header and footer --> 
<?php include('templates/header.php'); ?>
<div class="container center">
    <?php if($singlePizza): ?>

        <h4><?php echo htmlspecialchars($singlePizza['title']); ?></h4>
        <p>Created By<?php echo htmlspecialchars($singlePizza['email']); ?></p>
        <p><?php echo date($singlePizza['created_at']); ?></p>
        <h5>Ingredients:</h5>
        <p><?php echo htmlspecialchars($singlePizza['ingridents']); ?></p>
    
    <?php else: ?>
        <h5>No such Pizza exists!</h5>
    <?php endif; ?>
</div>
<?php include('templates/footer.php'); ?>

</html>