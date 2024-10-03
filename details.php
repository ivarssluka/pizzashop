<?php

global $conn;
include 'config/db_connect.php';
if (isset($_POST['delete'])) {
    $id_to_delete = mysqli_real_escape_string($conn, $_POST['id_to_delete']);

    $sql = "DELETE FROM pizzas WHERE id = $id_to_delete";
    if (mysqli_query($conn, $sql)) {
        //success
        header('Location: index.php');
    } else {
        //failure
        echo 'Query error: ' . mysqli_error($conn);
    }
}

//check GET request id param
if (isset($_GET['id'])) {
    $id = mysqli_real_escape_string($conn, $_GET['id']);

    // make sql
    $sql = "SELECT * FROM pizzas WHERE id = $id";

    // get the query result
    $result = mysqli_query($conn, $sql);

    // fetch result in array format
    $pizza = mysqli_fetch_assoc($result);

    //free result from memory
    mysqli_free_result($result);

    //close connection
    mysqli_close($conn);

//    print_r($pizza);
}

?>

<!doctype html>
<html lang="en">

<?php include('templates/header.php'); ?>

<div class="container center">
    <?php if ($pizza): ?>
        <h4><?php echo htmlspecialchars($pizza['title']); ?></h4>
        <h5>Created by: </h5>
        <p><?php echo htmlspecialchars($pizza['email']); ?></p>
        <h5>Created at: </h5>
        <p><?php echo($pizza['created_at']); ?></p>
        <h5>Ingredients: </h5>
        <p><?php echo htmlspecialchars($pizza['ingredients']); ?></p>

        <!-- Delete form -->
        <form action="details.php" method="post">
            <input type="hidden" name="id_to_delete" value="<?php echo $pizza['id']; ?>">
            <input type="submit" name="delete" value="Delete" class="btn brand z-depth-0">
        </form>

    <?php else: ?>
        <h5>No such pizza exists...</h5>

    <?php endif; ?>
</div>

<?php include('templates/footer.php'); ?>

</html>
