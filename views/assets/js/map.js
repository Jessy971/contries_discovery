
      function initMap() {

          var latlng = {lat : Number($('#lat').text()),lng : Number($('#lng').text())};// transforme les chaines de caractère en nombre pour les utiliser dans l'api map de google.

          var option = {
            center : latlng, // récpère les coordonnées gps pour orienter la vue sur le pays consulté.
            zoom : 5
          };

      //objet map.
        var map = new google.maps.Map(document.getElementById("map"), option);

        var marker = new google.maps.Marker({
            position: latlng,
            map: map
          });

      }
