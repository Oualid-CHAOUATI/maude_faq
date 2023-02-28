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

    <!-- NUM -->
    <input type="hidden" name="num" value="<?php if ($mode == "edit") echo $adherent->getNum(); ?>" />



    <!-- NOM -->
    <div class="mb-6">
      <label for="nom" class="label-1">Adherent nom</label>
      <input type="text" id="nom" class="input-1" placeholder="" required name="nom" <?php if ($mode == "edit") : ?> value="<?php echo $adherent->getNom(); ?>" <?php endif;  ?> />
    </div>
    <!-- PRENOM -->

    <div class="mb-6">
      <label for="prenom" class="label-1">Adherent prenom</label>
      <input type="text" id="prenom" class="input-1" placeholder="" required name="prenom" <?php if ($mode == "edit") : ?> value="<?php echo $adherent->getPrenom(); ?>" <?php endif;  ?> />
    </div>

    <!-- mail -->

    <div class="mb-6">
      <label for="mail" class="label-1">@mail</label>
      <input type="text" id="mail" class="input-1" placeholder="" required name="adr_mail" <?php if ($mode == "edit") : ?> value="<?php echo $adherent->getAdrMail(); ?>" <?php endif;  ?> />
    </div>

    <!-- tel -->

    <div class="mb-6">
      <label for="tel" class="label-1">tel</label>
      <input type="text" id="tel" class="input-1" placeholder="" required name="tel" <?php if ($mode == "edit") : ?> value="<?php echo $adherent->getTel(); ?>" <?php endif;  ?> />
    </div>





    <!-- adresse de residence -->
    <div data-purpose="adress-inputs-wrapper" class="p-4  ring  mb-5">
      <h2 class="bg-blue-600 text-center">adresse de residence </h2>
      <!-- rue -->
      <div class="mb-6">
        <label for="rue" class="label-1">numero et nom de la rue </label>
        <input type="text" id="rue" class="input-1" placeholder="" required name="adr_rue" <?php if ($mode == "edit") : ?> value="<?php echo $adherent->getAdrRue(); ?>" <?php endif;  ?> />
      </div>

      <!-- cp -->
      <div class="mb-6">
        <label for="cp" class="label-1">code postal </label>
        <input type="number" id="cp" class="input-1" placeholder="" required name="adr_cp" <?php if ($mode == "edit") : ?> value="<?php echo $adherent->getAdrCp(); ?>" <?php endif;  ?> />
      </div>

      <!-- ville -->
      <div class="mb-6">
        <label for="ville" class="label-1">ville </label>
        <input type="text" id="ville" class="input-1" placeholder="" required name="adr_ville" <?php if ($mode == "edit") : ?> value="<?php echo $adherent->getAdrVille(); ?>" <?php endif;  ?> />
      </div>

    </div>



    <button type="submit" class=" cta-btn">
      <?php if ($mode == "edit") echo "edit";
      else echo "add"; ?>

      <?= $page_label ?></button>
  </form>






</main>