<?php

require_once '../../partials/navbar.php';
include '../../app/controllers/user.php';

$result = all();

if (isset($_POST['submit'])) {
    add($_POST['name'], $_POST['email'], $_POST['name'], $_POST['selectRole']);
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
                    <?= $row['email'] ?>
                </td>
                <td class="px-6 py-4">

                    <span
                        class="<?= ($row['role_id'] == 1)  ? 'bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-yellow-900 dark:text-yellow-300' : (($row['role_id'] == 2)                                                    ? 'bg-pink-100 text-pink-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-pink-900 dark:text-pink-300'                                                    : 'bg-purple-100 text-purple-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded-full dark:bg-purple-900 dark:text-purple-300') ?>">
                        <?= $row['role'] ?>
                    </span>


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
                    <!-- Assuming this is within a loop for multiple rows -->
                    <form method="post" class="delete-form">
                        <input type="hidden" name="id" value="<?= $row['id'] ?>" />
                        <button type="button" class="delete-button" data-id="<?= $row['id'] ?>">
                            <lord-icon src="https://cdn.lordicon.com/xekbkxul.json" trigger="hover"
                                style="width:30px;height:30px"></lord-icon>
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

<script>
document.addEventListener("DOMContentLoaded", function() {
    var deleteButtons = document.querySelectorAll(".delete-button");

    deleteButtons.forEach(function(button) {
        button.addEventListener("click", function() {
            var idToDelete = this.getAttribute("data-id");

            // if (confirm("Are you sure you want to delete this item?")) {
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "delete.php", true);
            xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

            xhr.onreadystatechange = function() {
                if (xhr.readyState === 4) {
                    if (xhr.status === 200) {
                        console.log(xhr.responseText);
                        // setTimeout(function() {
                        //     location.reload();
                        // }, 5);
                    } else {
                        console.error("Error:", xhr.statusText);
                    }
                }
            };

            xhr.onerror = function() {
                console.error("Network error");
            };

            xhr.send("id=" + encodeURIComponent(idToDelete));
            // }
        });
    });
});
</script>

<?php
require_once '../../partials/footer.php'; ?>