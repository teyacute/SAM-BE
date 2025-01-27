<?php
session_start();

include 'connect.php';

if (empty($_SESSION['username'])) {
    $_SESSION['username'] = "";
}

if (empty($_SESSION['logged'])) {
    $_SESSION['logged'] = "";
}

if ($_SESSION['logged'] != "logged") {
    $_SESSION['logged'] = "";
} else {
    header('Location: index.php');
}

if (isset($_POST['loginButton'])) {
    $logUsername = $_POST['username'];
    $logPassword = $_POST['password'];

    $logQuery = "SELECT * FROM `users` WHERE username= '" . $logUsername . "' AND password= '" . $logPassword . "'";

    $results = mysqli_query($conn, $logQuery);

    $count = mysqli_num_rows($results);

    if ($count == 1) {
        $_SESSION['username'] = $logUsername;
        $_SESSION['logged'] = "logged";
        header('location: index.php');
    } else {
        echo "<p style='color: red;'>Invalid username or password.</p>";
        echo "<a href='login.php'>Try Again</a>";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Olympian Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="assets/Icon.png" type="image/x-icon">
    <style>
        body {
            background-image: url('assets/logbg.jpg');
            background-size: cover;
            background-position: center;
            background-repeat: no-repeat;
            height: 100vh;
            margin: 0;
        }

        .login-container {
            background: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 30px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
        }

        .olympic-logo {
            width: 100px;
            margin-bottom: 20px;
        }

        .btn-olympic {
            background: #0085C7;
            color: white;
            border: none;
            transition: background 0.3s ease;
        }

        .btn-olympic:hover {
            background: #0066A2;
        }

        .form-control:focus {
            border-color: #0085C7;
            box-shadow: 0 0 5px rgba(0, 133, 199, 0.5);
        }
    </style>
</head>

<body>
    <div class="container text-center d-flex justify-content-center align-items-center" style="height: 100vh;">
        <div class="login-container">
            <img src="https://upload.wikimedia.org/wikipedia/commons/5/5c/Olympic_rings_without_rims.svg"
                alt="Olympic Logo" class="olympic-logo">
            <h2 class="mb-4">Login</h2>
            <form action="login.php" method="post">
                <div class="form-group mb-3">
                    <label for="username" class="form-label">Username:</label>
                    <input type="text" name="username" class="form-control" required>
                </div>
                <div class="form-group mb-4">
                    <label for="password" class="form-label">Password:</label>
                    <input type="password" name="password" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-olympic btn-block" name="loginButton">Login</button>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>