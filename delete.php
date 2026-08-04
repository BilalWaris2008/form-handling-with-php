<?php

include('./config.php');

if (isset($_GET['deleteid'])) {

    $id = $_GET['deleteid'];
    // echo $id;

    $query = "delete from users where id=$id";
    mysqli_query($connection, $query);
}

header("Location: preview.php")

?>
