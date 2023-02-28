<nav>

  <nav class="flex  gap-3 items-center border-b-2 border-b-blue-600 ">

    <a href="index.php">

      <img src=" assets/imgs/logo" id="logo" />
    </a>

    <ul class="m-auto flex gap-2 nav-menu">

      <li>
        <a href="index.php">

          <span>

            Home
          </span>

        </a>
      </li>

      <li>
        <a href="index.php?uc=continents&action=list"><span>continents</span></a>
      </li>


      <li>
        <a href="index.php?uc=nationalities&action=list"><span>Nationalities</span></a>
      </li>

      <li>
        <a href="index.php?uc=genres&action=list"><span>Genres</span></a>
      </li>
      <li>
        <a href="index.php?uc=auteurs&action=list"><span>Auteurs</span></a>
      </li>
      <li>
        <a href="index.php?uc=livres&action=list"><span>Livres</span></a>
      </li>
      <li>
        <a href="index.php?uc=adherents&action=list"><span>Adhrents</span></a>
      </li>
      <li>
        <a href="index.php?uc=prets&action=list"><span>Prets</span></a>
      </li>
    </ul>

  </nav>
</nav>

<div id="custom-cursor" "></div>





<?php



$messages = $_SESSION["messages"];


?>



<div class=" flex flex-col gap-2 fixed bottom-0 w-full mx-auto left-0 ">

  <?php
  foreach ($messages as $type => $messagesArray) {
    foreach ($messagesArray as $index => $message) :
  ?>
      <?php $DOM_KEY = $type . $index; ?>

      <div id="pop-up-<?= $DOM_KEY; ?>" class="pop-up bg-green-500 flex gap-2 justify-between px-4 py-3 border-4 border-blue-700 bg-opacity-80">
  <div class="flex items-center text-white text-sm font-bold " role="alert">
    <?php getIcon("i"); ?>
    <p>
      <?= $message; ?>
    </p>
  </div>
  <button class="close-pop-up-btn" data-parent-id="pop-up-<?= $DOM_KEY; ?>">
    <?php getIcon("x"); ?>

  </button>
</div>
<?php endforeach ?>
<?php } ?>
</div>


<?php
emptyMessages();
?>