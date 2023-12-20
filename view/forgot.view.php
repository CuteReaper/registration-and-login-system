<?php require ("parts/header.php"); ?>

<form class="max-w-sm mx-auto" action=".././controller/forgot.php" method="POST">
    <h1 class="<?= (isset($_SESSION["isvalid"])) ? (($_SESSION["isvalid"])== true ? "valid:border-green-500" : "invalid:border-red-500") : "hidden"  ?>"><?= (isset($_SESSION["satus"])) ? $_SESSION["satus"] : null  ?></h1>
<div class="mb-5">
  <label for="name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">new username</label>
    <input type="text" name="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="username" required>
  </div>


  </div>
  <button type="submit" name="change" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">change password</button>
</form>

<?php require ("parts/footer.php"); ?>