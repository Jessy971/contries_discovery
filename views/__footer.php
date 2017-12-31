<!-------------------------------------------------------------------------->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC9BVHtFq2uv-jZ9er_HM2-XxYwiV2YLuI&callback=initMap"></script>
<!-------------------------------------------------------------------------->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">

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



</script>
<!-------------------------------------------------------------------------->
<!--
<script type="text/javascript" src="../librairy/ajax.js"></script>
<script type="text/javascript" src="../controller/paysController.js"></script>-->
</body>
<!-------------------------------------------------------------------------->
</html>
