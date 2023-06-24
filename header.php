<header style="width: 100%">
  <div class="gauche">
    <img class="menu" src="menu.svg" alt="Logo de mon site web">
    <img class="logo" src="logo.svg" alt="Logo de mon site web">
  </div>

  <div class="connexion">
    <?php
    if (!isset($_SESSION['email'])) {
      echo '<a href="connexion.php" style="color:white; background-color: #393975;">Connexion</a>';
      echo '<a href="inscription.php"  style="color:white; background-color: #393975; width: 50%;">Inscription</a>';
    } else {
    }
    ?>
  </div>


  <div class="jeux" style="width: 50%; height: 35%; top: 0%; bottom: 0%; left: 0%; right: 0%;">
    <?php
    if (isset($_SESSION['email'])) {
      echo '<a href="users.php" class="bouton">Users</a>';
      echo '<a href="#" class="bouton">Boutique</a>';
      echo '<a href="#" class="bouton" style="margin-right: 2%;">Events</a>';
      echo '<a href="deconnexion.php" style="color:white; background-color: #393975; width: 50%;">Déconnexion</a>';

    } else {
    }
    ?>
  </div>
</header>