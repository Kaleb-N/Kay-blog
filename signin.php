<?php
require 'config/database.php';

// get back form data if there was a login error
$username_email = $_SESSION['signin-data']['username_email'] ?? null;
$password = $_SESSION['signin-data']['password'] ?? null;

unset($_SESSION['signin-data']);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KayPlanet</title>
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

    <!--======= SIGN IN =======-->
    <section class="form_section">
        <div class="container form_section-container">
            <h2>Sign In</h2>
            <?php if (isset($_SESSION['signup-success'])) : ?>
                <div class="alert_message success">
                    <p>
                        <?= $_SESSION['signup-success'];
                            unset($_SESSION['signup-success']);
                        ?>
                    </p>
                </div>
            <?php elseif (isset($_SESSION['signin'])) : ?>
                <div class="alert_message error">
                    <p>
                        <?= $_SESSION['signin'];
                            unset($_SESSION['signin']);
                        ?>
                    </p>
                </div>
            <?php endif ?>
            <form action="<?= ROOT_URL ?>signin-logic.php" method="POST">
                <input type="text" name="username_email" value="<?= $username_email ?>" id="" placeholder="Username or Email">
                <input type="password" name="password" value="<?= $password ?>" id="" placeholder="Password">
                <button type="submit" name="submit" class="btn">Sign In</button>
                <small>Don't have an account? <a href="signup.php">Sign Up</a></small>
            </form>
        </div>
    </section>

    <script src="./script.js"></script>
</body>
</html>