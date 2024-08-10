<?php
include ("config.php");
$title = "Dashboard";
?>
<!doctype html>
<html lang="en">

<?php include __DIR__ . ("/include/head.php") ?>

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