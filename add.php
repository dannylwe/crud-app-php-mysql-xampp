<!-- when using a get method, the params and values are stored 
in the urlbar -->
<?php 
    $title = $email = $ingredients = "";
    $errors = array('email'=> '', 'title'=> '', 'ingredients'=> '');
    

    if(isset($_POST['submit'])){
        // use built in htmlspecialchars to prevent xcss
        if(empty($_POST['email'])){
            $errors['email'] = "email fields must be filled <br />";
        } else {
            // check email
            $email = htmlspecialchars($_POST['email']);
            if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
                $errors['email'] = 'must be a valid email address';
            }
        }

        // check title
        if(empty($_POST['title'])){
            $errors['title'] = "title fields must be filled <br />";
        } else {
            $title = htmlspecialchars($_POST['title']);
            if(!preg_match('/^[a-zA-Z\s]+$/', $title)){
                $errors['title'] = 'Title must be letters and spaces only';
            }
        }

        // check ingredients
		if(empty($_POST['ingredients'])){
			$errors['ingredients'] = 'At least one ingredient is required <br />';
		} else {
			$ingredients = $_POST['ingredients'];
			if(!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)){
				$errors['ingredients'] = 'Ingredients must be a comma separated list';
			}
		}
    }
?>

<!DOCTYPE html>
<html lang="en">

    <!-- header and footer templates -->
    <?php include('templates/header.php'); ?>
    <section class="container grey-text">
        <h4 class="center">Add a Pizza</h4>
        <form class="white" action="add.php" method="POST">
            <label>Your Email:</label>
            <input type="text" name="email" value="<?php echo htmlspecialchars($email) ?>" />
            <div class="red-text"><?php echo $errors['email']; ?></div>
            <label>Pizza Title:</label>
            <input type="text" name="title" value="<?php echo htmlspecialchars($title) ?>" />
            <div class="red-text"><?php echo $errors['title']; ?></div>
            <label>Ingredients (comma separated):</label>
            <input type="text" name="ingredients" value="<?php echo htmlspecialchars($ingredients) ?>" />
            <div class="red-text"><?php echo $errors['ingredients']; ?></div>
            <div class="center">
                <input type="submit" name="submit" value="submit" class="btn brand z-depth-0" />
            </div>
        </form>
    </section>
    <?php include('templates/footer.php'); ?>


</html>