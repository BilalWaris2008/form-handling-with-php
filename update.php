<?php

include("./config.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Professional Register Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./style.css">
</head>

<body>

    <?php

    $id = $_GET['id'];

    $sql = "select * from  `login`.`users` where id=$id";
    $result = mysqli_query($connection, $sql);
    $row = mysqli_fetch_assoc($result);

    $fullname = $row['fullname'];
    $email = $row['email'];
    $password = $row['password'];


    if (isset($_POST['submit'])) {

        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $query = "update `login`.`users` set
        `fullname` = '$fullname', 
        `email` = '$email',
        `password` = '$password'
        where `users`.`id` = '$id'     
        ";

        if (mysqli_query($connection, $query)) {
            echo "<script>
            alert('Update data  Successfully')
            window.location.href = './preview.php'
        </script>";
        } else {
            echo "Error" . mysqli_error($connection);
        }
    }

    ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="register-card">
                    <h3 class="text-center mb-4">Update Account</h3>

                    <form id="registerForm" method="post">

                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" value="<?php echo $fullname ?>" name="fullname" id="fullName" required>
                            <div class="invalid-feedback">
                                Please enter your full name.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" value="<?php echo $email ?>" name="email" id="email" required>
                            <div class="invalid-feedback">
                                Please enter a valid email.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" value="<?php echo $password ?>" name="password" id="password" required>
                            <div id="passwordStrength" class="password-strength mt-1"></div>
                            <div class="invalid-feedback">
                                Password must be at least 6 characters.
                            </div>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary w-100">Update</button>

                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="./login.js"></script>

</body>

</html>