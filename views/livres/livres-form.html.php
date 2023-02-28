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
    <input type="hidden" name="num" value="<?php if ($mode == "edit") echo $livre->getNum(); ?>" />

    <!-- isbn -->
    <div class="mb-6">
      <label for="isbn" class="label-1">livre isbn</label>
      <input type="text" id="isbn" class="input-1" placeholder="" name="isbn" value="isbn" <?php if ($mode == "edit") : ?> value="<?php echo $livre->getIsbn(); ?>" <?php endif;  ?> />
      <!-- <input type="text" id="isbn" class="input-1" placeholder="" name="isbn" <?php if ($mode == "edit") : ?> value="<?php echo $livre->getIsbn(); ?>" <?php endif;  ?> /> -->
    </div>

    <!-- titre -->
    <div class="mb-6">
      <label for="titre" class="label-1">titre</label>
      <input type="text" id="titre" class="input-1" placeholder="" name="titre" value="titre" <?php if ($mode == "edit") : ?> value="<?php echo $livre->getTitre(); ?>" <?php endif;  ?> />
      <!-- <input type="text" id="titre" class="input-1" placeholder="" name="titre" <?php if ($mode == "edit") : ?> value="<?php echo $livre->getTitre(); ?>" <?php endif;  ?> /> -->
    </div>
    <!-- langue -->
    <div class="mb-6">
      <label for="langue" class="label-1">langue</label>
      <input type="text" id="langue" class="input-1" placeholder="" name="langue" value="langue" <?php if ($mode == "edit") : ?> value="<?php echo $livre->getLangue(); ?>" <?php endif;  ?> />
      <!-- <input type="text" id="langue" class="input-1" placeholder="" name="langue" <?php if ($mode == "edit") : ?> value="<?php echo $livre->getLangue(); ?>" <?php endif;  ?> /> -->
    </div>

    <!-- prix -->
    <div class="mb-6">
      <label for="prix" class="label-1">prix</label>
      <input type="number" id="prix" class="input-1" placeholder="" name="prix" value="99" <?php if ($mode == "edit") : ?> value="<?php echo $livre->getPrix(); ?>" <?php endif;  ?> />
      <!-- <input type="number" id="prix" class="input-1" placeholder="" name="prix"  <?php if ($mode == "edit") : ?> value="<?php echo $livre->getPrix(); ?>" <?php endif;  ?> /> -->
    </div>

    <!-- editeur -->
    <div class="mb-6">
      <label for="editeur" class="label-1">editeur</label>
      <input type="text" id="editeur" class="input-1" placeholder="" name="editeur" value="editeur" <?php if ($mode == "edit") : ?> value="<?php echo $livre->getEditeur(); ?>" <?php endif;  ?> />
      <!-- <input type="text" id="editeur" class="input-1" placeholder="" name="editeur" <?php if ($mode == "edit") : ?> value="<?php echo $livre->getEditeur(); ?>" <?php endif;  ?> /> -->
    </div>

    <!-- annee -->
    <div class="mb-6">
      <label for="annee" class="label-1">annee</label>
      <input type="number" id="annee" class="input-1" placeholder="" name="annee" value="2022" <?php if ($mode == "edit") : ?> value="<?php echo $livre->getAnnee(); ?>" <?php endif;  ?> />
      <!-- <input type="number" id="annee" class="input-1" placeholder="" name="annee"  <?php if ($mode == "edit") : ?> value="<?php echo $livre->getAnnee(); ?>" <?php endif;  ?> /> -->
    </div>




    <!-- ! SELECT auteur -->
    <div class="mb-6">
      <label for="select_auteur" class="label-1">Auteur</label>
      <select id="select_auteur" class="input-1" name="num_auteur">
        <?php foreach ($auteurs as $auteur) : ?>
          <option value="<?= $auteur->getNum() ?>" <?php if ($mode == "edit") if ($auteur->getNum() == $livre->getNumAuteur()) : ?> selected <?php endif ?>>
            <?= $auteur->getNom() ?>
          </option>
        <?php endforeach ?>
      </select>
    </div>


    <!-- ! SELECT genre -->
    <div class="mb-6">
      <label for="select_genre" class="label-1">Genre</label>
      <select id="select_genre" class="input-1" name="num_genre">
        <?php foreach ($genres as $genre) : ?>
          <option value="<?= $genre->getNum() ?>" <?php if ($mode == "edit") if ($livre->getNumGenre() == $genre->getNum()) : ?> selected <?php endif ?>>
            <?= $genre->getLibelle() ?>
          </option>
        <?php endforeach ?>
      </select>
    </div>

    <button type="submit" class=" cta-btn">
      <?php if ($mode == "edit") echo "edit";
      else echo "add"; ?>

      livre</button>
  </form>






</main>