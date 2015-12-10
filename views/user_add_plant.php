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
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/base.css">
  <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2 class="title">Flora Registry</h2>
  <div class="menubar"><?php include('common/menu.php') ?></div>
  <div><?php if (isset($_GET["geo"])) { print "Unable to retrieve location data. Please fill out form to the best or your ability."; } ?></div>
   <?php $user = $_SESSION['current_user']; ?>

  <form role="form" name="save_flora" action="user.php" method="get">
  <input type="hidden" name="action" value="save_flora">
  <?php print '<input type="hidden" name="id" value="'.$user->getId().'">'; ?>
    <div class="form-group">
      <label for="name">Name:</label>
      <input name="name" type="text" class="form-control" id="name" placeholder="" required>
    </div>
    <div class="form-group">
      <label for="location">Location:</label>
      <input name="location" type="text" class="form-control" id="location" value="<?= $loc_name ?>" required>
    </div>
    <div class="form-group">
      <label for="latitude">Latitude:</label>
      <input name="latitude" type="text" class="form-control" id="latitude" value="<?= $lat ?>" >
    </div>
    <div class="form-group">
      <label for="longitude">Longitude:</label>
      <input name="longitude" type="text" class="form-control" id="longitude" value="<?= $lon ?>" >
    </div>

    <div class="form-group">
      <label for="temperature">Temperature:</label>
      <input name="temperature" type="text" class="form-control" id="temperature" value="<?= $temp ?>" >
    </div>
    <div class="form-group">
      <label for="wind">Wind:</label>
      <input name="wind" type="text" class="form-control" id="wind" value="<?= $wind ?>" >
    </div>
    <div class="form-group">
      <label for="humidity">Humidity:</label>
      <input name="humidity" type="text" class="form-control" id="humidity" value="<?= $humid ?>" >
    </div>

    <label class="radio-inline">
    <input name="weather" id="radio1" value="cloudy" type="radio" checked> Cloudy
    </label>
    <label class="radio-inline">
    <input name="weather" id="radio2" value="rainy" type="radio"> Rainy
    </label>
    <label class="radio-inline">
    <input name="weather" id="radio3" value="windy" type="radio"> Windy
    </label>
    <label class="radio-inline">
    <input name="weather" id="radio4" value="snowy" type="radio"> Snowy
    </label>
    <label class="radio-inline">
    <input name="weather" id="radio5" value="foggy" type="radio"> Foggy
    </label>
  
    <br>
    <br>
    
    <label class="radio-inline">
    <input name="soil" id="radio1" value="clay" type="radio" checked> Chalky
    </label>
    <label class="radio-inline">
    <input name="soil" id="radio2" value="clay" type="radio"> Clay
    </label>
    <label class="radio-inline">
    <input name="soil" id="radio3" value="peaty" type="radio"> Peaty
    </label>
    <label class="radio-inline">
    <input name="soil" id="radio4" value="silty" type="radio"> Silty
    </label>
    <label class="radio-inline">
    <input name="soil" id="radio5" value="sandy" type="radio"> Sandy
    </label>
    <label class="radio-inline">
    <input name="soil" id="radio6" value="loamy" type="radio"> Loamy
    </label>

    
    <br>
    <br>
    <label for="comment">Notes:</label>
      <textarea name="notes" class="form-control" rows="2" id="notes"></textarea>
    <br>

    <button type="submit" class="btn btn-default">Submit</button>
  </form>
</div>

</body> 
</html>


