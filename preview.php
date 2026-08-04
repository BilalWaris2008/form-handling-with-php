<?php

include("./config.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css"
        integrity="sha512-2SwdPD6INVrV/lHTZbO2nodKhrnDdJK9/kg2XD1r9uGqPo1cUbujc+IYdlYdEErWNu69gVcYgdxlmVmzTWnetw=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./preview.css">
</head>

<?php

$query = "select * from login.users";
$result = mysqli_query($connection, $query);

?>

<body>

    <div class="dashboard">
        <div class="side-bar">
            <h2>Side Panel</h2>
            <ul>
                <li class="active">Dashboard</li>
                <a href="./adminlogin.php"><li>Logout</li></a>
            </ul>
        </div>

        <div class="main">
            <div class="top-bar">
                <h2>DASHBOARD</h2>
            </div>
            <div class="table">
                <div class="table-top">
                    <h3>Users Data</h3>
                    <a href="./index.php" class="btn add"><i class="fa-solid fa-plus icon"></i> Add Data</a>
                </div>
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
                        <td>" . $row['id'] . "</td>
                        <td>" . $row['fullname'] . "</td>
                        <td>" . $row['email'] . "</td>
                        <td>" . $row['password'] . "</td>
                        <td>
                            <a href=./update.php?id={$row['id']} class='btn edit'>Edit</a>
                            <a href='./delete.php?deleteid={$row['id']}' onclick='return confirm(\"Are you sure delete this user?\") '  class='btn delete'>Delete</a>
                        </td>
                    </tr>
                        ";
                    }

                    ?>
                </table>
            </div>
        </div>

        
    </div>

</body>

</html>