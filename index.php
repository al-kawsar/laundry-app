<?php
session_start();
if (!isset($_SESSION['username'])) {
  header("Location: login.php");
}
include 'config.php';
?>
<!doctype html>
<html lang="en">

<head>
  <!-- Meta tags  -->
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport"
    content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

  <title>Dashboard | Aplikasi Pengelolaan Laundry</title>
  <link rel="icon" type="image/png" href="images/favicon.png">

  <!-- CSS Assets -->
  <link rel="stylesheet" href="css/app.css">

  <!-- Javascript Assets -->
  <script src="js/app.js" defer=""></script>

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

<body x-data="" x-bind="$store.global.documentBody" class="is-sidebar-open is-header-blur navigation:sideblock">
  <!-- App preloader-->
  <div class="app-preloader fixed z-50 grid h-full w-full place-content-center bg-slate-50 dark:bg-navy-900">
    <div class="app-preloader-inner relative inline-block size-48"></div>
  </div>

  <!-- Page Wrapper -->
  <div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900" x-cloak="">
    <!-- Sidebar -->
    <?php include ("include/sidebar.php") ?>

    <?php include ("include/header.php") ?>

    <!-- Main Content Wrapper -->
    <main class="main-content w-full px-[var(--margin-x)] pb-8">
      <div class="space-x-4 py-5 lg:py-6">
        <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
          Welcome to Laundry Management System </h2>
      </div>
    </main>
  </div>

  <div id="x-teleport-target"></div>
  <script>
    window.addEventListener("DOMContentLoaded", () => Alpine.start());
  </script>
</body>

</html>