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
                    <table>
                      <?php foreach($users as $user){ ?>
                      <tr>
                        <td><?= $user->getId() ?></td>
                        <td><?= $user->getName() ?></td>
                        <td><?= $user->getPassword() ?></td>
                        <td><?= $user->getMail() ?></td>
                        <td><?= $user->getRole() ?></td>
                      </tr>
                      <?php } ?>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>












    
    
    
