<?php session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container mt-5">
    <div class="card p-4 shadow">
        <h3 class="text-center mb-3">Admin Login</h3>

        <form method="POST">
            <input type="text" name="username" class="form-control mb-3" placeholder="Username" required>
            <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

            <button name="login" class="btn btn-primary w-100">Login</button>
        </form>

        <?php
        if (isset($_POST['login'])) {
            $user = $_POST['username'];
            $pass = $_POST['password'];

            // simple static login
            if ($user == "admin" && $pass == "1234") {
                $_SESSION['admin'] = true;
                header("Location: admin.php");
            } else {
                echo "<div class='alert alert-danger mt-3'>Invalid Login</div>";
            }
        }
        ?>
    </div>
</div>

</body>
</html>