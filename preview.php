<?php

include("./config.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="./preview.css">
</head>

<?php

$query = "select * from login.users";
$result = mysqli_query($connection, $query);

?>


<body>

    <h1>
        Users Data
    </h1>
    <div class="table">

        <table>
            <tr>
                <th>ID</th>
                <th>USERNAME</th>
                <th>EMAIL</th>
                <th>PASSWORD</th>
                <th>ACTIONS</th>
            </tr>

            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo "      
                <tr>
                <td>".$row['id']."</td>
                <td>".$row['fullname']."</td>
                <td>".$row['email']."</td>
                <td>".$row['password']."</td>
                <td><button class='edit'>Edit</button><button class='delete'>Delete</button></td>
            
                </tr>";
            }

            ?>


        </table>
    </div>

</body>

</html>