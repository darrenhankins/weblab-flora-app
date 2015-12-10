<?php

/**
 * User Object
 */
class User{
  
  private $_id;
  private $_name;
  private $_email;
  private $_pass;
  private $_role;

  public function getId(){return $this->_id;}
  public function setId($arg){$this->_id = $arg;}
  
  public function getName(){return $this->_name;}
  public function setName($arg){$this->_name = $arg;}

  public function getMail(){return $this->_email;}
  public function setMail($arg){$this->_email = $arg;}
  // public function setMail($arg){
  //   if (!filter_var($arg, FILTER_VALIDATE_EMAIL) === false) {
  //     // email is a valid email address
  //     $this->_mail = $arg;
  //     //return TRUE;
  //   } else {
  //     // email is not a valid email address
  //     $this->_mail = 'test';
  //     //return FALSE;
  //   }
  // }
  
  public function getPassword(){return $this->_pass;}
  public function setPassword($arg){$this->_pass = $arg;}
         
  public function getRole(){return $this->_role;}
  public function setRole($arg){$this->_role = $arg;}  
  
  // public function isAdmin(){
  //   if ($this->_role == 1) {
  //     return TRUE;
  //   }
  //   return FALSE;
  // }
    
  // public function isValidEmail(){
  //   // Validate email
  //   if (!filter_var($this->_mail, FILTER_VALIDATE_EMAIL) === false) {
  //     //echo("$email is a valid email address");
  //     return TRUE;
  //   } else {
  //     //echo("$email is not a valid email address");
  //     $this->_mail = '';
  //     return FALSE;
  //   }
  // }

  public function hydrate($arr) {
    $this->setId(isset($arr["id"])?$arr["id"]:'');
    $this->setName(isset($arr["name"])?$arr["name"]:'');
    $this->setPassword(isset($arr["pass"])?$arr["pass"]:'');
    $this->setMail(isset($arr["email"])?$arr["email"]:'');
    //$this->setCreated(isset($arr["created"])?$arr["created"]:'');
    $this->setRole(isset($arr["role"])?$arr["role"]:'');
  }
  
}

