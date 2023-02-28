<main>

  <div class="space-y-2 mx-auto flex flex-col items-center">

    <h1 class="text-4xl leading-none ">
      <?php
      if ($mode == "add") echo "add";
      elseif ($mode == "edit") echo "edit";
      ?>
      continent
    </h1>
    <?php
    goBackBtn();
    ?>

  </div>


  <form method="POST" action='index.php?uc=<?= $page ?>&action=request-<?= $mode ?>' class="mx-auto">
    <div class="mb-6">
      <label for="libelle" class="label-1">Nationalite libelle</label>
      <input type="text" id="libelle" class="input-1" placeholder="" required name="libelle" <?php if ($mode == "edit") : ?> value="<?php echo $nationalite->getLibelle(); ?>" <?php endif;  ?> />
      <input type="hidden" name="num" value="<?php if ($mode == "edit") echo $nationalite->getNum(); ?>" />



    </div>
    <div class="mb-6">
      <label for="select" class="label-1">Your Continent</label>
      <select id="select" class="input-1" required name="continent">
        <?php foreach ($continents as $continent) : ?>
          <option value="<?= $continent->getNum() ?>" <?php if ($mode == "edit") if ($continent->getNum() == $nationalite->getNumContinent()) : ?> selected <?php endif ?>>
            <?= $continent->getLibelle()  ?>
          </option>
        <?php endforeach ?>
      </select>
    </div>


    <button type="submit" class=" cta-btn">
      <?php if ($mode == "edit") echo "edit";
      else echo "add"; ?>

      nationalite</button>
  </form>






</main>