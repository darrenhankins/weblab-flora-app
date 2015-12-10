<?php

include('../includes/openweather-api.php');

 // if($_SERVER['REQUEST_METHOD'] == "POST"){
    //$url = "http://api.openweathermap.org/data/2.5/forecast?q=".urlencode($_POST['city'])."&mode=json&appid=2de143494c0b295cca9337e1e96b00e0&units=imperial";
    //$url = "http://api.openweathermap.org/data/2.5/weather?q=".urlencode($_POST['city'])."&mode=json&appid=2de143494c0b295cca9337e1e96b00e0&units=imperial";
     $url = "http://api.openweathermap.org/data/2.5/weather?lat=".$_GET['lat']."&lon=".$_GET['lon']."&mode=json&appid=2de143494c0b295cca9337e1e96b00e0&units=imperial";
    $response = request($url,null, "GET");
    //print "<pre>".print_r($response->list[0]->main->temp, true)."</pre>";
    print "Longitude = ".$response->coord->lon."<br>";
    print "Latitude = ".$response->coord->lat."<br>";
    print "Location = ".$response->name."<br>";
    print "Tempature = ".ceil($response->main->temp)."° F<br>";
    print "Wind = ".$response->wind->speed." mph<br>";
    print "Humidity = ".$response->main->humidity." %<br>";

    $insta_date = $response->dt;
    $offset = 7*60*60;    // 7 hours
    $t12 =  gmdate('Y-m-d H:i:s', $insta_date-$offset);
    $d = gmdate('m-d-Y', $insta_date-$offset);
    // print "Date/Time = ".gmdate('m-d-Y H:i:s', $insta_date-$offset);
    print "Date/Time Checked = ".$d." (".date("g:i a", strtotime("$t12")).")";

    print "<pre>".print_r($response,true)."</pre>";
  //}
  ?>
 
<!-- <form method="post">
  <input name="city" placeholder="city" />
  <input type = "submit" />
</form> -->

<?
// require_once('../lib/db.interface.php');
// require_once('../lib/db.class.php');

// $data_source = 'Local Cache';
// $current_time = time();
// $zip = 80538;      
// $cache_time = 10;
// $url = 'api.openweathermap.org/data/2.5/weather?zip='.$zip.',us'; 
// $url = $url . '&APPID=7d7fffe39e7c66965aaf15016448d3e8';

// $db = new Db();
// $cached_data = $db -> select("SELECT temp, updated from weather where zip = $zip limit 1;");
// $current_temp_f = $cached_data[0]['temp'];
// $cached_time = $cached_data[0]['updated'];

// if($current_time > ($cached_time + $cache_time)){
//   $db -> query("DELETE from weather where zip = $zip");

//   // cURL calls
//   $curl = curl_init($url);
//   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
//   $data = curl_exec($curl);
//   curl_close($curl);
  
//   // Convert string data to json object
//   $json_obj = json_decode($data);
//   //var_dump($json_obj);
//   if(!isset($json_obj->main->temp)){
//     echo "Danger, Will Robinson!";
//     exit;
//   }
//   // Grap temp data
//   $current_temp_kelvin = $json_obj->main->temp;
//   $data_source = 'OpenWeatherMap';
  
//   // Convert to f
//   $current_temp_f = ($current_temp_kelvin - 273.15) * 1.8 + 32;
  
//   $results = $db -> query("insert into weather (zip, temp, updated) values ($zip, $current_temp_f, $current_time);");

// }

// echo "Current Temp: " . $current_temp_f . "&deg; Fahrenheit from " . $data_source;

