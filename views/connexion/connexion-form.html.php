<main>




  <form method="POST" action='traitement/connexion.traitement.php' class="mx-auto">

    <h2>Formulaire de connexion</h2>



    <!-- mail -->

    <div class="mb-6">
      <label for="mail" class="label-1">@mail</label>
      <input type="text" id="mail" class="input-1" placeholder="" required name="mail" />
    </div>

    <!-- tel -->

    <div class="mb-6">
      <label for="motdepasse" class="label-1">mot de passe</label>
      <input type="password" id="motdepasse" class="input-1" placeholder="" required name="motdepasse" />
    </div>


    <div class="flex items-center justify-between">

      <button type="submit" class=" cta-btn">


        Se connecter</button>

      <a href="index.php?uc=inscriptions">s'inscrire</a>
    </div>
  </form>






</main>