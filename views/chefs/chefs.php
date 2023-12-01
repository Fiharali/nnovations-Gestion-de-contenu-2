<?php

require_once '../../partials/navbar.php';
include '../../app/controllers/user.php';

$result = all();

if (isset($_POST['submit'])) {
    add($_POST['name'], $_POST['email'], $_POST['name'], $_POST['selectRole']);
}

if (isset($_POST['edit'])) {
   $user= edit($_POST['id']);
}







?>



<div class="relative mt-10 overflow-x-auto sm:rounded-lg md:ml-64 w2/3 md:px-32">
   <?php include 'add.php'; ?>
    <table class="w-full text-sm text-left text-gray-500 rtl:text-right dark:text-gray-400 sm:mx-auto " id="myTable">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
                <th scope="col" class="px-6 py-3 ">
                    Id
                </th>
                <th scope="col" class="px-6 py-3">
                    <?php echo  $lang['columnName'] ?>
                </th>
                <th scope="col" class="px-6 py-3">
                    email
                </th>
                <th scope="col" class="px-6 py-3">
                    role
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>

            <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = $result->fetch_assoc()) {
            ?>
                    <tr class="border-b odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700">
                        <th scope="row" class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                            <?= $row['id'] ?>
                        </th>
                        <td class="px-6 py-4">
                            <?= $row['name'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['email'] ?>
                        </td>
                        <td class="px-6 py-4">
                            <?= $row['role'] ?>
                        </td>
                        <td class="flex px-6 py-4 ml-auto">
                           
                            <form method="post" action="edit.php">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>" />
                                <button type="submit" name="edit" data-modal-target="updateModal<?= $row['id'] ?>" data-modal-toggle="updateModal<?= $row['id'] ?>" type="button" class="mx-4">
                                <lord-icon src=" https://cdn.lordicon.com/zfzufhzk.json" trigger="hover" style="width:30px;height:30px">
                                </lord-icon>
                            </button>
                            </form>
                            <form method="post" action="delete.php">
                                <input type="hidden" name="id" value="<?= $row['id'] ?>" />
                                <button type="submit" name="delete">
                                    <lord-icon src="https://cdn.lordicon.com/xekbkxul.json" trigger="hover" style="width:30px;height:30px">
                                    </lord-icon>
                                </button>
                            </form>

                        </td>
                    </tr>
                    <div id="updateModal<?= $row['id'] ?>" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
                        <div class="relative w-full max-w-2xl max-h-full p-4">
                            <div class="relative bg-white rounded-lg shadow dark:bg-gray-900">
                                <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                                        <?php echo  $lang['UEmploye'] ?>
                                    </h3>
                                    <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="updateModal<?= $row['id'] ?>">
                                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                        </svg>
                                        <span class="sr-only">Close modal</span>
                                    </button>
                                </div>
                                <div class="max-w-2xl px-4 py-1 mx-auto lg:py-16">
                                  
                                </div>
                            </div>
                        </div>
                    </div>
                <?php }
            } else {
                ?>
                <tr class="border-b odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700">
                    <th colspan="5" class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
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