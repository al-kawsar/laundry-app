<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: /login.php");
} ?>

<head>
    <!-- Meta tags  -->
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport"
        content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

    <title><?= $title ?? 'Random' ?> | Aplikasi Pengelolaan Laundry</title>
    <link rel="icon" type="image/png" href="/images/favicon.png">

    <!-- CSS Assets -->
    <link rel="stylesheet" href="/css/app.css">

    <!-- Javascript Assets -->
    <script src="/js/app.js" defer=""></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin="">
    <link
        href="css2?family=Inter:wght@400;500;600;700&family=Poppins:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
        rel="stylesheet">
    <script>
        /**
    * THIS SCRIPT REQUIRED FOR PREVENT FLICKERING IN SOME BROWSERS
    */
        localStorage.getItem("_x_darkMode_on") === "true" &&
            document.documentElement.classList.add("dark");
    </script>
</head>