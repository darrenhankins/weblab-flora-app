<?php 
if(isset($_SESSION['current_user'])){
    $user = $_SESSION['current_user'];
}
?>
<!DOCTYPE html>
<html>
      <head>
        <title>Flora Registry</title> 
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/base.css">
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Flora Registry</div>
                <div class="menubar"><?php include('common/menu.php') ?></div>
                <div>
          <!-- OpenWeather API -->
                    <script type="application/javascript" >

                        //Check if browser supports W3C Geolocation API
                        if (navigator.geolocation) {
                            navigator.geolocation.getCurrentPosition(successFunction, errorFunction);
                        } else {
                            alert('It appears that Geolocation, which is required for this web page application, is not enabled in your browser. Please use a browser which supports the Geolocation API.');
                        }

                        function successFunction(position) {
                            var lat = position.coords.latitude;
                            var lon = position.coords.longitude;
                            window.location.href = "user.php?action=add_flora&lat="+lat+"&lon="+lon;
                            // document.getElementById("demo").innerHTML = 'Latitude:'+lat+' Longitude: '+lon;
                            // alert('Your location coordinates are: Latitude:'+lat+' Longitude: '+lon);
                        }

                        function errorFunction(position) {
                            alert('Error!');
                    }
                    </script>
                    <!-- OpenWeather API -->
                    <h3 class="menubar">We are retrieving your geo-location now...</h3> 
                    <script type="text/JavaScript">
                        <!--
                        setTimeout("location.href = 'user.php?action=add_flora&geo=no';",15000);
                        -->
                    </script>
                </div>
            </div>
        </div>
    </body>
</html>