<?php

// connect to database
$conn = mysqli_connect('localhost', 'root', '', 'pizzas');

//check connection
if(!$conn){
    echo 'Connection error:' . mysqli_connect_error();
}

// write a query for all pizzas

$sql = 'SELECT title, ingredients, id FROM pizzas';

// make query and get result
$result = mysqli_query($conn, $sql);

// fetch the resulting rows as an array
$pizzas = mysqli_fetch_all($result, MYSQLI_ASSOC);

// free result from memory
mysqli_free_result($result);

// close connection
mysqli_close($conn);

print_r($pizzas);

?>
<!doctype html>
<html lang="en">

<?php include('templates/header.php'); ?>

<?php include('templates/footer.php'); ?>

</html>