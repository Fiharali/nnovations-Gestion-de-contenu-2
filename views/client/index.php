<?php

session_start();

include '../../app/controllers/plate.php';
include '../../app/controllers/commend.php';

$result = all();

if (isset($_POST['add'])) {
    addCommend($_POST['quantity'], $_POST['id'], null, $_SESSION['id']);
}

$commends = []; 
if (!empty($_SESSION['name'])) {
    $commends=allCommend();
// var_dump($commends);
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="../../assets/css/main.css">
    <link rel="stylesheet" href="../../assets/css/media.css">

    <link href='https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.css' rel='stylesheet' />
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Home</title>
</head>

<body>

    <!-------------------------- Start Navbar  -------------------------->
    <div class="navbar">
        <div class="container">
            <h1 class="logo">
                <a href="index.html">ali</a>
            </h1>

            <ul class="links">
                <i class="fa-solid fa-xmark"></i>
                <li><a href="#home">Home</a></li>
                <li><a href="#chefs">Chefs</a></li>
                <li><a href="#gallery">Gallery</a></li>
                <li><a href="#contact">Contact</a></li>
                <button data-modal-target="default-modal" data-modal-toggle="default-modal" type="button">

                    <lord-icon src="https://cdn.lordicon.com/cosvjkbu.json" trigger="loop" delay="1000"
                        style="width:40px;height:40px">
                    </lord-icon>
                </button>
            </ul>


            <div class="mode">

                <?php if (!empty($_SESSION['name'])) { ?>

                <button type="button"
                    class="focus:outline-none text-white bg-yellow-400 hover:bg-yellow-500 focus:ring-4 focus:ring-yellow-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:focus:ring-yellow-900">

                    <a href="../../app/controllers/auth/logout.php">Logout</a>
                </button>

                <?php } else { ?>
                <button type="button"
                    class="focus:outline-none hover:text-slate-50 text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900 hover:text-slate-50"><a
                        href="../auth/login.php">Login</a></button>
                <?php

                } ?>

            </div>
        </div>
    </div>
    <!-------------------------- End Navbar  -------------------------->

    <!-------------------------- Start home  -------------------------->
    <div id="home" class="section-bg">
        <div class="container">
            <div class="home-content">
                <h2>Enjoy Your Healthy
                    <br>Delicious Food
                </h2>
                <p>Sed autem laudantium dolores. Voluptatem itaque ea consequatur eveniet. Eum quas beatae cumque eum
                    quaerat. </p>

                <div class="btn-group">
                    <a class="btn-main" href="#contact">Book a Table</a>
                    <a class="btn-video" href="https://youtube.com" target="_blank">
                        <div class="icon">
                            <i class="fa-solid fa-play"></i>
                        </div> Watch a video
                    </a>
                </div>

            </div>

            <div class="home-image">
                <img src="../../assets/images/hero-img.png"
                    alt="A black dish filled with a colorful assortment of fresh vegetables and bread.">
            </div>
        </div>
    </div>
    <!-------------------------- End home  -------------------------->

    <!-------------------------- Start chefs  -------------------------->
    <div id="chefs" class="section-bg-w-d">
        <div class="container margin-container">
            <div class="main-title">
                <h2>CHEFS</h2>
                <p>Our<span> Professional </span>Chefs</p>
            </div>

            <div class="chefs-cards">
                <div class="card section-bg-content ">
                    <div class="card-image">
                        <img src="../../assets/images/chefs/chefs-1.jpg" alt="chef-Walter White">
                    </div>
                    <div class="card-content">
                        <h3>Walter White </h3>
                        <p class="first-p">Master Chef </p>
                        <p><em> Velit aut quia fugit et et. Dolorum ea voluptate vel tempore tenetur ipsa quae aut.
                                Ipsum
                                exercitationem iure minima enim corporis et voluptate.</em> </p>
                    </div>
                    <ul class="hover_links">
                        <li><a href="https://twitter.com/" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="http://facebook.com" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                        </li>
                        <li><a href="https://www.instagram.com/" target="_blank"><i
                                    class="fa-brands fa-instagram"></i></a></li>
                        <li><a href="https://www.linkedin.com/feed/" target="_blank"><i
                                    class="fa-brands fa-linkedin"></i></a></li>
                    </ul>
                </div>

                <div class="card section-bg-content">
                    <div class="card-image">
                        <img src="../../assets/images/chefs/chefs-2.jpg" alt="chef-Sarah Jhonson">
                    </div>
                    <div class="card-content">
                        <h3>Sarah Jhonson </h3>
                        <p class="first-p">Patissier </p>
                        <p><em>Quo esse repellendus quia id. Est eum et accusantium pariatur fugit nihil minima suscipit
                                corporis. Voluptate sed quas reiciendis animi neque sapiente. </em></p>
                    </div>
                    <ul class="hover_links">
                        <li><a href="https://twitter.com/" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="http://facebook.com" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                        </li>
                        <li><a href="https://www.instagram.com/" target="_blank"><i
                                    class="fa-brands fa-instagram"></i></a></li>
                        <li><a href="https://www.linkedin.com/feed/" target="_blank"><i
                                    class="fa-brands fa-linkedin"></i></a></li>
                    </ul>

                </div>
                <div class="card section-bg-content">
                    <div class="card-image">
                        <img src="../../assets/images/chefs/chefs-3.jpg" alt="chef-William Anderson">
                    </div>
                    <div class="card-content">
                        <h3>William Anderson </h3>
                        <p class="first-p">Cook </p>
                        <p><em>Vero omnis enim consequatur. Voluptas consectetur unde qui molestiae deserunt. Voluptates
                                enim
                                aut architecto porro aspernatur molestiae modi. </em></p>
                    </div>
                    <ul class="hover_links">
                        <li><a href="https://twitter.com/" target="_blank"><i class="fa-brands fa-twitter"></i></a></li>
                        <li><a href="http://facebook.com" target="_blank"><i class="fa-brands fa-facebook-f"></i></a>
                            L </li>
                        <li><a href="https://www.instagram.com/" target="_blank"><i
                                    class="fa-brands fa-instagram"></i></a></li>
                        <li><a href="https://www.linkedin.com/feed/" target="_blank"><i
                                    class="fa-brands fa-linkedin"></i></a></li>
                    </ul>

                </div>

            </div>
        </div>
    </div>
    <!-------------------------- End chefs -------------------------->

    <!-------------------------- Start Gallery -------------------------->
    <div id="gallery" class="section-bg">
        <div class="container margin-container">
            <div class="main-title">
                <h2>Gallery</h2>
                <p>Check<span> Our Gallery</p>
            </div>

            <div class="gallery-photos">
                <div class="pizza">
                    <img src="../../assets/images/gallery/meal-1.jpg" alt="pizza">
                    <div class="layer">
                        <h2 class="meal-name">Pizza</h2>
                        <p class="meal-dec"> Hawaiian pi zza with ham and pineapple</p>
                    </div>
                </div>

                <div class="steak">
                    <img src="../../assets/images/gallery/meal-2.jpg" alt="steak">
                    <div class="layer">
                        <h2 class="meal-name">Beef steaks</h2>
                        <p class="meal-dec">Tasty beef steaks flying above cast iron grate with fire flames.</p>
                    </div>
                </div>
                <div class="burger">
                    <img src="../../assets/images/gallery/meal-3.jpg" alt="burger">
                    <div class="layer">
                        <h2 class="meal-name">Burger</h2>
                        <p class="meal-dec"> grass fed bison hamburger with chips & beer</p>
                    </div>
                </div>
                <div class="pizza-slices">
                    <img src="../../assets/images/gallery/meal-4.jpg" alt="pizza-slices">
                    <div class="layer">
                        <h2 class="meal-name">Levitation pizza</h2>
                        <p class="meal-dec">Levitation pizza on black background.</p>
                    </div>
                </div>
                <div class="fried">
                    <img src="../../assets/images/gallery/meal-5.jpg" alt="fried">
                    <div class="layer">
                        <h2 class="meal-name">Crispy Fried Chicken</h2>
                        <p class="meal-dec">Golden brown chicken legs with a crunchy coating and juicy meat</p>
                    </div>
                </div>
                <div class="kofta">
                    <img src="../../assets/images/gallery/meal-5.jpg" alt=" imgProduct">
                    <div class="layer">
                        <h2 class="meal-name">Lyulya kebab</h2>
                        <p class="meal-dec">Tender and juicy skewers of ground lamb or beef, flavored with aromatic
                            spices and herbs</p>
                    </div>
                </div>
                <div class="omelette">
                    <img src="../../assets/images/gallery/meal-7.jpg" alt="omelette">
                    <div class="layer">
                        <h2 class="meal-name">Frittata</h2>
                        <p class="meal-dec"> Frittata or potato pie in a ceramic plate</p>
                    </div>
                </div>

            </div>
        </div>

        <div class="px-5 flex justify-between gap-5 flex-wrap">
            <?php
            if ($result) {
                foreach ($result as $row) {
            ?>
            <div class="w-full max-w-sm mb-5">
                <div
                    class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 h-full">
                    <a href="#">
                        <img class="object-cover w-full h-40 rounded-t-lg"
                            src="../../assets/images/<?= $row['image'] ?>" alt="product image" />
                    </a>
                    <div class="px-5 pb-5 bg-dark">

                        <h5
                            class="text-xl text-center  font-semibold tracking-tight text-gray-900 dark:text-white pt-4">
                            <?= $row['name'] ?></h5>


                        <div class="flex items-center justify-between mt-5">
                            <span class="text-3xl font-bold text-gray-900 dark:text-white"><?= $row['price'] ?>$</span>
                            <form method="post">
                                <input type="hidden" value="<?= $row['id'] ?>" class='bg-dark w-1/2' name="id" />
                                <input type="number" value="1" class='bg-dark w-1/2' name="quantity" min=1 max=5 />
                                <button type="submit" name="add"
                                    class="focus:outline-none text-white bg-purple-700 hover:bg-purple-800 focus:ring-4 focus:ring-purple-300 font-medium rounded-lg text-sm p-2.5 ms-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900">Add</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php
                }
            }
            ?>
        </div>



    </div>
    <!-------------------------- End Gallery -------------------------->
    <div id="default-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <!-- Modal content -->
            <div class="relative bg-dark rounded-lg shadow dark:bg-gray-700">
                <!-- Modal header -->
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        Terms of Service
                    </h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal body -->
                <div class="p-4 md:p-5 space-y-4">
                    <?php
            if ($commends) {
                foreach ($commends as $row) {
            ?>
                    <div class="w-full max-w-sm mb-5 mx-auto">
                        <div
                            class="bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 h-full">
                            <a href="#">
                                <img class="object-cover w-full h-40 rounded-t-lg"
                                    src="../../assets/images/<?= $row['image'] ?>" alt="product image" />
                            </a>
                            <div class="px-5 pb-5 bg-dark">

                                <h5
                                    class="text-xl text-center  font-semibold tracking-tight text-gray-900 dark:text-white pt-4">
                                    <?= $row['name'] ?></h5>


                                <div class="flex items-center justify-between mt-5 text-center mx-auto">
                                    <span
                                        class="text-3xl font-bold text-gray-900 dark:text-white text-center mx-auto"><?= $row['price'] ?>$</span>
                                    <form method="post">
                                        <input type="hidden" value="<?= $row['id'] ?>" class='bg-dark w-1/2'
                                            name="id" />
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                }
            }else{
                echo 'no items';
            }
            ?>
                </div>
                <!-- Modal footer -->
                <div class="flex items-center p-4 md:p-5 border-t border-gray-200 rounded-b dark:border-gray-600">
                    <button data-modal-hide="default-modal" type="button"
                        class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 w-full">I
                        accept</button>

                </div>
            </div>
        </div>
    </div>

    <!-- Main modal -->








    <!-------------------------- End Footer -------------------------->

    <!-------------------------- JavaScript -------------------------->
    <script src="../../assets/js/home.js"></script>
    <script src="../../assets/js/main.js"></script>
    <script src="https://cdn.lordicon.com/lordicon-1.3.0.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.1.1/flowbite.min.js"></script>
    <script>
    // Add dark mode
    let toggleButton = document.querySelector(".toggle");
    let bodyEl = document.querySelector("body");

    toggleButton.onclick = function() {
        bodyEl.classList.toggle("dark");
        toggleButton.classList.toggle("fa-solid");
        toggleButton.classList.toggle("fa-moon");
        toggleButton.classList.toggle("fa-regular");
        toggleButton.classList.toggle("fa-sun");
    };

    // Add SideMenu Bar
    let toggleMenu = document.querySelector(".fa-bars");
    let openLinks = document.querySelector(".links");
    let nav = document.querySelector(".navbar");
    toggleMenu.onclick = function() {
        openLinks.classList.toggle("open-links");
        nav.classList.toggle("navbar_bg_remove");
    };

    // Remove SideMenu Bar
    let xButton = document.querySelector(".fa-xmark");
    let closeNavbar = document.querySelector(".links");
    xButton.onclick = function() {
        closeNavbar.classList.remove("open-links");
        nav.classList.toggle("navbar_bg_remove");
    };
    </script>
</body>

</html>