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

    <input type="hidden" name="num" value="<?php if ($mode == "edit") echo $auteur->getNum(); ?>" />

    <div class="mb-6">
      <label for="nom" class="label-1">Auteur nom</label>
      <input type="text" id="nom" class="input-1" placeholder="" required name="nom" <?php if ($mode == "edit") : ?> value="<?php echo $auteur->getNom(); ?>" <?php endif;  ?> />
    </div>
    <div class="mb-6">
      <label for="prenom" class="label-1">Auteur prenom</label>
      <input type="text" id="prenom" class="input-1" placeholder="" required name="prenom" <?php if ($mode == "edit") : ?> value="<?php echo $auteur->getPrenom(); ?>" <?php endif;  ?> />
    </div>


    <div class="mb-6">
      <label for="select" class="label-1">auteur Nationalite</label>
      <select id="select" class="input-1" required name="numNationalite">
        <?php foreach ($nationalities as $nationalite) : ?>
          <option value="<?= $nationalite->getNum() ?>" <?php if ($mode == "edit") if ($nationalite->getNum() == $auteur->getNumNationalite()) : ?> selected <?php endif ?>>
            <?= $nationalite->getLibelle()  ?>
          </option>
        <?php endforeach ?>
      </select>
    </div>


    <button type="submit" class=" cta-btn">
      <?php if ($mode == "edit") echo "edit";
      else echo "add"; ?>

      auteur</button>
  </form>






</main>