<?php

require_once '../../partials/navbar.php';
require '../../database/connection.php';
require_once 'plateController.php';

$chefRows = [];

while ($chefRow = $resultChef->fetch_array()) {
	$chefRows[] = $chefRow;
}

?>

<div class="relative overflow-x-auto  sm:rounded-lg md:ml-64 w2/3 md:px-32 mt-10">
    <div id="default-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-900">
                <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        <?php echo  $lang['AddMenu'] ?>
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
                <div class="py-1 px-4 mx-auto max-w-2xl lg:py-16">
                    <form method="post" id="submitForm">
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="sm:col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    <?php echo  $lang['placeholderMenu'] ?></label>
                                <input type="text" name="name"
                                    value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="<?php echo  $lang['placeholderMenu'] ?>">
                            </div>
                            <div class=" sm:col-span-2">
                                <label for="age" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    <?php echo  $lang['ChefName'] ?></label>
                                <select name="selectMenu" id=""
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <?php while ($row = $resultChefs->fetch_assoc()) {
									?>
                                    <option value="<?= $row['id'] ?>"><?= $row['name'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    price</label>
                                <input type="text" name="price"
                                    value="<?php echo isset($_POST['price']) ? $_POST['price'] : ''; ?>" id="name"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="<?php echo  $lang['placeholderMenuPrice'] ?>">
                            </div>
                            <div class=" sm:col-span-2 mt-12">
                                <input type="submit" name="submit"
                                    class="bg-gray-100 dark:bg-gray-900  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <button data-modal-target="default-modal" data-modal-toggle="default-modal" type="button"
        class="text-white float-right   font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
        <lord-icon src="https://cdn.lordicon.com/pdsourfn.json" trigger="hover" style="width:35px;height:35px">
        </lord-icon>
    </button>
    <!-- <div class="h-96 max-h-full hover:max-h-screen"> -->
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400  sm:mx-auto " id="myTable">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 ">
                    Id
                </th>
                <th scope="col" class="px-6 py-3">
                    <?php echo  $lang['columnName'] ?>
                </th>
                <th scope="col" class="px-6 py-3">
                    <?php echo  $lang['ChefName'] ?>

                </th>
                <th scope="col" class="px-6 py-3">
                    price

                </th>
                <th scope="col" class="px-6 py-3">
                    ACTION
                </th>
            </tr>
        </thead>
        <tbody>

            <?php
			if (mysqli_num_rows($resultMenu) > 0) {
				while ($row = $resultMenu->fetch_assoc()) {
			?>
            <tr
                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th scope="row"
                    class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                    <?= $row['id'] ?>
                </th>
                <td class="px-6 py-4">
                    <?= $row['name'] ?>
                </td>
                <td class="px-6 py-4">
                    <?= $row['nomMenu'] ?>
                </td>
                <td class="px-6 py-4">
                    <?= $row['price'] ?>
                </td>
                <td class="px-6 py-4 flex ml-auto">
                    <button type="button" data-modal-target="updateModal<?= $row['id'] ?>"
                        data-modal-toggle="updateModal<?= $row['id'] ?>" type="button" class="mx-4">
                        <lord-icon src=" https://cdn.lordicon.com/zfzufhzk.json" trigger="hover"
                            style="width:30px;height:30px">
                        </lord-icon>
                    </button>
                    <form method="post">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>" />
                        <button type="submit" name="delete" <?=($_SESSION['isAdmin']==true ) ? ""  : 'disabled'?>>
                            <lord-icon src="https://cdn.lordicon.com/xekbkxul.json" trigger="hover"
                                style="width:30px;height:30px">
                            </lord-icon>
                        </button>
                        <!-- <input type=" submit" name="delete" onclick="return confirm('Are you sure?')" value="  " class="text-white bg-gradient-to-r from-red-400 via-red-500 to-red-600 hover:bg-gradient-to-br focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 shadow-lg shadow-red-500/50 dark:shadow-lg dark:shadow-red-800/80 font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2"> -->
                    </form>

                </td>
            </tr>
            <div id="updateModal<?= $row['id'] ?>" tabindex="-1" aria-hidden="true"
                class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                <div class="relative p-4 w-full max-w-2xl max-h-full">
                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-900">
                        <div
                            class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
                            <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                <?php echo  $lang['UEmploye'] ?>
                            </h3>
                            <button type="button"
                                class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                                data-modal-hide="updateModal<?= $row['id'] ?>">
                                <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                                    viewBox="0 0 14 14">
                                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                        stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                </svg>
                                <span class="sr-only">Close modal</span>
                            </button>
                        </div>
                        <div class="py-1 px-4 mx-auto max-w-2xl lg:py-16">
                            <form method="post">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>" />
                                <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                                    <div class="sm:col-span-2">
                                        <label for="name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"><?php echo  $lang['ChefName'] ?></label>
                                        <input type="text" name="name" value="<?= $row['name'] ?>" id="name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="Type Employe name">
                                    </div>
                                    <div class=" sm:col-span-2">
                                        <label for="age"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            <?php echo  $lang['ChefName'] ?></label>
                                        <select name="selectMenu" id=""
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                            <?php foreach ($chefRows as $chefRow) { ?>
                                            <?php $isSelected = ($row['menu_id'] == $chefRow['id']) ? 'selected' : ''; ?>
                                            <option value="<?= $chefRow['id'] ?>"><?= $chefRow['name'] ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                    <div class="sm:col-span-2">
                                        <label for="name"
                                            class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                            price</label>
                                        <input type="text" name="price" value="<?= $row['price'] ?>" id="name"
                                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                            placeholder="<?php echo  $lang['placeholderMenuPrice'] ?>">
                                    </div>
                                    <div class="sm:col-span-2 mt-12">
                                        <input type="submit" name="submitUpdate"
                                            class="bg-gray-100 dark:bg-gray-900  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <?php }
			} else {
				?>
            <tr
                class="odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 border-b dark:border-gray-700">
                <th colspan="5"
                    class=" px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white text-center">
                    <?php echo  $lang['data'] ?>
                </th>
            </tr>
            <?php
			}
			?>
        </tbody>
    </table>
</div>
<?php
require_once '../../partials/footer.php';

?>