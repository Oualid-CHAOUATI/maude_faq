<main>




  <form method="POST" action='traitement/inscription.traitement.php' class="mx-auto">

    <h2>Formulaire d'inscriptions</h2>


    <!-- NOM -->
    <div class="mb-6">
      <label for="nom" class="label-1">nom</label>
      <input type="text" id="nom" class="input-1" placeholder="" required name="nom" />
    </div>
    <!-- PRENOM -->

    <div class="mb-6">
      <label for="prenom" class="label-1">prenom</label>
      <input type="text" id="prenom" class="input-1" placeholder="" required name="prenom" />
    </div>

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
    <div class="mb-6">
      <label for="motdepasse2" class="label-1">mot de passe</label>
      <input type="password" id="motdepasse2" class="input-1" placeholder="" required name="motdepasse2" />
    </div>


    <div class="flex items-center justify-between">

      <button type="submit" class=" cta-btn">


        S'inscrire</button>

      <a href="index.php">se connecter</a>
    </div>
  </form>






</main>