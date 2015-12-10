<?php

/**
 * Plant Object
 */
class Plant{
  
  private $_id;
  private $_name;
  private $_created;
  private $_location;
  private $_longitude;
  private $_latitude;
  private $_userid;
  private $_weather;
  private $_soil;
  private $_weatherid;
  private $_soilid;
  private $_temperature;
  private $_wind;
  private $_humidity;
  private $_notes;


  public function getId(){return $this->_id;}
  public function setId($arg){$this->_id = $arg;}

  public function getCreated(){return $this->_created;}
  public function setCreated($arg){$this->_created = $arg;}
  
  public function getName(){return $this->_name;}
  public function setName($arg){$this->_name = $arg;}
  
  public function getLocation(){return $this->_location;}
  public function setLocation($arg){$this->_location = $arg;}

  public function getLongitude(){return $this->_longitude;}
  public function setLongitude($arg){$this->_longitude = $arg;}

  public function getLatitude(){return $this->_latitude;}
  public function setLatitude($arg){$this->_latitude = $arg;}        
  
  public function getUserId(){return $this->_userid;}
  public function setUserId($arg){$this->_userid = $arg;}  

  public function getWeatherId(){return $this->_weatherid;}
  public function setWeatherId($arg){$this->_weatherid = $arg;} 

  public function getWeather(){return $this->_weather;}
  public function setWeather($arg){$this->_weather = $arg;} 

  public function getSoilId(){return $this->_soilid;}
  public function setSoilId($arg){$this->_soilid = $arg;}

  public function getSoil(){return $this->_soil;}
  public function setSoil($arg){$this->_soil = $arg;}

  public function getTemperature(){return $this->_temperature;}
  public function setTemperature($arg){$this->_temperature = $arg;}

  public function getWind(){return $this->_wind;}
  public function setWind($arg){$this->_wind = $arg;}

  public function getHumidity(){return $this->_humidity;}
  public function setHumidity($arg){$this->_humidity = $arg;}

  public function getNotes(){return $this->_notes;}
  public function setNotes($arg){$this->_notes = $arg;}

    


  public function hydrate($arr) {
    $this->setId(isset($arr["id"])?$arr["id"]:'');
    $this->setCreated(isset($arr["created"])?$arr["created"]:'');
    $this->setName(isset($arr["name"])?$arr["name"]:'');
    $this->setLocation(isset($arr["location"])?$arr["location"]:'');
    $this->setLongitude(isset($arr["longitude"])?$arr["longitude"]:'');
    $this->setLatitude(isset($arr["latitude"])?$arr["latitude"]:'');
    $this->setUserId(isset($arr["user_id"])?$arr["user_id"]:'');
    $this->setWeatherId(isset($arr["weather_id"])?$arr["weather_id"]:'');
    $this->setWeather(isset($arr["weather"])?$arr["weather"]:'');
    $this->setSoilId(isset($arr["soil_id"])?$arr["soil_id"]:'');
    $this->setSoil(isset($arr["soil"])?$arr["soil"]:'');
    $this->setTemperature(isset($arr["temperature"])?$arr["temperature"]:'');
    $this->setWind(isset($arr["wind"])?$arr["wind"]:'');
    $this->setHumidity(isset($arr["humidity"])?$arr["humidity"]:'');
    $this->setNotes(isset($arr["notes"])?$arr["notes"]:'');
  }
  
}

