<?php


include '../../app/controllers/user.php';
//  include '../../partials/navbar.php';

// $result = all();

if (isset($_POST['id'])) {
    $getId =  $_POST['id'];
    $user = edit($getId);
    require_once '../../partials/navbar.php';
} else {
    header('location:chefs.php');
}


if (isset($_POST['update'])) {
    update($_POST['name'], $_POST['email'], $_POST['name'], $_POST['selectRole'],$_POST['id']);

} 









?>
<div class="relative mt-5 overflow-x-auto sm:rounded-lg md:ml-64 w2/3 md:px-32">
    <div class="max-w-2xl px-4 py-1 mx-auto lg:py-16">
        <form method="post" id="submitForm">
            <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                <div class="sm:col-span-2">
                    <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Name </label>
                    <input type="hidden" name="id" value="<?= $getId ?>" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder=" Name">
                    <input type="text" name="name" value="<?= $user['name'] ?>" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder=" Name">
                    <span><?= isset($_POST['name']) ? $error['name'] : ''; ?></span>
                </div>
                <div class="sm:col-span-2">
                    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Email </label>
                    <input type="text" name="email" value="<?= $user['email'] ?>" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Email">
                    <span><?= isset($_POST['email']) ? $error['email'] : ''; ?></span>
                </div>
                <div class="sm:col-span-2">
                    <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        Password </label>
                    <input type="password" name="password" disabled value="<?= $user['password'] ?>" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="password">
                    <span><?= isset($_POST['password']) ? $error['password'] : ''; ?></span>
                </div>
                <div class="sm:col-span-2">
                    <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                        role </label>
                    <select name="selectRole" id="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                        <option value="">Choose Role</option>
                        <option value="2" <?= ($user['role_id'] == 2) ? 'selected' : '' ?>> Chef</option>
                        <option value="1" <?= ($user['role_id'] == 1) ? 'selected' : '' ?>>Admin </option>
                        <option value="3" <?= ($user['role_id'] == 3) ? 'selected' : '' ?>>Client </option>
                    </select>
                    <span><?= isset($_POST['selectRole']) ? $error['role'] : ''; ?></span>
                </div>

                <div class="mt-12 sm:col-span-2">
                    <input type="submit" name="update" class="bg-gray-100 dark:bg-gray-900  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                </div>
            </div>
        </form>
    </div>
</div>

<?php
require_once '../../partials/footer.php';

?>