<?php
include_once('__head.php');
include_once('__header.php');
 ?>
<section id="contenu" class="container noPadding">
  <div id="flagFrame" class="row">
    <img id="flag" class="col-lg-12"src="<?php echo $flag?>" alt="drapeau <?php echo $p['nom'];?>">
    <aside id="info" class="col-lg-4 offset-lg-7">

    </aside>
  </div>

  <div class="row">
    <div id="img" class="col-lg-5 offset-lg-1">

    </div>
    <article id="description" class="col-lg-5 offset-lg-7">

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
