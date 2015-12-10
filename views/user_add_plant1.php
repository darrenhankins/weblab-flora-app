<?php
  include_once('../includes/openweather-api.php');
 
if (!isset($_GET["geo"])) {
  
    $url = "http://api.openweathermap.org/data/2.5/weather?lat=".$_GET['lat']."&lon=".$_GET['lon']."&mode=json&appid=2de143494c0b295cca9337e1e96b00e0&units=imperial";

    $response = request($url,null, "GET");
    $temp = ceil($response->main->temp);
    $wind = $response->wind->speed;
    $humid = $response->main->humidity;
    $loc_name = $response->name;
    $lon = $response->coord->lon;
    $lat = $response->coord->lat; 
  } else {
    $temp = "NA";
    $wind = "NA";
    $humid ="NA";
    $loc_name = "";
    $lon = "NA";
    $lat = "NA";
  }

  // $insta_date = $response->dt;
  // $offset = 7*60*60;    // 7 hours
  // $t12 =  gmdate('Y-m-d H:i:s', $insta_date-$offset);
  // $d = gmdate('m-d-Y', $insta_date-$offset);
  // // print "Date/Time = ".gmdate('m-d-Y H:i:s', $insta_date-$offset);
  // print "Date/Time Checked = ".$d." (".date("g:i a", strtotime("$t12")).")";

  // print "<pre>".print_r($response,true)."</pre>";

?>
<!DOCTYPE html>
<html>
    <head>
        <title>Flora Registry</title>
        <link rel="stylesheet" type="text/css" href="css/base.css">
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">    
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Flora Registry</div>
                <div class="menubar"><?php include('common/menu.php') ?></div>
                <br>
                <div><?php if (isset($_GET["geo"])) { print "Unable to retrieve location data. Please fill out form to the best or your ability."; } ?></div>
                <hr>
                <div>
                    <?php $user = $_SESSION['current_user']; ?>
                    <form action="user.php" method="get">
                      <input type="hidden" name="action" value="save_flora"> 
                      <?php print '<input type="hidden" name="id" value="'.$user->getId().'">'; ?>
                      <br>
                      <br>
                      <label>Name: </label><input type="text" name="name" value="">
                      <br>
                      <br>
                      <!-- <label>Location Name:?></label><input type="text" name="location" value=""> -->
                      <label>Location Name: </label><input type="text" name="location" value="<?= $loc_name ?>">
                      <label>Latitude: </label><input type="text" name="latitude" value="<?= $lat ?>">
                      <label>Longitude: </label><input type="text" name="longitude" value="<?= $lon ?>">
                      <br>
                      <br>
                      <label>Weather: </label><input type="radio" name="weather" value="sunny" checked>Sunny
                      <input type="radio" name="weather" value="cloudy">Cloudy
                      <input type="radio" name="weather" value="rainy">Rainy
                      <input type="radio" name="weather" value="windy">Windy
                      <input type="radio" name="weather" value="snowy">Snowy
                      <input type="radio" name="weather" value="foggy">Foggy
                      <br>
                      <br>
                      <label>Soil Type: </label><input type="radio" name="soil" value="chalky" checked>Chalky
                      <input type="radio" name="soil" value="clay">Clay
                      <input type="radio" name="soil" value="peaty">Peaty
                      <input type="radio" name="soil" value="silty">Silty
                      <input type="radio" name="soil" value="sandy">Sandy
                      <input type="radio" name="soil" value="loamy">Loamy
                      <br>
                      <br>
                      <label>Temperature: </label><input type="text" name="temperature" value="<?= $temp ?>">
                      <label>Wind: </label><input type="text" name="wind" value="<?= $wind ?>">
                      <label>Humidity: </label><input type="text" name="humidity" value="<?= $humid ?>">
                      <br>
                      <br>
                      <label>Notes: </label><br>
                      <textarea rows="4" cols="30" name="notes"></textarea>
                      <br>
                      <br>
                      <input type="submit" value="Save"  class='button'>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>