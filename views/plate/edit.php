<?php


include '../../app/controllers/plate.php';
//  include '../../partials/navbar.php';


if (isset($_POST['id'])) {
    $getId =  $_POST['id'];
    $user = edit($getId);
    require_once '../../partials/navbar.php';
    // var_dump($user);
    $menu = menu();
} else {
    header('location:index.php');   
}

if (isset($_POST['update'])) {
    update($_POST['name'], $_POST['price'],$_FILES['image'],$_POST['selectMenu'],$_POST['id']);

} 



?>
<div class="relative mt-5 overflow-x-auto sm:rounded-lg md:ml-64 w2/3 md:px-32">
    <div class="max-w-2xl px-4 py-1 mx-auto lg:py-16">
        <form method="post" id="submitForm" enctype="multipart/form-data">
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">

                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Name </label>
                    <input type="hidden" name="id" value="<?= $getId ?>" id="id"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                    <input type="text" name="name" value="<?= $user['name'] ?>" id="name"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder=" Name">
                    <span><?= isset($error['name']) ? $error['name'] : ''; ?></span>

                </div>
                <div class="sm:col-span-2">

                    <label for="price" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        price </label>
                    <input type="number" name="price" value="<?= $user['price'] ?>" id="price"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder=" Name">
                    <!-- <span><?= isset($_POST['price']) ? $error['price'] : ''; ?></span> -->

                </div>


                <div class="sm:col-span-2">

                    <label for="image" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        image </label>
                    <input type="file" name="image" id="image"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                        placeholder=" Name">
                    <span><?= isset($_POST['image']) ? $error['image'] : ''; ?></span>

                </div>
                <div class="sm:col-span-2">

                    <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        role </label>
                    <select name="selectMenu" id="role"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option value="">Choose Role</option>
                        <?php 
                                foreach($menu as $menu){
                                    ?>
                        <option value=" <?=$menu['id']?>">
                            <?= $menu['name']?>
                        </option>
                        <?php
                                }
                                
                                ?>
                    </select>
                    <!-- <span><?= isset($_POST['selectMenu']) ? $error['selectMenu'] : ''; ?></span> -->
                </div>


                <div class="mt-12 sm:col-span-2">
                    <input type="submit" name="submit"
                        class="bg-gray-100 dark:bg-gray-900  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                </div>
            </div>
        </form>

    </div>
</div>

<?php
require_once '../../partials/footer.php';

?>