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
    <input type="hidden" name="num" value="<?php if ($mode == "edit") echo $pret->getNum(); ?>" />

    <!-- select livre et adherent  -------------------------------------------- -->

    <!-- ! SELECT livre -->
    <div class="mb-6">
      <label for="select_livre" class="label-1">livre</label>
      <select id="select_livre" class="input-1" name="num_livre">
        <?php foreach ($livres as $livre) : ?>
          <option value="<?= $livre->getNum() ?>" <?php if ($mode == "edit") if ($livre->getNum() == $pret->getNumLivre()) : ?> selected <?php endif ?>>


            <?= $livre->getIsbn() ?>
            <?= $livre->getTitre() ?>

          </option>
        <?php endforeach ?>
      </select>
    </div>




    <!-- ! SELECT adherent -->
    <div class="mb-6">
      <label for="select_adherent" class="label-1">adherent</label>
      <select id="select_adherent" class="input-1" name="num_adherent">
        <?php foreach ($adherents as $adherent) : ?>
          <option value="<?= $adherent->getNum() ?>" <?php if ($mode == "edit") if ($adherent->getNum() == $pret->getNumAdherent()) : ?> selected <?php endif ?>>


            <?= $adherent->getNum() ?>
            <?= $adherent->getNom() . $adherent->getPrenom() ?>

          </option>
        <?php endforeach ?>
      </select>
    </div>

















    <!-- -------------------------------------------- -->
    <!-- date pret -->
    <div class="mb-6">


      <label for="date_pret" class="label-1">date pret</label>
      <input type="date" id="date_pret" class="input-1" placeholder="" name="date_pret" <?php if ($mode == "edit") : ?> value="<?php echo $pret->getDatePret(); ?>" <?php endif;  ?> />

    </div>

    <h2>

    </h2>
    <!-- date retour prevue -->

    <div class="mb-6">

      <label for="date_retour_prevue" class="label-1">date retour prevue</label>
      <input type="date" id="date_retour_prevue" class="input-1" placeholder="" name="date_retour_prevue" <?php if ($mode == "edit") : ?> value="<?php echo $pret->getDateRetourPrevue(); ?>" <?php endif;  ?> />
    </div>



    <!-- date retour reelle -->
    <?php if ($mode == "edit") : ?>
      <div class="mb-6">

        <label for="date_retour_reelle" class="label-1">date retour relle</label>
        <input type="date" id="date_retour_reelle" class="input-1" placeholder="" name="date_retour_reelle" <?php if ($mode == "edit") : ?> value="<?php echo $pret->getDateRetourReelle(); ?>" <?php endif;  ?> />
      </div>

    <?php endif ?>


    <button type="submit" class=" cta-btn">
      <?php if ($mode == "edit") echo "edit";
      else echo "add"; ?>

      prêt</button>
  </form>






</main>