<div class="sidebar sidebar-panel print:hidden">
    <div class="flex h-full grow flex-col border-r border-slate-150 bg-white dark:border-navy-700 dark:bg-navy-750">
        <div class="flex items-center justify-between px-3 pt-4">
            <!-- Application Logo -->
            <div class="flex">
                <a href="index.htm.html">
                    <img class="size-11 transition-transform duration-500 ease-in-out hover:rotate-[360deg]"
                        src="/images/app-logo.png" alt="logo">
                </a>
            </div>
            <button @click="$store.global.isSidebarExpanded = false"
                class="btn h-7 w-7 rounded-full p-0 text-primary hover:bg-slate-300/20 focus:bg-slate-300/20 active:bg-slate-300/25 dark:text-accent-light/80 dark:hover:bg-navy-300/20 dark:focus:bg-navy-300/20 dark:active:bg-navy-300/25 xl:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="size-6" fill="none" viewbox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7">
                    </path>
                </svg>
            </button>
        </div>

        <div x-data="{expandedItem:'menu-item-3'}" class="mt-5 h-[calc(100%-4.5rem)] overflow-x-hidden pb-6"
            x-init="$el._x_simplebar = new SimpleBar($el);">
            <ul class="flex flex-1 flex-col px-4 font-inter">
                <li>
                    <a href="/"
                        class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out">
                        <span>Dashboard</span>
                    </a>
                </li>
                <li>
                    <a href="/members/"
                        class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out">
                        <span>Members</span>
                    </a>
                </li>
                <li>
                    <a href="/users/"
                        class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out">
                        <span>Users</span>
                    </a>
                </li>
                <li>
                    <a href="/pakets/"
                        class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out">
                        <span>Paket</span>
                    </a>
                </li>
                <li>
                    <a href="/transaksis/"
                        class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out">
                        <span>Transaksi</span>
                    </a>
                </li>
            </ul>

            <div class="my-3 mx-4 h-px bg-slate-200 dark:bg-navy-500"></div>
            <ul class="flex flex-1 flex-col px-4 font-inter">
                <li>
                    <a href="/setting.php"
                        class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out">
                        <span>Setting</span>
                    </a>
                </li>
                <li>
                    <a href="/logout.php"
                        class="flex items-center justify-between p-2 text-xs+ tracking-wide outline-none transition-[color,padding-left] duration-300 ease-in-out">
                        <span>Logout</span>
                    </a>
                </li>
            </ul>

        </div>
    </div>
</div>