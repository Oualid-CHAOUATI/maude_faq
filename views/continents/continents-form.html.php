<main>

  <div class="space-y-2 mx-auto flex flex-col items-center">

    <h1 class="text-4xl leading-none ">
      <?php
      if ($mode == "add") echo "add";
      elseif ($mode == "edit") echo "edit";
      ?>
      <?= $page ?>

    </h1>
    <?php
    goBackBtn();
    ?>

  </div>





  <form method="POST" action='index.php?uc=<?= $page ?>&action=request-<?= $mode ?>' class="mx-auto">
    <div class="mb-6">
      <label for="libelle" class="label-1">Continent libelle</label>
      <input type="text" id="libelle" class="input-1" placeholder="" required name="libelle" <?php if ($mode == "edit") : ?> value="<?php echo $continent->getLibelle(); ?>" <?php endif;  ?> />
      <input type="hidden" name="num" value="<?php if ($mode == "edit") echo $continent->getNum(); ?>" />



    </div>


    <button type="submit" class="cta-btn">
      <?php if ($mode == "edit") echo "edit";
      else echo "add"; ?>

      continent</button>
  </form>


</main>