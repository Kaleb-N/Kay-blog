<?php
require 'config/database.php';

// fetch current user from database
if(isset($_SESSION['user-id'])) {
    $id = filter_var($_SESSION['user-id'], FILTER_SANITIZE_NUMBER_INT);
    $query = "SELECT avatar FROM users WHERE id=$id";
    $result = mysqli_query($connection, $query);
    $avatar = mysqli_fetch_assoc(($result));
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KayPlanet</title>
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/style.css">
    <!--==== switcher css ===-->
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/style-switcher.css">
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/skins/color1.css" class="alternate-style" title="color1" disabled>
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/skins/color2.css" class="alternate-style" title="color2" disabled>
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/skins/color3.css" class="alternate-style" title="color3" disabled>
    <link rel="stylesheet" href="<?= ROOT_URL ?>css/skins/color4.css" class="alternate-style" title="color4" disabled>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <!--=========== NAV ==========-->
    <nav>
        <div class="container nav_container">
            <a href="<?= ROOT_URL ?>" class="nav_logo"><span>Kay</span>planet</a>
            <ul class="nav_items">
                <li><a href="<?= ROOT_URL ?>">Home</a></li>
                <li><a href="<?= ROOT_URL ?>blog.php">Blog</a></li>
                <li><a href="<?= ROOT_URL ?>about.php">About</a></li>
                <li><a href="<?= ROOT_URL ?>contact.php">Contact</a></li>
                
                <?php if (isset($_SESSION['user-id'])) : ?>
                    <li class="nav_profile">
                        <div class="avatar">
                            <img src="<?= ROOT_URL . 'images/' . $avatar['avatar'] ?>">
                        </div>
                        <ul>
                            <li><a href="<?= ROOT_URL ?>admin/index.php">Dashboard</a></li>
                            <li><a href="<?= ROOT_URL ?>logout.php">Logout</a></li>
                        </ul>
                    </li>
                <?php else : ?>
                    <li><a href="<?= ROOT_URL ?>signin.php">Sign in</a></li>
                <?php endif ?>
            </ul>
            <button id="open_nav-btn"><i class="fa-solid fa-bars"></i></button>
            <button id="close_nav-btn"><i class="fa-solid fa-times"></i></button>
        </div>
    </nav>
    