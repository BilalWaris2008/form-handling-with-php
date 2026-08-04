<?php

include("./config.php");


$email = "";
$emailError = "";
$passwordError = "";

if (isset($_POST['submit'])) {
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);

    if (empty($email)) {
        $emailError = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Please Enter a Valid Email Address";
    }

    if (empty($password)) {
        $passwordError = "Password is required";
    }

    if (
        empty($emailError) &&
        empty($passwordError)
    ) {
        $query = "SELECT * FROM admin
        WHERE email = '$email' AND password = '$password'";

        $result = mysqli_query($connection, $query);

        if (mysqli_num_rows($result) > 0) {
            echo "<script>
                 alert('Login Successfully');
                 window.location.href ='preview.php';
             </script>";
        } else {
            echo "<script> 
            alert('Invalid Email or Password')
            </script>";
        }
    }
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./style.css">
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="register-card">
                    <h3 class="text-center mb-4">Admin Login</h3>

                    <form id="registerForm" method="post">


                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control <?= !empty($emailError) ? 'is-invalid' : '' ?>"
                                name="email" id="email" value="<?= htmlspecialchars($email) ?>">
                            <div class="invalid-feedback">
                                <?= $emailError ?>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control <?= !empty($passwordError) ? 'is-invalid' : '' ?> "
                                name="password" id="password">
                            <div id="passwordStrength" class="password-strength mt-1"></div>
                            <div class="invalid-feedback">
                                <?= $passwordError ?>
                            </div>
                        </div>

                        <button type="submit" name="submit" class="btn btn-primary w-100">Login</button>

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