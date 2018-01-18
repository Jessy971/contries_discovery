<?php
include_once('__head.php');
include_once('__header.php');
 ?>
<section id="contenu" class="container noPadding">
  <div id="flagFrame" class="row grey">
    <img id="flag" class="col-lg-12" src="<?php echo $flag;?>" alt="drapeau <?php echo $p['nom'];?>">
    <h1 id="info" class="offset-lg-7"> <?php echo $p['nom'];?></h1>
  </div>

  <div class="row grey">
    <?php if($quer != 0){?> <!--Affiche une photo aléatoirement.-->
    <img id="img" class="col-10 col-lg-4 offset-1 offset-lg-2" src="<?php echo $picture;?>" alt="">
    <?php } ?>
    <div id="description" class="col-10 col-lg-5 offset-3 offset-lg-7">
      <ul>
        <li class="categories">
          <details open>
            <summary>Capitale :</summary>
            <ul>
              <li><?php echo $p['capitale']; ?></li>
            </ul>
          </details>
        </li>
        <li class="categories">
          <details>
            <summary>Langue(s) parlé(s) :</summary>
            <?php
            if(count($p['langues']) > 1){
              echo "<ul>";
              for($i = 0; $i < count($p['langues']); $i++) {
            ?>
              <li> <?php echo $p['langues'][$i]['name']; ?></li>
            <?php
              }
              echo "</ul>";
            }
            else {
              ?>
              <ul>
                <li><?php echo $p['langues'][0]['name'];?></li>
              </ul>

            <?php
            }
            ?>
          </details>
        </li>
        <li class="categories">
          <details open>
            <summary>Monnaie officielle :</summary>
            <ul>
              <li><?php echo $p['monnaie']; ?></li>
            </ul>
          </details>

        </li>
        <li class="categories">
          <details open>
            <summary>Continent :</summary>
            <ul>
              <li><?php echo $p['continent']; ?></li>
            </ul>
          </details>
        </li>
        <li class="categories">
          <details>
            <summary>Coodronné gps :</summary>
            <ul>
              <li> Latitude : <span id="lat"><?php echo $lat; ?></span></li>
              <li> Longitude : <span id="lng"><?php echo $lng; ?></span></li>
            </ul>
          </details>
        </li>
      </ul>
    </div>
  </div>
  <div class="row">
    <aside id="map" class="col-sm-12"></aside>
  </div>
  <div id="commentaires" class="row d-flex grey p-5">
    <div class="row col-lg-12 pb-5">
      <h2 class="m-auto">Laissez votre avis</h2>
    </div>
    <?php include("__formCom.php"); ?>
    <div class="listeCommentaire col-lg-5 offset-lg-1">
      <!--Affiche les commentaires lié.-->
      <?php if(count($commentaires) != 0){
            while ($c = $commentaires->fetch()) {?>
              <article class="commentaire">
                <h4> Posté part : <?php echo $c['pseudo'];?></h4>
                <p>
                  <i> Le : <?php echo $c['date_com'];?></i>
                  <br>
                  <?php echo $c['commentaire'];?>
                </p>
              </article>
              <hr>
        <?php }} ?>
    </div>
  </div>
</section>
<?php include_once('__footer.php');?>
