<?php
include '../config.php';

$sql = "SELECT * FROM member";
$result = $conn->query($sql);
$title = "Member";
?>

<!doctype html>
<html lang="en">

<?php include __DIR__ . ("/../include/head.php") ?>

<body x-data="" x-bind="$store.global.documentBody" class="is-sidebar-open is-header-blur navigation:sideblock">
    <!-- App preloader-->
    <div class="app-preloader fixed z-50 grid h-full w-full place-content-center bg-slate-50 dark:bg-navy-900">
        <div class="app-preloader-inner relative inline-block size-48"></div>
    </div>

    <!-- Page Wrapper -->
    <div id="root" class="min-h-100vh flex grow bg-slate-50 dark:bg-navy-900" x-cloak="">
        <!-- Sidebar -->
        <?php include __DIR__ . ("/../include/sidebar.php") ?>

        <?php include __DIR__ . ("/../include/header.php") ?>

        <!-- Main Content Wrapper -->
        <main class="main-content w-full px-[var(--margin-x)] pb-8">
            <div class="flex items-center space-x-4 py-5 lg:py-6">
                <h2 class="text-xl font-medium text-slate-800 dark:text-navy-50 lg:text-2xl">
                    Member
                </h2>
                <div class="hidden h-full py-1 sm:flex">
                    <div class="h-full w-px bg-slate-300 dark:bg-navy-600"></div>
                </div>
                <ul class="hidden flex-wrap items-center space-x-2 sm:flex">
                    <li class="flex items-center space-x-2">
                        <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                            href="/index.php">Dashboard</a>
                        <svg x-ignore="" xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none"
                            viewbox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </li>
                    <li>Member</li>
                </ul>
            </div>
            <div class="grid grid-cols-1 gap-4 sm:gap-5 lg:gap-6">
                <div class="card pb-4">
                    <div class="my-3 flex  items-center justify-end px-4 sm:px-5">
                        <button
                            class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                            <a href="./create.php">Add Member</a>
                        </button>
                    </div>
                    <div>
                        <div x-init="$el.grid = new Gridjs.Grid({
                pagination: true,
                search: true,
                sort:true,
                columns: ['Nama', 'Alamat', 'Jenis Kelamin'],
                server: {
                  url: '/members/api.php',
                  then: data => data.results.map(member => [member.nama, member.alamat, member.jenis_kelamin])
                } 
              }).render($el);"></div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <div id="x-teleport-target"></div>
    <script>
        window.addEventListener("DOMContentLoaded", () => Alpine.start());
    </script>
</body>

</html>