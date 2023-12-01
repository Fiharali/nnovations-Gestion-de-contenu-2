<div id="default-modal" tabindex="-1" aria-hidden="true" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-2xl max-h-full p-4">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-900">
                <div class="flex items-center justify-between p-4 border-b rounded-t md:p-5 dark:border-gray-600">
                    <h3 class="text-xl font-semibold text-gray-900 dark:text-white">
                        <?php echo  $lang['AddEmploye'] ?>
                    </h3>
                    <button type="button" class="inline-flex items-center justify-center w-8 h-8 text-sm text-gray-400 bg-transparent rounded-lg hover:bg-gray-200 hover:text-gray-900 ms-auto dark:hover:bg-gray-600 dark:hover:text-white" data-modal-hide="default-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <div class="max-w-2xl px-4 py-1 mx-auto lg:py-16">
                    <form method="post" id="submitForm">
                        <div class="grid gap-4 sm:grid-cols-2 sm:gap-6">
                            <div class="sm:col-span-2">
                                <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Name </label>
                                <input type="text" name="name" value="<?php echo isset($_POST['name']) ? $_POST['name'] : ''; ?>" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder=" Name">
                                <span><?= isset($_POST['name']) ? $error['name'] : ''; ?></span>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Email </label>
                                <input type="text" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''; ?>" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="Email">
                                <span><?= isset($_POST['email']) ? $error['email'] : ''; ?></span>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="password" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Password </label>
                                <input type="password" name="password" value="<?php echo isset($_POST['password']) ? $_POST['password'] : ''; ?>" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500" placeholder="password">
                                <span><?= isset($_POST['password']) ? $error['password'] : ''; ?></span>
                            </div>
                            <div class="sm:col-span-2">
                                <label for="role" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    role </label>
                                <select name="selectRole" id="role" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                                    <option value="">Choose Role</option>
                                    <option value="2"> Chef</option>
                                    <option value="1">Admin </option>
                                </select>
                                <span><?= isset($_POST['selectRole']) ? $error['role'] : ''; ?></span>  
                            </div>

                            <div class="mt-12 sm:col-span-2">
                                <input type="submit" name="submit" class="bg-gray-100 dark:bg-gray-900  border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5  dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <button data-modal-target="default-modal" data-modal-toggle="default-modal" type="button" class="text-white float-right   font-medium rounded-lg text-sm px-5 py-2.5 text-center me-2 mb-2">
        <lord-icon src="https://cdn.lordicon.com/pdsourfn.json" trigger="hover" style="width:35px;height:35px">
        </lord-icon>
    </button>