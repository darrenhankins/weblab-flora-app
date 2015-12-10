<?php
function convert_to_csv($input_array, $output_file_name, $delimiter)
{
   /** open raw memory as file, no need for temp files, be careful not to run out of memory thought */
   $f = fopen('php://memory', 'w');
   /** loop through array  */
   foreach ($input_array as $line) {
      /** default php csv handler **/
      fputcsv($f, $line, $delimiter);
   }
   /** rewrind the "file" with the csv lines **/
   fseek($f, 0);
   /** modify header to be downloadable csv file **/
   header('Content-Type: application/csv');
   header('Content-Disposition: attachement; filename="' . $output_file_name . '";');
   /** Send file to browser for download */
   fpassthru($f);
}

/** Array to convert to csv */
// $array_to_csv = Array(
        
//         Array($id,
//           $name,
//           $email
//        ),
//        Array(56544,
//           'John',
//           'Doe'
//        ),
//        Array(78550,
//           'Mark',
//           'Smith'
//        )
// );

function create_date($created) {

  $insta_date = $created;
  $offset = 7*60*60;    // 7 hours off from GST
  $t12 =  gmdate('Y-m-d H:i:s', $insta_date-$offset);
  $d = gmdate('m-d-Y', $insta_date-$offset);
  // print "Date/Time = ".gmdate('m-d-Y H:i:s', $insta_date-$offset);
  $dte = $d." (".date("g:i a", strtotime("$t12")).")";

  return $dte;

}

function scrape_flora($plant) {

    $id= $plant->getId();
    $date = create_date($plant->getCreated());
    $name= $plant->getName();
    $location= $plant->getLocation();
    $longitude= $plant->getLongitude();
    $latitude= $plant->getLatitude();
    $user_id= $plant->getUserId();
    //$weather_id= $plant->getWeatherId();
    $weather= $plant->getWeather();
    //$soil_id= $plant->getSoilId();
    $soil= $plant->getSoil();
    $temperature= $plant->getTemperature();
    $wind= $plant->getWind();
    $humidity= $plant->getHumidity();
    $notes= $plant->getNotes();

     return Array (
        $id,
        $date,
        $name,
        $location,
        $longitude,
        $latitude,
        $user_id,
        //$weather_id,
        $weather,
        //$soil_id,
        $soil,
        $temperature,
        $wind,
        $humidity,
        $notes
       );
}

$ret = array(
    // Columns names correlate with tables column names
    array(
        'Id',
        'Date',
        'Name',
        'Location',
        'Longitude',
        'Latitude',
        'User Id',
        //'Weather Id',
        'Weather',
        //'Soil Id',
        'Soil',
        'Temperature (F)',
        'Wind (mph)',
        'Humidity (%)',
        'Notes'
    )
);



foreach($plants as $plant) {
  $ret[] = scrape_flora($plant);
  //var_dump(scrape_flora($plant));
}



$array_to_csv = $ret;
convert_to_csv($array_to_csv, 'flora_report.csv', ',');


