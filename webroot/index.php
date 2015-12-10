<?php

  require_once('../lib/db.interface.php');
  require_once('../lib/db.class.php');
  require_once('../models/user.class.php');
  require_once('../models/plant.class.php');
  require_once('../models/manager.abstract.php');
  require_once('../models/user_manager.class.php'); 
  // Uncomment the below line (and line in user.php) to enable db session store 
  //require_once('../lib/db_session_store.php'); 

  //var_dump($_SESSION['current_user']); 
  if(!isset($_SESSION['current_user'])){
     //header('Location: index.php?action=login');
  }

  // start session if it doesn't exist
  if(!isset($_SESSION)) { 
      session_start(); 
  }

  // retrieve the $action from $_GET or $_POST
  if (isset($_GET["action"])) {
      $action = $_GET["action"];
  } else if (isset($_POST["action"])) {
      $action = $_POST["action"];
  } else if (!isset($_GET["action"]) || !isset($_POST["action"])) {
    $action = '';
  }

  // retrieve the $email, $pass, $name from the $_POST
  $email = isset($_POST["email"])?$_POST["email"]:'';
  $pass = isset($_POST["pass"])?$_POST["pass"]:'';
  $name = isset($_POST["name"])?$_POST["name"]:'';
  $error_msg = array();
      
  switch ($action) {

    case 'logout':
      //session_start(); 
      session_destroy();
      //include('../views/logout.php');
      header('Location: index.php?action=login');
      break;        
    
    case 'login':
      //$error = '';
      include('../views/login.php');
      break;
      
    case 'login_check':

      $userManager = new UserManager();
      $user = $userManager->authenticate($email, $pass);

      // if($action == 'login' && strlen($username) < 3){
      //   $error_msg[] = "Username too short";
      //   include('../views/login.php');
      //   break;
      // }
      
      if($user){
        // store $user object in $_SESSION
        $_SESSION['current_user'] = $user;
        // var_dump($_SESSION['current_user']);
        include('../views/login_success.php');
      } else {
        //var_dump($action);
        //var_dump($user);
        //$error_msg[] = 'Username or Password incorrect.';
        //$error = 'Username or Password incorrect.';
        //header('Location: index.php?action=login');
        include('../views/login.php');
      }
      break;   

    case 'register':
      $userManager = new UserManager();
      $roles = $userManager->getAllRoles();
      $user = new User();
      include('../views/register.php');
      break;

    default:
      header('Location: index.php?action=login');
      //include('../views/register.php');
      break;
  }

?>



