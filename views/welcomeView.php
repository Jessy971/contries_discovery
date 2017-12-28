 <?php
 include_once('__head.php');
 include_once('__header.php');
 ?>
<section id="contenu" class="container">
  <div class="pays">
    <?php for ($i = 0; $i < count($array); $i++) { ?>
        <div class="drapeau">
          <img class="" src=" <?php echo $array[$i]['drapeau'];?>" alt="">
          <div class="container filtre">
            <div class="row">
              <h3 class=" nomPays col-lg-8 offset-lg-2"> Pays : <?php echo $array[$i]['nom'];?> </h3>
              <ul>
                <li>
                  <h4>Capitale : <?php echo $array[$i]['capitale']; ?></h4>
                </li>
                <li>
                  <h4>Langues :</h4>
                  <ul>
                    <?php
                      for($ii=0; $ii<count($array[$i]['langues']); $ii++){?>
                        <li>
                          <?php echo $array[$i]['langues'][$ii]['name']; ?>
                        </li>
                    <?php }?>
                  </ul>
                </li>
                <li>
                  <h4>Monnaie utilisé : <?php echo $array[$i]['monnaie']; ?></h4>
                </li>
              </ul>
              <a href="pays/<?php echo $array[$i]['nom'].'/'; echo $array[$i]['alpha2Code'];?>"><button>Découvrir</button></a>
          </div>
          </div>
        </div>
      <?php } ?>
  </div>
  <div id="map">

  </div>
</section>
<?php include_once('__footer.php'); ?>
