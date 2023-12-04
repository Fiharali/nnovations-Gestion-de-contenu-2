<?php

require_once '../../partials/navbar.php';
include '../../app/controllers/menu.php';

$result = all();

if (isset($_POST['submit'])) {
    add( $_POST['name'], $_POST['selectChef']);
    $result = all();
}

if (isset($_POST['edit'])) {
    $user = edit($_POST['id']);
}
if (isset($_GET['searchSubmit'])) {
    $result = search($_GET['searchInput']);
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
                    Chef
                </th>
                <th scope="col" class="px-6 py-3">
                    Action
                </th>
            </tr>
        </thead>
        <tbody>

            <?php
            if ($result) {
                foreach ($result as $row) {

            ?>
            <tr
                class="border-b odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700">
                <th scope="row"
                    class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
                    <?= $row['id'] ?>
                </th>
                <td class="px-6 py-4">
                    <?= $row['name'] ?>
                </td>
                <td class="px-6 py-4">
                    <?= $row['chef'] ?>
                </td>
                <td class="flex px-6 py-4 ml-auto">

                    <form method="post" action="edit.php">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>" />
                        <button type="submit" name="edit" data-modal-target="updateModal<?= $row['id'] ?>"
                            data-modal-toggle="updateModal<?= $row['id'] ?>" type="button" class="mx-4">
                            <lord-icon src=" https://cdn.lordicon.com/zfzufhzk.json" trigger="hover"
                                style="width:30px;height:30px">
                            </lord-icon>
                        </button>
                    </form>
                    <form method="post" action="delete.php">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>" />
                        <button type="submit" name="delete">
                            <lord-icon src="https://cdn.lordicon.com/xekbkxul.json" trigger="hover"
                                style="width:30px;height:30px">
                            </lord-icon>
                        </button>
                    </form>

                </td>
            </tr>
            <?php }
            } else {
                ?>
            <tr
                class="border-b odd:bg-white odd:dark:bg-gray-900 even:bg-gray-50 even:dark:bg-gray-800 dark:border-gray-700">
                <th colspan="5"
                    class="px-6 py-4 font-medium text-center text-gray-900 whitespace-nowrap dark:text-white">
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