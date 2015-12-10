<!DOCTYPE html>
<html>
    <head>
        <head>
        <title>Flora Registry</title>
        <link rel="stylesheet" type="text/css" href="css/base.css">
        <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">    
    </head>
    </head>
    <body>
        <div class="container">
            <div class="content">
                <div class="title">Flora Registry</div>
                <div class="menubar"><?php include('common/menu.php') ?></div>
                <br>
                <div><?php print $error; ?></div>

                	<form name="login" action="index.php" method="post">
                      
					    <input type="hidden" name="action" value="login_check" required>

					    <label for="email">Email</label>
					    <input type="text" name="email" placeholder="email" value="" pattern=".{5,10}" title="5 to 10 characters" required>

					    <label for="pass">Password</label>
					    <input type="password" name="pass" placeholder="pass" value="" pattern=".{5,10}" title="5 to 10 characters" required>

					    <input type="submit" value="Login" class="button">

					</form>
                </div>
            </div>
        </div>
    </body>
</html>


