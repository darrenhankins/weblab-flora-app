<?php 
if(isset($_SESSION['current_user'])){
    $user = $_SESSION['current_user'];
}
?>
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
          <?php
            if (!isset($_SESSION['current_user'])) {
                    $user = $_SESSION['current_user'];
                };
            ?>
          <div class="table-responsive">          
              <table class="table">
                <thead>
                  <tr>
                    <th>Name:</th>
                    <th>Email:</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td><?= $user->getName() ?></td>
                    <td><?= $user->getMail() ?></td>
                  </tr>
                </tbody>
              </table>
              </div>                                                                            
        </div>
    </body>
</html>

