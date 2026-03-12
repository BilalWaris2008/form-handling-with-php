<?php

include("./config.php");

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Professional Register Form</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="./style.css">
</head>

<body>

    <?php

    // $text = "Batch 2025";

    // echo $text;

    // $fullname = "Azaan Ajmal Roghani";
    // $email = "roghani@gmail.com";
    // $number = "123456789";
    // $password = "Roghani@123";


    // echo $fullname;
    // echo "<br>";
    // echo $email;
    // echo "<br>";
    // echo $number;
    // echo "<br>";
    // echo $password;
    // echo "<br>";


    // $value1 = 150;
    // $value2 = 50;

    // echo $value1 + $value2;
    // echo "<br>";
    // echo $value1 - $value2;
    // echo "<br>";
    // echo $value1 * $value2;
    // echo "<br>";
    // echo $value1 / $value2;
    // echo "<br>";
    // echo $value1 % $value2;
    // echo "<br>";


    // $marks = 70;

    // if($marks >= 70){
    //     echo "Grade A";
    // } else{
    //     echo "Grade B";
    // };


    if (isset($_POST['submit'])) {

        $fullname = $_POST['fullname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        $query = "insert into users 
    (fullname, email, password, cpassword)
    values('$fullname', '$email', '$password', '$cpassword')";

        if (mysqli_query($connection, $query)) {
            echo "<script>
            alert('Registered Successfully')
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
                    <h3 class="text-center mb-4">Create Account</h3>

                    <form id="registerForm" method="post">

                        <div class="mb-3">
                            <label class="form-label">Full Name</label>
                            <input type="text" class="form-control" name="fullname" id="fullName" required>
                            <div class="invalid-feedback">
                                Please enter your full name.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Email address</label>
                            <input type="email" class="form-control" name="email" id="email" required>
                            <div class="invalid-feedback">
                                Please enter a valid email.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" required>
                            <div id="passwordStrength" class="password-strength mt-1"></div>
                            <div class="invalid-feedback">
                                Password must be at least 6 characters.
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" name="cpassword" id="confirmPassword" required>
                            <div class="invalid-feedback">
                                Passwords do not match.
                            </div>
                        </div>

                        <!-- <div class="mb-3 form-check">
                        <input type="checkbox" class="form-check-input" id="terms" required>
                        <label class="form-check-label">I agree to the Terms & Conditions</label>
                        <div class="invalid-feedback">
                            You must agree before submitting.
                        </div>
                    </div> -->

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