 <?php
 include_once('__head.php');
 include_once('__header.php');
 ?>
<section id="contenu" class="container">
  <div class="">
    <div class="pays">
      <?php foreach ($array as $pays) { ?>
          <div class="drapeau">
            <img class="" src=" <?php echo $pays['drapeau'];?>" alt="">
            <div class="container filtre">
              <div class="row">
                <h3 class=" nomPays col-lg-8 offset-lg-2"> Pays : <?php echo $pays['nom'];?> </h3>
                <a class="decouvrir col-6 col-lg-4 offset-4 offset-lg-55" href="pays/<?php echo rawurlencode (strtolower ($pays['name']))/*.'/'. rawurlencode($pays['alpha2Code'])*/;?>">Découvrir</a>
            </div>
            </div>
          </div>
        <?php } ?>
    </div>
  </div>
  <div class="row">
    <div id="map" class="col-sm-12"></div>
  </div>
</section>
<?php include_once('__footer.php'); ?>
