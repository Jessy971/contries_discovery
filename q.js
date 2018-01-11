
    $("#search").keyup(function(e){
      var search = $("#search").val()
      if(search != ""){
        $(".resulta").show();
          $.ajax({
             url      : 'livesearch/' + search, // La ressource ciblée
             type     : 'GET', // Le type de la requête HTTP
             dataType : 'html'
          }).done(function( data ) {
            $(".resulta").html(data);
        });
      }
      else{
        $("#search").val("");
        $(".resulta").hide();
      }
    });
