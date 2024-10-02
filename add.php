<?php
$title = $email = $ingredients = '';

$errors = array('email' => '', 'pizza-title' => '', 'ingredients' => '');

if (isset($_POST['submit'])) {

    if (empty($_POST['email'])) {
        $errors['email'] = 'Email is required' . '<br>';
    } else {
        $email = $_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = "Email must be a valid email address" . '<br>';
        }
    }
    if (empty($_POST['pizza-title'])) {
        $errors['pizza-title'] = 'Please enter a pizza title' . '<br>';
    } else {
        $title = $_POST['pizza-title'];
        if (!preg_match('/^[a-zA-Z\s]+$/', $title)) {
            $errors['pizza-title'] = 'Title must be letters and spaces only' . '<br>';
        }
    }
    if (empty($_POST['ingredients'])) {
        $errors['ingredients'] = 'Please enter at least one ingredient';
    } else {
        $ingredients = $_POST['ingredients'];
        if (!preg_match('/^([a-zA-Z\s]+)(,\s*[a-zA-Z\s]*)*$/', $ingredients)) {
            $errors['ingredients'] = 'Ingredients must be a comma separated list' . '<br>';
        }
    }

    if (!array_filter($errors)) {
        header('Location: index.php');
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
        <input type="email" name="email" id="email" value="<?php echo htmlspecialchars($email); ?>">
        <div class="red-text"><?php echo $errors['email']; ?></div>
        <label for="pizza-title">Pizza Title:</label>
        <input type="text" name="pizza-title" id="pizza-title" value="<?php echo htmlspecialchars($title); ?>">
        <div class="red-text"><?php echo $errors['pizza-title']; ?></div>
        <label for="ingredients">Ingredients (comma seperated):</label>
        <input type="text" name="ingredients" id="ingredients" value="<?php echo htmlspecialchars($ingredients); ?>">
        <div class="red-text"><?php echo $errors['ingredients']; ?></div>
        <div class="center">
            <input type="submit" name="submit" value="submit" class="btn brand z-depth-0">
        </div>
    </form>
</section>

<?php include('templates/footer.php'); ?>

</html>