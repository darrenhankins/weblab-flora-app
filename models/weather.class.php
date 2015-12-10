<?php

require_once('../lib/db.interface.php');
require_once('../lib/db.class.php');

final class Weather 
{
	// This might be a singleton candidate
	// Handles weather api (and database weather table?)
	
	public static function Instance()
	{
		static $inst = null;
		if ($inst === null)
		{
			$inst = new Weather();
		}
		return $inst;
	}

	private $dataSource;// = 'Local Cache';   
	private $cacheTimeLimit;// =10;
	private $lastCacheTime;// = 0;
	private $urlBase;// = 'api.openweathermap.org/data/2.5/weather?APPID='; 	
	private $defaultZip;// = 80524;   
	private $currentTempF;// = 0;
	

	private function __construct() 
	{
		$this->dataSource = 'Local Cache';   
		$this->cacheTimeLimit = 10;
		$this->lastCacheTime = 0;
		$this->urlBase = 'api.openweathermap.org/data/2.5/weather?units=imperial&APPID='; 	
		$this->defaultZip = 80524;   
		$this->currentTempF = 99;
		//retrieve key from config file
		$apikey = '2d140a6aa717e403bff469810b80e225'; //put in config file		
		$this->urlBase .= $apikey;
	}

	public function getTemp(){return $this->currentTempF;}
	public function getSource(){return $this->dataSource;}


	public function RetrieveWeatherByCoordinates($lat,$lon)
	{
		//api.openweathermap.org/data/2.5/weather?lat={lat}&lon={lon}
		//40.730504, -105.084476
		$lat = isset($lat)?$lat:40.730504;
		$lon = isset($lon)?$lat:-105.084476;
		$url = $this->urlBase . '&lat='.$lat.'&lon='.$lon;
		$this->RetrieveWeather ($url);
	}
	public function RetrieveWeatherByZip ($zip)
	{
		$zip = isset($zip)?$zip:$this->$defaultZip;	
		$url = $this->urlBase . '&zip='.$zip.',us';
		$this->RetrieveWeather ($url);

	}
	
	private function RetrieveWeather ($url)
	{
		echo $url . '</ br>';
		$currentTime = time();
		echo $currentTime ." time </ br>";
		echo $this->lastCacheTime . '</ br>';
		echo $this->cacheTimeLimit . '</ br>';
		if($currentTime > ($this->lastCacheTime + $this->cacheTimeLimit))
		{
			$this->dataSource = 'OpenWeatherMap';
			
		  // cURL calls
		  $curl = curl_init($url);
		  curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
		  $data = curl_exec($curl);
		  curl_close($curl);
		  
		  // Convert string data to json object
		  $json_obj = json_decode($data);
		  //var_dump($json_obj);
		  if(!isset($json_obj->main->temp)){
		    echo "Danger, Will Robinson!";
		    exit;
		  }
		  // Grap temp data
		  $this->currentTempF = $json_obj->main->temp;
		  

		  // Grap temp data & convert to f
		  //$current_temp_kelvin = $json_obj->main->temp;
		  //$this->currentTempF = ($current_temp_kelvin - 273.15) * 1.8 + 32;
		  
		 //echo "Current Temp: " . $currentTempF . "&deg; Fahrenheit from " . $dataSource;
 
		}
		else
		{
			$this->dataSource='local cache';
		}
		
		
		
	} //end RetrieveWeather
} //end class

?>