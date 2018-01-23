 <?php
 include('__head.php');
 include('__header.php');
 ?>
<section id="contenu" class="container">
  <div class="">
    <div class="pays">
      <?php foreach ($countryCache as $element) {
              $country = unserialize($element);
        ?>
          <div class="drapeau">
            <img class="" src=" <?php echo $country->getFlag();?>" alt="drapeau du pays <?php $country->getNameFr();?>">
            <div class="container filtre">
              <div class="row">
                <h3 class=" nomPays col-lg-8 offset-lg-2"> Pays : <?php echo $country->getNameFr();?> </h3>
                <a class="decouvrir col-6 col-lg-4 offset-4 offset-lg-55" href="pays/<?php echo rawurlencode (strtolower ($country->getNameEn()));?>">Découvrir</a>
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
<?php include('__footer.php'); ?>
