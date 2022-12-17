<?php 
include "./includes/head.html.php";
include "./includes/navbar.html.php";
include "./actions/connexion.php";



?>

<main>

<div class="space-y-2 mx-auto flex flex-col items-center">

    <h1 class="text-4xl leading-none ">
        add nationalities
    </h1>
    
    <a class="p-4 bg-blue-700 inline-block" href="./nationalities.html.php">go back</a>
</div>





<form method="POST" action="./actions/nationality/add-nationality.php" class="mx-auto">
  <div class="mb-6">
    <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your nationality</label>
    <input type="text" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="" required name="libelle">
  </div>
 
  <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Add nationality</button>
</form>


</main>