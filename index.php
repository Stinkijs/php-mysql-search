<?php
require_once 'database.php';
$allusers = $bdd->query('SELECT * FROM users ORDER BY id DESC');
if(isset($_GET['pseudo']) AND !empty($_GET['pseudo'])) {
    $recherche = htmlspecialchars($_GET['pseudo']);
    $allusers = $bdd->query('SELECT pseudo FROM users WHERE pseudo LIKE "%'.$recherche.'%" ORDER BY id DESC');
}
?>
<html>
  <head>
  </head>
  <body>
      <form action="" method="GET" class="form-example">
        <div class="form-example">
          <input type="search" name="pseudo" id="pseudo">
        </div>
        <div class="form-example">
          <input type="submit" name="envoi" value="Rechercher">
      </div>
    </form>
    <?php
        if($allusers->rowCount() > 0) {
            while($user = $allusers->fetch()) {
                ?>
                <p><?= $user['pseudo']; ?></p>
                <?php
            }
        } else {
              ?>
              <p>Aucun utilisateur trouvé</p>
              <?php
        }
      ?>
  </body>
</html>