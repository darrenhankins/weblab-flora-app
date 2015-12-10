<?php 

  require_once('../lib/db.interface.php');
  require_once('../lib/db.class.php');
  require_once('../models/user.class.php');
  require_once('../models/plant.class.php');
  require_once('../models/manager.abstract.php');
  require_once('../models/user_manager.class.php');
  // Uncomment the below line (and line in login.php) to enable db session store 
  //require_once('../lib/db_session_store.php'); 
  
  //var_dump($_SESSION['current_user']); 

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

  // get the $current_user from the $_SESSION
  if(isset($_SESSION['current_user'])){
    if ($action != 'user_save') {
      $current_user = $_SESSION['current_user'];
      $user = $_SESSION['current_user'];
      $target = $user;
    }
  } else {
     header('Location: index.php?action=login');
  }
    
  $target = isset($_GET["target"])?$_GET["target"]:'';
  //$target = $current_user->id;

  //var_dump($user->getId());

  switch ($action) {

     case 'user_save':      
      $userManager = new UserManager();
      $arr = array();
      $arr["name"] = isset($_POST["name"])?$_POST["name"]:'';
      $arr["email"] = isset($_POST["email"])?$_POST["email"]:'';
      $arr["pass"] = isset($_POST["pass"])?$_POST["pass"]:'';
      // $arr["role"] = isset($_POST["role"])?$_POST["role"]:'';
      $user = new User();
      $user->hydrate($arr);
      $userManager->save($user);
      $error = $userManager->save($user);
      //var_dump($user);
      // header('Location: index.php');
      include('../views/register_success.php');
      break;          

    case 'account':
      $userManager = new UserManager();
      $user = $userManager->getUser($target);
      include('../views/user_view.php');
      break;    
      
      // case 'user_edit':
      //   $userManager = new UserManager();
      //   $user = $userManager->getUser($target);
      //   $roles = $userManager->getAllRoles();
      //   include('../views/user_add_edit.php');
      //   break;

      // case 'delete_user':
      //   $userManager = new UserManager();
      //   $userManager->delete($target);
      //   header('Location: user.php');
      //   break;

    case 'export':
      $userManager = new UserManager();
      $plants = $userManager->exportFlora();
      include('../views/export.php');
      break;                
    
    case 'my_flora':
      $target = $_SESSION['current_user'];
      $userManager = new UserManager();
      $plants = $userManager->getAllUserPlants($target);
      include('../views/user_plants.php');
      break;  

    case 'all_flora':
      $userManager = new UserManager();
      $plants = $userManager->getAllPlants();
      include('../views/all_plants.php');
      break;

    case 'save_flora':
      $userManager = new UserManager(); 
      $arr = array();
      $arr["id"] = isset($_GET["id"])?$_GET["id"]:'';
      $arr["name"] = isset($_GET["name"])?$_GET["name"]:'';
      $arr["location"] = isset($_GET["location"])?$_GET["location"]:'';
      $arr["longitude"] = isset($_GET["longitude"])?$_GET["longitude"]:'';
      $arr["latitude"] = isset($_GET["latitude"])?$_GET["latitude"]:'';
      // $arr["weather_id"] = isset($_GET["weather_id"])?$_GET["weather_id"]:'';
      // $arr["soilid_id"] = isset($_GET["soilid_id"])?$_GET["soilid_id"]:'';
      $arr["weather"] = isset($_GET["weather"])?$_GET["weather"]:'';
      $arr["soil"] = isset($_GET["soil"])?$_GET["soil"]:'';
      $arr["temperature"] = isset($_GET["temperature"])?$_GET["temperature"]:'';
      $arr["wind"] = isset($_GET["wind"])?$_GET["wind"]:'';
      $arr["humidity"] = isset($_GET["humidity"])?$_GET["humidity"]:'';
      $arr["notes"] = isset($_GET["notes"])?$_GET["notes"]:'';
      $plant = new Plant();
      $plant->hydrate($arr);
      $userManager->savePlant($plant);
      // var_dump($plant);

      $target = $_SESSION['current_user'];
      $userManager = new UserManager();
      $plants = $userManager->getAllUserPlants($target);
      include('../views/user_plants.php');
      break;    


    case 'add_flora':
      //$userManager = new UserManager();
      //$plant = new Plant();
      include('../views/user_add_plant.php');
      break;

    case 'geo_finder':
      //$userManager = new UserManager();
      //$plant = new Plant();
      include('../views/geo_finder.php');
      break;

    default:
      $userManager = new UserManager();
      $user = $userManager->getUser($target);
      include('../views/user_view.php');
      break;   
  }
?>
 


