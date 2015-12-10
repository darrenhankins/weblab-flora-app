<br>
<?php 
 	//$action = isset($_GET["action"])?$_GET["action"]:'';
	if (isset($_GET["action"])) {
	    $action = $_GET["action"];
	} else if (isset($_POST["action"])) {
	    $action = $_POST["action"];
	}



 	//print $action;
 	// var_dump($action);
  //   var_dump($user);
?>
<?php 
if(!$action || $action=='logout') { ?>
		<a href="index.php?action=register">Register</a> | <a href="index.php?action=login" >Login</a>
<?php 
} else if(!isset($_SESSION['current_user'])) { 
//} else if($action=='register'|| $action=='login' || $action=='user_save' || $action=='login_check') { 
?>
 	<div class="links">	 	
 		<?php if($action=='register' || $action=='user_save'){print "Register";} else { print "<a href='index.php?action=register' >Register</a>";}?> |
 		<?php if($action=='login' || $action=='login_check'){print "Login";} else { print "<a href='index.php?action=login' >Login</a>";}?> 
	</div>
<?php } else { ?>
	<div class="links">
		<?php if($action=='add_flora' || $action=='geo_finder'){print "Add";} else { print "<a href='user.php?action=geo_finder' >Add</a>";}?> | 
		<?php if($action=='my_flora' || $action=='save_flora'){print "My Flora";} else { print "<a href='user.php?action=my_flora' >My Flora</a>";}?> | 
		<?php if($action=='all_flora'){print "All Flora";} else { print "<a href='user.php?action=all_flora' >All Flora</a>";}?> |
		<?php if($action=='account'){print "Account";} else { print "<a href='user.php?action=account' >Account</a>";}?> |
		<?php $user = $_SESSION['current_user']; $role = $user->getRole(); if($role == 1){ print "<a href='user.php?action=export' >Export</a> | ";} ?> 
		<a href="index.php?action=logout" >Logout</a>
	</div>
<?php } ?>
<br>