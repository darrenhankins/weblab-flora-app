<!DOCTYPE html>
<html>
<head>
  <title>Flora Registry</title> 
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/base.css">
  <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">
  <h2 class="title">Flora Registry</h2>
  <div class="menubar"><?php include('common/menu.php') ?></div>
  <form role="form" name="login" action="user.php" method="post">
  <input type="hidden" name="action" value="user_save">
    <div class="form-group">
      <label for="name">Name:</label>
      <input name="name" type="text" class="form-control" id="name" value="" placeholder="Enter name" pattern=".{5,20}" title="5 to 20 characters" required>
    </div> 
    <div class="form-group">
      <label for="email">Email:</label>
      <input name="email" type="email" class="form-control" id="email" value="" placeholder="Enter email" pattern=".{5,20}" title="5 to 20 characters" required>
    </div>
    <div class="form-group">
      <label for="pass">Password:</label>
      <input name="pass" type="password" class="form-control" id="pass" value="" placeholder="Enter password" pattern=".{5,20}" title="5 to 20 characters" required>
    </div>
    <button type="submit" class="btn btn-default">Register</button>
  </form>
</div>

</body> 
</html>