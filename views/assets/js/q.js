$(function(){

  $("#search").keyup(function(e){

    var search = $("#search").val();
    var url = 'livesearch/';
    if($('#info').text() != ""){
      url = '../../livesearch/pays/';
    }


    if(search != ""){
      $(".resulta").show();
        $.ajax({
           url      : url + search, // La ressource ciblée
           type     : 'GET', // Le type de la requête HTTP
           dataType : 'html'
        }).done(function( data ) {$(".resulta").html(data);});
    }
    else{
      $("#search").val("");
      $(".resulta").hide();
    }
  });

});
