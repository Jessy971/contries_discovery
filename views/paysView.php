<?php
include_once('__head.php');
include_once('__header.php');
 ?>
<section id="contenu" class="container noPadding">
  <div id="flagFrame" class="row">
    <img id="flag" class="col-lg-12"src="<?php echo $flag?>" alt="drapeau <?php echo $p['nom'];?>">
    <h1 id="info" class="offset-lg-7"> <?php echo $p['nom'];?></h1>
  </div>

  <div class="row">
    <?php if($quer != 0){?>
    <img id="img" class="col-lg-4 offset-lg-2" src="<?php echo $picture;?>" alt="">
    <?php } ?>
    <article id="description" class="col-lg-5 offset-lg-7">
      <ul>
        <li class="categories"><h5>Capitale :</h5>
          <ul>
            <li><?php echo $p['capitale']; ?></li>
          </ul>
        </li>
        <li class="categories"><h5>Langue(s) parlé(s) :</h5>
          <?php
          /*echo count($p['langues']);*/
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
        </li>
        <li class="categories"><h5>Monnaie officiel :</h5>
          <ul>
            <li><?php echo $p['monnaie']; ?></li>
          </ul>
        </li>
        <li class="categories"><h5>Continent :</h5>
          <ul>
            <li><?php echo $p['continent']; ?></li> 
          </ul>
        </li>
        <li class="categories"><h5>Coodronné gps :</h5>
          <ul>
            <li id="lat"> Latitude : <?php echo $lat; ?></li>
            <li id="lng"> Longitude : <?php echo $lng; ?></li>
          </ul>

        </li>
      </ul>
    </article>
  </div>
  <div class="row">
    <aside id="map" class="col-sm-12"></aside>
  </div>
  <div id="commentaires" class="row d-flex">
    <form class="col-lg-4 offset-lg-1" action="index.html" method="post">
      <div class="form-group">
        <for="pseudo">Pseudo</label>
        <input type="text" name="pseudo" value="Pseudo" class="form-control">
      </div>
      <div class="form-group">
        <label for="text">Ecrivez votre commentaire</label>
        <textarea name="text" class="form-control"></textarea>
      </div>
      <div class="form-group">
        <input type="button" class="btn btn-primary" name="" value="Envoyer">
      </div>
    </form>
    <section class="listeCommentaire col-lg-5 offset-lg-1">

    </section>
  </div>
</section>
<?php include_once('__footer.php'); ?>
