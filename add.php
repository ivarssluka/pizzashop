<?php

if (isset($_POST['submit'])) {

    if (empty($_POST['email'])) {
        echo 'Email is required' . '<br>';
    } else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "Email must be a valid email address" . '<br>';
        }
    }
    if (empty($_POST['pizza-title'])) {
        echo 'Please enter a pizza title' . '<br>';
    } else {
        $title = $_POST['pizza-title'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
            echo 'Title must be letters and spaces only' . '<br>';
        }
    }
    if (empty($_POST['ingredients'])) {
        echo 'Please enter at least one ingredient';
    } else {
        $ingredients = $_POST['ingredients'];
        if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
            echo 'Ingredients must be a comma separated list' . '<br>';
        }
    }
} // End of the POST check
?>

<!doctype html>
<html lang="en">

<?php include('templates/header.php'); ?>

<section class="container grey-text">
    <h4 class="center">Add a Pizza</h4>
    <form action="add.php" method="POST" class="white">
        <label for="email">Your Email:</label>
        <input type="email" name="email" id="email">
        <label for="pizza-title">Pizza Title:</label>
        <input type="text" name="pizza-title" id="pizza-title">
        <label for="ingredients">Ingredients (comma seperated):</label>
        <input type="text" name="ingredients" id="ingredients">
        <div class="center">
            <input type="submit" name="submit" value="submit" class="waves-effect waves-light btn brand z-depth-0">
        </div>
    </form>
</section>

<?php include('templates/footer.php'); ?>

</html>