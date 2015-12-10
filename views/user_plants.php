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
  <?php
      $user = $_SESSION['current_user'];
      // if ($user == null) {
      //  header('Location: index.php');
      // }
      // if($user->isAdmin()){
      //  echo "<div style='color:red'>Administrator</div>";
      // }
  ?>
  <!-- <p>The .table-responsive class creates a responsive table which will scroll horizontally on small devices (under 768px). When viewing on anything larger than 768px wide, there is no difference:</p> -->                                                                                 
  <div class="table-responsive">          
  <table class="table">
    <thead>
      <tr>
        <th>Date</th>
        <th>Name</th>
        <th>Location</th>
        <th>Longitude</th>
        <th>Latitude</th>
        <th>Weather</th>
        <th>Soil</th>
        <th>Temperature</th>
        <th>Wind</th>
        <th>Humidity</th>
        <th>Notes</th>
      </tr>
    </thead>
    <tbody>
      <?php 
        foreach($plants as $plant){ ?>
          <?php
          $insta_date = $plant->getCreated();
              $offset = 7*60*60;    // 7 hours
              $t12 =  gmdate('Y-m-d H:i:s', $insta_date-$offset);
              $d = gmdate('m-d-Y', $insta_date-$offset);
              // print "Date/Time = ".gmdate('m-d-Y H:i:s', $insta_date-$offset);
              $date = $d." (".date("g:i a", strtotime("$t12")).")";
          ?>  
          <tr>
            <td><?= $date ?></td>
            <td><?= $plant->getName() ?></td>
            <td><?= $plant->getLocation() ?></td>
            <td><?= $plant->getLongitude() ?></td>
            <td><?= $plant->getLatitude() ?></td>
            <td><?= $plant->getWeather() ?></td>
            <td><?= $plant->getSoil() ?></td>
            <td><?= $plant->getTemperature() ?>°</td>
            <td><?= $plant->getWind() ?> mph</td>
            <td><?= $plant->getHumidity() ?> %</td>
            <td><?= $plant->getNotes() ?></td>
          </tr>
      <?php } ?>
    </tbody>
  </table>
  </div>
</div>

</body>
</html>


<table>      
                    