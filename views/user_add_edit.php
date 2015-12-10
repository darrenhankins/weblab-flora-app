<div>user_add_edit.php</div>
<form action="user.php" method="get">
  <input type="hidden" name="uid" value="<?= $user->getUID() ?>">
  <input type="hidden" name="action" value="save_user">
  
  <label>Name: </label><input type="text" name="name" value="<?= $user->getName() ?>"><br>
  <label>Email: </label><input type="text" name="mail" value="<?= $user->getMail() ?>"><br>
  <label>Role: </label>
  <select name="role">
    <?php
      foreach($roles as $role){
        
        if($role['id'] == $user->getRole()) {
          echo "<option value='" . $role['id'] . "' selected>" .$role['role_name'] . "</option>";
        }else{
          echo "<option value='" . $role['id'] . "'>" .$role['role_name'] . "</option>";
        }
      }
    ?>
  </select>
  <br><br>
  <label>Password: </label><input type="text" name="pass" value=""><br>
  <input type="submit" value="Save"  class='button'>
</form>
