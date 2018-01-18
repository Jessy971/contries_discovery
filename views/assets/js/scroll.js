$(function(){


  $('.pays').mouseover(function(){
      sessionStorage.setItem('scrollPosition', $('.pays').scrollLeft());
      //Ecouteur dévènement sur les touches clavier flèche droite et gauche.
    document.addEventListener("keydown", function (e) {

      //Récupère le numéro clé ou le mot clés de la touche flèche droite.
      //Si l'une ou l'autre de ses clé correspond à la condition, alors on peut passer
      //au slide suivant.
      if ((e.keyCode === 39) || (e.key === "ArrowRight")){
          $( ".pays" ).scroll();
      }

      //Récupère le numéro clé ou le mot clés de la touche flèche gauche.
      //Si l'une ou l'autre de ses clé correspond à la condition, alors on peut passer
      //au slide précédent.
      else if((e.keyCode === 37) || (e.key === "ArrowLeft")) {
         $( ".pays" ).scroll();
      }

      var position = $('.pays').scrollLeft();
      if(position > 0){
        sessionStorage.setItem('scrollPosition', position);
        console.log(position)
      }
      else {
        console.log("position = 0");
      }

    });
  });

  // récupère la position de la scrollBar pour la restituer lors d'un rafraichissement ou d'un retour sur la page depuis une autre page.
  if (sessionStorage.getItem('scrollPosition')){
    var postionScrollBar = sessionStorage.getItem('scrollPosition');
    $('.pays').scrollLeft(postionScrollBar);
  }
  else {
    $('.pays').scrollLeft(0);
  }
});
