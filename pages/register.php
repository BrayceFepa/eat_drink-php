<?php
require_once("../functions/register.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>EAT & DRINK SHOP</title>
    <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <style>
        .login-form {
            width: 340px;
            margin: 50px auto;
            font-size: 15px;
        }

        .login-form form {
            margin-bottom: 15px;
            background: #f7f7f7;
            box-shadow: 0px 2px 2px rgba(0, 0, 0, 0.3);
            padding: 30px;
        }

        .login-form h2 {
            margin: 0 0 15px;
        }

        .form-control,
        .btn {
            min-height: 38px;
            border-radius: 2px;
        }

        .btn {
            font-size: 15px;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <?php
    if (isset($errors)) {
        echo "<p>$errors</p>";
    }
    if (isset($success)) {
        echo "<p>$success</p>";
    }
    ?>
    <div class="container bg-white rounded-top mt-5" id="zero-pad">
        <div class="row d-flex justify-content-center">
            <div class="col-lg-10 col-12 pt-3">
                <div class="d-flex">
                    <div class="pt-1">
                        <h4><a href="../index.php">EAT & DRINK SHOP</a> </h4>
                    </div>
                    <div class="ml-auto p-2"><a href="login.php" class="text-dark text-decoration-none" id="mobile-font">LOGIN</a></div>
                    <div class="p-2"><a href="register.php" class="text-dark text-decoration-none a" id="mobile-font">REGISTER</a></div>
                </div>
                <div class="login-form">
                    <form action="register.php" method="post">
                        <h2 class="text-center">Sign in</h2>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="FirstName" required="required" name="name">
                        </div>
                        <div class="form-group">
                            <input type="email" class="form-control" placeholder="Email" required="required" name="email">
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-control" placeholder="Phone number" required="required" name="phone">
                        </div>
                        <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" required="required" name="password">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary bg-dark btn-block" name="submit">Sign in</button>
                        </div>

                    </form>
                    <p class="text-center"><a href="login.php">Back to Login</a></p>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="../js/jquery.min.js"></script>
</body>

</html>