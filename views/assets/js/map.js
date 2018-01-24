
      function initMap() {

        if ($('#lat').text() != "" && $('#lng').text() != ""){

          var latt = Number($('#lat').text());
          var long = Number($('#lng').text());
          if (screen.width < 1200){
            var zoom = 8;
          }
          else {
            zoom = 4;
          }
        }
        else {
          latt = 10;
          long = 10;
          zoom = 3;
        }


        var latlng = {lat : latt ,lng : long};

        var option = {
          center : latlng, // récpère les coordonnées gps pour orienter la vue sur le pays consulté.
          zoom : zoom
        };

      //objet map.
        var map = new google.maps.Map(document.getElementById("map"), option);

        var marker = new google.maps.Marker({
            position: latlng,
            map: map
          });

      }
