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
                <?php include('common/menu.php') ?>
                <br>
                <hr>
                <div>
                <?php
                    $user = $_SESSION['current_user'];
                    // if ($user == null) {
                    //  header('Location: index.php');
                    // }
                    // if($user->isAdmin()){
                    //  echo "<div style='color:red'>Administrator</div>";
                    // }
                ?>
                <div>
                    <table>      
                    <tr>
                      <td>Date</td>
                      <td>Name</td>
                      <td>Location</td>
                      <td>Longitude</td>
                      <td>Latitude</td>
                      <td>Weather</td>
                      <td>Soil</td>
                      <td>Temperature</td>
                      <td>Wind</td>
                      <td>Humidity</td>
                      <td>Notes</td>
                    </tr>            
                    </table> 
                </div>
                <?php foreach($plants as $plant){ ?>
                    <?php
                        $insta_date = $plant->getCreated();
                        $offset = 7*60*60;    // 7 hours
                        $t12 =  gmdate('Y-m-d H:i:s', $insta_date-$offset);
                        $d = gmdate('m-d-Y', $insta_date-$offset);
                        // print "Date/Time = ".gmdate('m-d-Y H:i:s', $insta_date-$offset);
                        $date = $d." (".date("g:i a", strtotime("$t12")).")";
                    ?>
                    <table>
                    <tr>
                      <td><?= $date ?></td>
                      <td><?= $plant->getName() ?></td>
                      <td><?= $plant->getLocation() ?></td>
                      <td><?= $plant->getLongitude() ?></td>
                      <td><?= $plant->getLatitude() ?></td>
                      <td><?= $plant->getWeather() ?></td>
                      <td><?= $plant->getSoil() ?></td>
                      <td><?= $plant->getTemperature() ?>°</td>
                      <td><?= $plant->getWind() ?>°</td>
                      <td><?= $plant->getHumidity() ?>°</td>
                      <td><?= $plant->getNotes() ?></td>
                    </tr>
                    <hr>             
                    </table> 
                <?php } ?>
                               
                </div>
            </div>
        </div>
    </body>
</html>

 
    
    