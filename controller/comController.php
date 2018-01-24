<?php
if(isset($_POST['pseudo'], $_POST['text'], $_SESSION['pays']))
{
  require("librairy/BdConnection.class.php");
  require("model/ManagerCommentaire.class.php");

  $pays        = intVal($_SESSION['pays']);
  $pseudo      = htmlentities($_POST['pseudo']);
  $contenu     = htmlentities($_POST['text']);
  $commentaire = new ManagerCommentaires();
  $commentaire->createCom($pseudo, $contenu, $_SESSION['pays']);
}
header("Location: pays/".$_SESSION['pays']);
