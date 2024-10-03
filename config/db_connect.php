<?php

// connect to database
$conn = mysqli_connect('YOURHOST', 'YOURUSER', 'YOURPASS', 'YOURDB');

//check connection
if (!$conn) {
    echo 'Connection error:' . mysqli_connect_error();
}