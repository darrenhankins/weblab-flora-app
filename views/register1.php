<!DOCTYPE html>
<html>
    <head>
        <title>Flora Registry</title>
        <link rel="stylesheet" type="text/css" href="css/base.css">
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">    
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Flora Registry</div>
                <div class="menubar"><?php include('common/menu.php') ?></div>
                <div>
                    <form action="user.php" method="post">
                      <input type="hidden" name="action" value="user_save"> 
                      <label>Name: </label><input type="text" name="name" value="" pattern=".{5,10}" title="5 to 10 characters" required><br><br>
                      <label>Email: </label><input type="text" name="email" value="" pattern=".{5,10}" title="5 to 10 characters" required><br><br>
                      <!--
                      <label>Role: </label>
                      <select name="role">
                        <option value='2' selected>User</option>";
                        <option value='1'>Admin</option>";
                      </select>
                      <br><br> 
                      -->
                      <label>Password: </label><input type="text" name="pass" value="" pattern=".{5,10}" title="5 to 10 characters" required><br><br>
                      <input type="submit" value="Save"  class='button'>
                    </form>
                </div>
            </div>
        </div>
    </body>
</html>











