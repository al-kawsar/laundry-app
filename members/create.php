<?php
include '../config.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $alamat = $_POST['alamat'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tlp = $_POST['tlp'];

    $output = preg_replace('/\D/', '', $tlp);

    if (substr($output, 0, 2) === '62') {
        $tlp = '0' . substr($output, 2);
    }


    $sql = "INSERT INTO member (nama, alamat, jenis_kelamin, tlp) VALUES ('$nama', '$alamat', '$jenis_kelamin', '$tlp')";
    if ($conn->query($sql) === TRUE) {
        header("Location: ./");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

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
                    Create Member
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
                    <li class="flex items-center space-x-2">
                        <a class="text-primary transition-colors hover:text-primary-focus dark:text-accent-light dark:hover:text-accent"
                            href="./">Members</a>
                        <svg x-ignore="" xmlns="http://www.w3.org/2000/svg" class="size-4" fill="none"
                            viewbox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7">
                            </path>
                        </svg>
                    </li>
                    <li>Create</li>
                </ul>
            </div>

            <div class="grid">
                <div class="col-span-12 sm:col-span-8">
                    <div class="card p-4 sm:p-5">
                        <form method="post" class="space-y-4">
                            <div class="grid grid-cols-1 gap-4 sm:grid-cols-2">
                                <label class="block">
                                    <span>Nama</span>
                                    <span class="relative mt-1.5 flex">
                                        <input
                                            class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="Your Name" type="text" name="nama">
                                        <span
                                            class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                            <i class="far fa-user text-base"></i>
                                        </span>
                                    </span>
                                </label>
                                <label class="block">
                                    <span>No Telpon</span>
                                    <span class="relative mt-1.5 flex">
                                        <input
                                            class="form-input peer w-full rounded-lg border border-slate-300 bg-transparent px-3 py-2 pl-9 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"
                                            placeholder="(62) 123-456-789-12" type="text" name="tlp"
                                            x-input-mask="{numericOnly: true, blocks: [0, 2, 3, 3,3,2], delimiters: ['(', ') ', '-']}">
                                        <span
                                            class="pointer-events-none absolute flex h-full w-10 items-center justify-center text-slate-400 peer-focus:text-primary dark:text-navy-300 dark:peer-focus:text-accent">
                                            <i class="fa fa-phone"></i>
                                        </span>
                                    </span>
                                </label>
                            </div>
                            <label class="block">
                                <span>Jenis Kelamin</span>
                                <div class="flex gap-3">
                                    <label class="flex items-center space-x-2">
                                        <input checked
                                            class="form-radio mt-1.5 is-basic size-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-slate-500 checked:bg-slate-500 hover:border-slate-500 focus:border-slate-500 dark:border-navy-500 dark:bg-navy-900 dark:checked:border-navy-400 dark:checked:bg-navy-400"
                                            name="jenis_kelamin" value="Laki-Laki" type="radio" />
                                        <p>Laki Laki</p>
                                    </label>
                                    <label class="flex items-center space-x-2">
                                        <input checked
                                            class="form-radio mt-1.5 is-basic size-5 rounded-full border-slate-400/70 bg-slate-100 checked:border-slate-500 checked:bg-slate-500 hover:border-slate-500 focus:border-slate-500 dark:border-navy-500 dark:bg-navy-900 dark:checked:border-navy-400 dark:checked:bg-navy-400"
                                            name="jenis_kelamin" value="Perempuan" type="radio" />
                                        <p>Perempuan</p>
                                    </label>
                                </div>
                            </label>
                            <label class="block">
                                <span>Alamat</span>
                                <textarea rows="4" placeholder="Your Address (Area and Street)" name="alamat"
                                    class="form-textarea mt-1.5 w-full rounded-lg border border-slate-300 bg-transparent p-2.5 placeholder:text-slate-400/70 hover:border-slate-400 focus:border-primary dark:border-navy-450 dark:hover:border-navy-400 dark:focus:border-accent"></textarea>
                            </label>
                            <button type="submit"
                                class="btn bg-slate-150 font-medium text-slate-800 hover:bg-slate-200 focus:bg-slate-200 active:bg-slate-200/80 dark:bg-navy-500 dark:text-navy-50 dark:hover:bg-navy-450 dark:focus:bg-navy-450 dark:active:bg-navy-450/90">
                                Create
                            </button>
                        </form>
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