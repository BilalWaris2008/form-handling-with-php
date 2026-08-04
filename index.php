<?php

include("./config.php");

$fullname = "";
$email = "";

$fullnameError = "";
$emailError = "";
$passwordError = "";
$cpasswordError = "";

if (isset($_POST['submit'])) {
    $fullname = trim($_POST['fullname']);
    $email = trim($_POST['email']);
    $password = trim($_POST['password']);
    $cpassword = trim($_POST['cpassword']);

    if (empty($fullname)) {
        $fullnameError = "Full Name is required";
    }

    if (empty($email)) {
        $emailError = "Email is required";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailError = "Please Enter a Valid Email Address";
    }

    if (empty($password)) {
        $passwordError = "Password is required";
    } elseif (strlen($password) < 6) {
        $passwordError = "Password must be at least 6 characters";
    }

    if (empty($cpassword)) {
        $cpasswordError = "Confirm Password is required";
    } elseif ($password != $cpassword) {
        $cpasswordError = "Passwords do not match";
    }

    if (
        empty($fullnameError) &&
        empty($emailError) &&
        empty($passwordError) &&
        empty($cpasswordError)
    ) {
        $query = "INSERT INTO users(fullname, email, password, cpassword)
        VALUES('$fullname', '$email', '$password', '$cpassword')";

        if (mysqli_query($connection, $query)) {
            echo "<script>
                    alert('Registered Successfully');
                    window.location.href='adminlogin.php';
                  </script>";
        } else {
            echo mysqli_error($connection);
        }
    }
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Professional Register Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="./style.css">
</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 col-lg-5">
                <div class="register-card">
                    <h3 class="text-center mb-4">Create Account</h3>

                    <form id="registerForm" method="post">

                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control <?= !empty($fullnameError) ? 'is-invalid' : '' ?>"
                                name="fullname" id="fullName" value="<?= htmlspecialchars($fullname) ?>">
                            <div class="invalid-feedback">
                                <?= $fullnameError ?>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control <?= !empty($emailError) ? 'is-invalid' : '' ?> "
                                name="email" id="email" value="<?= htmlspecialchars($email) ?>">
                            <div class="invalid-feedback">
                                <?= $emailError ?>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control <?= !empty($passwordError) ? 'is-invalid' : '' ?>  "
                                name="password" id="password">
                            <div id="passwordStrength" class="password-strength mt-1"></div>
                            <div class="invalid-feedback">
                                <?= $passwordError ?>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control <?= !empty($cpasswordError) ? 'is-invalid' : '' ?> "
                                name="cpassword" id="confirmPassword">
                            <div class="invalid-feedback">
                                <?= $cpasswordError ?>
                            </div>
                        </div>
                        <button type="submit" name="submit" class="btn btn-primary w-100">Register</button>

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