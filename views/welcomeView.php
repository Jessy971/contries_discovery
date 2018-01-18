 <?php
 include_once('__head.php');
 include_once('__header.php');
 ?>
<section id="contenu" class="container">
  <div class="pays">
    <?php foreach ($array as $pays) { ?>
        <div class="drapeau">
          <img class="" src=" <?php echo $pays['drapeau'];?>" alt="">
          <div class="container filtre">
            <div class="row">
              <h3 class=" nomPays col-lg-8 offset-lg-2"> Pays : <?php echo $pays['nom'];?> </h3>
              <a href="pays/<?php echo urlencode($pays['nom']).'/'; echo urlencode($pays['alpha2Code']);?>">Découvrir</a>
          </div>
          </div>
        </div>
      <?php } ?>
  </div>
  <div id="map">

  </div>
</section>
<?php include_once('__footer.php'); ?>
