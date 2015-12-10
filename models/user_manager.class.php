<?php 

class UserManager extends Manager{

  public function authenticate($email, $pass){
        
      $db = new Db();
    
      $email = $db -> quote($email);

      $results = $db -> select("SELECT * from users where email = $email limit 1");
      //var_dump($results);
      if(!$results){
        return FALSE;
      }
      
      foreach($results as $result){
        $user = new User();
        $user->hydrate($result);
      }
      //var_dump($user->getPassword());
      
      if(password_verify($pass, $user->getPassword())){
        return $user;
      } else {
        return FALSE;
      }     
      
      
     //return $user;
    
  }
  
  public function getAllRoles(){
    
      $db = new Db();
      $roles = array();
          
      $roles = $db -> select("SELECT * from roles order by sort_order asc");
            
      return $roles;    
      
  }
    	
  public function getUser($arg){
    
    if(!is_numeric($arg)) return FALSE;
    
      $db = new Db();
    
      $uid = $db -> quote($arg);
      $results = $db -> select("SELECT * from users where uid = $uid limit 1");
      
      foreach($results as $result){
        $user = new User();
        $user->hydrate($result);
      }
      
      return $user;
    
  }
  public function getAllUsers(){
    
      $db = new Db();
      $users = array();
          
      $results = $db -> select("SELECT * from users");
      
    foreach($results as $result){
        $user = new User();
        $user->hydrate($result);
        $users[] = $user;
      }
            
      return $users;    
      
  }

  public function getAllPlants(){
    
      $db = new Db();
      $plants = array();
          
      $results = $db -> select("SELECT * from plants");
      
    foreach($results as $result){
        $plant = new Plant();
        $plant->hydrate($result);
        $plants[] = $plant;
      }
            
      return $plants;    
      
  }


  public function exportUsers(){
    
    $db = new Db();
    $users = array();
        
    $results = $db -> select("SELECT * from users");
      
    foreach($results as $result){
        $user = new User();
        $user->hydrate($result);
        $users[] = $user;
      }
            
      return $users;    
      
  }

  public function exportFlora(){
    
    $db = new Db();
    $plants = array();
        
    $results = $db -> select("SELECT * from plants");
      
    foreach($results as $result){
        $plant = new Plant();
        $plant->hydrate($result);
        $plants[] = $plant;
      }
            
      return $plants;    
      
  }

  public function getAllUserPlants($user){
     
      $db = new Db();
      $plants = array();
      $id = $user->getId();
    
      $results = $db -> select("SELECT * from plants WHERE user_id = $id");
      
    foreach($results as $result){
        $plant = new Plant();
        $plant->hydrate($result);
        $plants[] = $plant;
      }
            
      return $plants;  
      
  }

  

  public function save($user){

  if ($user->getId()) {
      $this->_update($user);
    } else {
      $this->_add($user);
    }
    //$db = new Db();
    //$email = $user->getMail();
    //$checkForUser = $db -> select("SELECT email from users WHERE email = '$email'");
    // if ($user->getMail()) {
    // //if ($checkForUser) {
    //    $this->_update($user);
    //   //$error = "true";
    // } else {
    //   //$error = "false";
    //   //$this->_add($user);
    // }
      //return $error;
  }

  public function savePlant($plant){

  // if ($plant->getId()) {
  //     //$this->_update($plant);
  //     $this->_addPlant($plant);
  //   } else {
      $this->_addPlant($plant);
    // }
  }

  public function update($user){
    
    //if ($user->getId()) {
    if ($user->getMail()) {
      $this->_update($user);
    } else {
      $this->_add($user);
    }
  }
  
  private function _add($user){
    $db = new Db();
    
    $name = $db -> quote($user->getName());
    $email = $db -> quote($user->getMail());
    $pass = password_hash($user->getPassword(), PASSWORD_BCRYPT, array("cost" => 10));
    $pass = $db -> quote($pass);
    //$pass = $db -> quote($user->getPassword());
    $role = $db -> quote($user->getRole());
    //$created = time();
    

     //$results = $db -> query("SELECT id from users WHERE id = '$user'");
    //$checkForUser = $db -> select("SELECT email from users WHERE email = '$email'");

    //if (!$checkForUser) {
      $results = $db -> query("insert into users (name, email, pass, role) values ($name, $email, $pass, $role);");
           // $results = $db -> query("insert into plants (created, name, location, temperature, notes) values ('1445999894', 'andy Lion', 'reeley', '80', 'bright yellow color');");

    //} // else {
    //   //die('User Already Exists');
    //   $error = 'User Already Exists';
    //   return $error;
    // }
  }
  
  private function _addPlant($plant){
    $db = new Db();
    
    $created = time(); // unix time
    $name = $db -> quote($plant->getName());
    $location = $db -> quote($plant->getLocation());
    $longitude = $db -> quote($plant->getLongitude());
    $latitude = $db -> quote($plant->getLatitude());
    $user_id = $db -> quote($plant->getId());
    //$weather_id = $db -> quote($plant->getWeatherId());
    //$soil_id =  $db -> quote($plant->getSoilId());   
    $weather = $db -> quote($plant->getWeather());
    $soil = $db -> quote($plant->getSoil());    
    $temperature = $db -> quote($plant->getTemperature());
    $wind = $db -> quote($plant->getWind());
    $humidity = $db -> quote($plant->getHumidity());
    $notes = $db -> quote($plant->getNotes());
    //$results = $db -> query("SELECT id from users WHERE id = '$user'");
    //$checkForUser = $db -> select("SELECT email from users WHERE email = '$email'");

    //if (!$checkForUser) {
       //$results = $db -> query("INSERT into plants (created, name, location, user_id, weather_id, soil_id, temperature, notes) VALUES ($created, $name, $location, $user_id, $weather_id, $soil_id, $temperature, $notes);");
       // $results = $db -> query("insert into plants (created, name, location, temperature, notes) values ('1445999894', 'andy Lion', 'reeley', '88', 'bright yellow color');");
      $results = $db -> query("INSERT into plants (created, name, location, longitude, latitude, user_id, weather, soil, temperature, wind, humidity, notes) VALUES ($created, $name, $location, $longitude, $latitude, $user_id, $weather, $soil, $temperature, $wind, $humidity, $notes);");
     // $results = $db -> query("INSERT into plants (created, name, location, user_id, weather_id, soil_id, temperature, notes) VALUES ('1445990000', 'Dandy', 'Ft Collins', $user_id, '1', '1', '100', 'yellow color');");
  //  print  "User ID = ".$user_id."---";
    //} // else {
    //   //die('User Already Exists');
    //   $error = 'User Already Exists';
       return $results;
    // }
  }


  private function _update($user){
    $db = new Db();
    
    $uid = $db -> quote($user->getId());
    $name = $db -> quote($user->getName());
    $mail = $db -> quote($user->getMail());
    $role = $db -> quote($user->getRole());
    
    if($user->getPassword()){
      $pass = password_hash($user->getPassword(), PASSWORD_BCRYPT, array("cost" => 10));
      $pass = $db -> quote($pass);
      //$pass = $db -> quote($user->getPassword());
    } else {
      $pass = '';
    }

    if(!empty($pass)){
      $results = $db -> query("update users set name=$name, pass=$pass, mail=$mail, role=$role where uid = $uid;");  
    } else {
      $results = $db -> query("update users set name=$name, mail=$mail, role=$role where uid = $uid;");
    }

  }
  
  public function delete($arg){
    
    if(!is_numeric($arg)) return FALSE;
    
      $db = new Db();
    
      $uid = $db -> quote($arg);
      $results = $db -> query("DELETE from users where uid = $uid");
  }
  
}

