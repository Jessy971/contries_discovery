<?php

  class ManagerCommentaires extends BdConnection{
    public function __construct()
    {
      $this->connexionBdd = $this->bdd();
    }

    //cree un nouveau commentaire
    public function createCom($pseudo, $com, $pays)
    {
        $creat= $this->connexionBdd->prepare('INSERT INTO commentaire(pseudo, commentaire, date_com, pays) 
                                              VALUES(:pseudo, :com, 
                                              NOW(), :pays)');
        $creat->execute(
          array(
            'pseudo' => $pseudo,
            'com'    => $com,
            'pays'  => $pays)
        );
    }

    //Affiche tout les commentaires.
    public function readAllComments($pays)
    {
        $read = $this->connexionBdd->prepare('SELECT pseudo, commentaire, 
                                              DATE_FORMAT(date_com, \'%d-%m-%Y à %Hh%i.\') AS date_com 
                                              FROM commentaire 
                                              WHERE pays = :pays 
                                              ORDER BY id DESC');
        $read->execute(array(
          'pays'=> $pays));
        return $read;
      }

    //Signale un commentaire pour le modérer.
    public function signaleComment($idCom, $signaleCom)
    {
      $signale = $this->connexionBdd->prepare('UPDATE commentaires 
                                               SET signale = :signaleCom 
                                               WHERE id = :idCom');
      $signale->execute(
        array(
          'signaleCom' => $signaleCom,
          'idCom'      => $idCom)
      );
    }

    //supression du commentaire.
    public function delete($id)
    {
      $delete=$this->connexionBdd->prepare('DELETE FROM commentaires 
                                            WHERE id=?');
      $delete->execute(array($id));
    }

    //récupère le nombre de commentaires dans la table
    public function countCom($idArticle)
    {
      $count = $this->connexionBdd->prepare('SELECT id 
                                            FROM commentaires 
                                            WHERE id_article = :idArticle');
      $count->execute(['idArticle' => $idArticle]);
      $nCom = $count->rowCount();
      return $nCom;
      
    }
  }
