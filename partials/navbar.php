<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$_SESSION['lang'] = $_SESSION['lang'] ?? 'en';

$_SESSION['lang'] = $_GET['lang'] ?? $_SESSION['lang'];

// require 'database\connection.php';

if ($_SESSION['lang'] == 'en') {
    require 'lang/en.php';
} else {
    require 'lang/fr.php';
}
// $_SESSION[ 'name' ] = '';
if (empty($_SESSION['name'])) {
    header('Location:/youcode/dash/views/auth/login.php');
}

?>
<!DOCTYPE html>
<html lang='en'>

<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Document</title>
    <link rel='stylesheet' href='../assets/css/style.css'>

    <link rel='stylesheet' href='https://cdn.datatables.net/1.13.8/css/jquery.dataTables.min.css' />
    <link href='https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.css' rel='stylesheet' />
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css'
        integrity='sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=='
        crossorigin='anonymous' referrerpolicy='no-referrer' />
    <script src='http://code.jquery.com/jquery-1.11.3.min.js'></script>
    <script src='https://cdn.jsdelivr.net/npm/apexcharts'></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</head>

<body class='bg-gray-100 dark:bg-gray-700'>
    <button data-drawer-target='default-sidebar' data-drawer-toggle='default-sidebar' aria-controls='default-sidebar'
        type='button'
        class='inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600'>
        <span class='sr-only'>Open sidebar</span>
        <svg class='w-6 h-6' aria-hidden='true' fill='currentColor' viewBox='0 0 20 20'
            xmlns='http://www.w3.org/2000/svg'>
            <path clip-rule='evenodd' fill-rule='evenodd'
                d='M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z'>
            </path>
        </svg>
    </button>
    <aside id='default-sidebar'
        class='fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full md:translate-x-0'
        aria-label='Sidebar'>
        <div class='h-full px-3 py-4 overflow-y-auto bg-gray-50 dark:bg-gray-800'>
            <h1 class='text-center text-2xl dark:text-slate-50  text-gray-500  p-5'>
                <?=isset($_SESSION['name']) ? $_SESSION['name']  : 'LOGO'?>
            </h1>
            <ul class='space-y-2 font-medium'>
                <li>
                    <a href='/youcode/dash/index.php'
                        class='flex items-center p-3 m-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group'>
                        <lord-icon src='https://cdn.lordicon.com/eodavnff.json' trigger='hover'
                            style='width:25px;height:25px'>
                        </lord-icon>
                        <span class='ms-3'><?php echo $lang['dashboard'] ?></span>
                    </a>
                </li>

                <li>
                    <a href='#'
                        class='flex items-center p-3 m-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group'>
                        <lord-icon src='https://cdn.lordicon.com/mebvgwrs.json' trigger='hover'
                            style='width:25px;height:25px'>
                        </lord-icon>
                        <span class='ms-3'><?php echo $lang['users'] ?></span>
                    </a>
                </li>

                <li>
                    <a href='/youcode/dash/views/chefs/chefs.php'
                        class='flex items-center p-3 m-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group'>
                        <lord-icon src='https://cdn.lordicon.com/knfxypdv.json' trigger='hover'
                            style='width:25px;height:25px'>
                        </lord-icon>
                        <span class='ms-3'>Chefs</span>
                    </a>
                </li>

                <li>
                    <a href='/youcode/dash/views/menu/menu.php'
                        class='flex items-center p-3 m-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group'>
                        <lord-icon src='https://cdn.lordicon.com/rztizmkk.json' trigger='hover'
                            style='width:25px;height:25px'>
                        </lord-icon>
                        <span class='ms-3'>Menu</span>
                    </a>
                </li>

                <li>
                    <a href='/youcode/dash/views/plate/plate.php'
                        class='flex items-center p-3 m-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group'>
                        <lord-icon src='https://cdn.lordicon.com/mwgfcdaj.json' trigger='hover'
                            style='width:25px;height:25px'>
                        </lord-icon>
                        <span class='ms-3'>Plate</span>
                    </a>
                </li>
                <li>
                    <a href='#'
                        class='flex items-center p-3 m-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group'>
                        <lord-icon src='https://cdn.lordicon.com/evvwiruv.json' trigger='hover'
                            style='width:25px;height:25px'>
                        </lord-icon>
                        <span class='ms-3'>Ingredients</span>
                    </a>
                </li>
                <li>
                    <a href='/youcode/dash/views/auth/logout.php'
                        class='flex items-center p-3 m-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group'>
                        <lord-icon src='https://cdn.lordicon.com/iivdalhg.json' trigger='hover' state=''
                            style='width:25px;height:25px'>
                        </lord-icon>
                        <span class='ms-3'>LogOut </span>
                    </a>
                </li>

            </ul>
        </div>
    </aside>
    <nav
        class="bg-white border-gray-200 dark:bg-gray-900 md:ml-64 text-slate-50 sticky top-0 z-10 p-5 flex flex-wrap justify-between  gap-y-10 mx-auto">

        <form class="w-2/4 mx-auto " method="get">
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                    </svg>
                </div>
                <input type="search" value="<?php echo isset($_GET['searchInput']) ? $_GET['searchInput'] : ''; ?>"
                    name="searchInput" id="default-search"
                    class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="<?php echo $lang['search'] ?>">
                <button type="submit" name="searchSubmit"
                    class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 "><?php echo $lang['searchW'] ?></button>
            </div>
        </form>
        <div class="flex items-center md:order-2 space-x-1 md:space-x-0 rtl:space-x-reverse   mx-auto">
            <button type="button" data-dropdown-toggle="language-dropdown-menu"
                class="inline-flex items-center font-medium justify-center px-4 py-2 text-sm text-gray-900 dark:text-white rounded-lg cursor-pointer hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-white">
                <?php if ($_SESSION['lang'] == 'fr') {
    ?>
                <svg class="w-5 h-5 rounded-full me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/<svg class=" w-5
                    h-5 rounded-full me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 900 600">
                    <rect width="300" height="600" fill="#0055a4" />
                    <rect width="300" height="600" x="300" fill="#fff" />
                    <rect width="300" height="600" x="600" fill="#ef3340" />
                </svg>

                <?php
} else {
    ?>
                <svg class="w-5 h-5 rounded-full me-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 3900 3900">
                    <path fill="#b22234" d="M0 0h7410v3900H0z" />
                    <path d="M0 450h7410m0 600H0m0 600h7410m0 600H0m0 600h7410m0 600H0" stroke="#fff"
                        stroke-width="300" />
                    <path fill="#3c3b6e" d="M0 0h2964v2100H0z" />
                    <g fill="#fff">
                        <g id="d">
                            <g id="c">
                                <g id="e">
                                    <g id="b">
                                        <path id="a"
                                            d="M247 90l70.534 217.082-184.66-134.164h228.253L176.466 307.082z" />
                                        <use xlink:href="#a" y="420" />
                                        <use xlink:href="#a" y="840" />
                                        <use xlink:href="#a" y="1260" />
                                    </g>
                                    <use xlink:href="#a" y="1680" />
                                </g>
                                <use xlink:href="#b" x="247" y="210" />
                            </g>
                            <use xlink:href="#c" x="494" />
                        </g>
                        <use xlink:href="#d" x="988" />
                        <use xlink:href="#c" x="1976" />
                        <use xlink:href="#e" x="2470" />
                    </g>
                </svg>

                <?php	}?> </button>
            <!-- Dropdown -->
            <div class="z-50 hidden my-4 text-base list-none bg-white divide-y divide-gray-100 rounded-lg shadow dark:bg-gray-700"
                id="language-dropdown-menu">
                <ul class="py-2 font-medium" role="none">
                    <li>
                        <a href="<?php $_SERVER['PHP_SELF']?>?lang=fr"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                            role="menuitem">
                            <div class="inline-flex items-center">
                                <svg class="w-5 h-5 rounded-full me-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/<svg class=" w-5 h-5 rounded-full me-3"
                                    aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 900 600">
                                    <rect width="300" height="600" fill="#0055a4" />
                                    <rect width="300" height="600" x="300" fill="#fff" />
                                    <rect width="300" height="600" x="600" fill="#ef3340" />
                                </svg>

                            </div>
                        </a>
                    </li>
                    <li>
                        <a href="<?php $_SERVER['PHP_SELF']?>?lang=en"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 dark:text-gray-400 dark:hover:bg-gray-600 dark:hover:text-white"
                            role="menuitem">
                            <div class="inline-flex items-center">
                                <svg class="w-5 h-5 rounded-full me-3" aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"
                                    viewBox="0 0 3900 3900">
                                    <path fill="#b22234" d="M0 0h7410v3900H0z" />
                                    <path d="M0 450h7410m0 600H0m0 600h7410m0 600H0m0 600h7410m0 600H0" stroke="#fff"
                                        stroke-width="300" />
                                    <path fill="#3c3b6e" d="M0 0h2964v2100H0z" />
                                    <g fill="#fff">
                                        <g id="d">
                                            <g id="c">
                                                <g id="e">
                                                    <g id="b">
                                                        <path id="a"
                                                            d="M247 90l70.534 217.082-184.66-134.164h228.253L176.466 307.082z" />
                                                        <use xlink:href="#a" y="420" />
                                                        <use xlink:href="#a" y="840" />
                                                        <use xlink:href="#a" y="1260" />
                                                    </g>
                                                    <use xlink:href="#a" y="1680" />
                                                </g>
                                                <use xlink:href="#b" x="247" y="210" />
                                            </g>
                                            <use xlink:href="#c" x="494" />
                                        </g>
                                        <use xlink:href="#d" x="988" />
                                        <use xlink:href="#c" x="1976" />
                                        <use xlink:href="#e" x="2470" />
                                    </g>
                                </svg>

                            </div>
                        </a>
                    </li>
                </ul>
            </div>
            <button id="theme-toggle" type="button"
                class="text-gray-500 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-700 focus:outline-none focus:ring-4 focus:ring-gray-200 dark:focus:ring-gray-700 rounded-lg text-sm p-2.5">
                <svg id="theme-toggle-dark-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path d="M17.293 13.293A8 8 0 016.707 2.707a8.001 8.001 0 1010.586 10.586z"></path>
                </svg>
                <svg id="theme-toggle-light-icon" class="hidden w-5 h-5" fill="currentColor" viewBox="0 0 20 20"
                    xmlns="http://www.w3.org/2000/svg">
                    <path
                        d="M10 2a1 1 0 011 1v1a1 1 0 11-2 0V3a1 1 0 011-1zm4 8a4 4 0 11-8 0 4 4 0 018 0zm-.464 4.95l.707.707a1 1 0 001.414-1.414l-.707-.707a1 1 0 00-1.414 1.414zm2.12-10.607a1 1 0 010 1.414l-.706.707a1 1 0 11-1.414-1.414l.707-.707a1 1 0 011.414 0zM17 11a1 1 0 100-2h-1a1 1 0 100 2h1zm-7 4a1 1 0 011 1v1a1 1 0 11-2 0v-1a1 1 0 011-1zM5.05 6.464A1 1 0 106.465 5.05l-.708-.707a1 1 0 00-1.414 1.414l.707.707zm1.414 8.486l-.707.707a1 1 0 01-1.414-1.414l.707-.707a1 1 0 011.414 1.414zM4 11a1 1 0 100-2H3a1 1 0 000 2h1z"
                        fill-rule="evenodd" clip-rule="evenodd"></path>
                </svg>
            </button>
        </div>
    </nav>