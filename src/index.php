
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  <?php

require_once "Controller\BattleManagement.php";

//A new fight will start every time browser is refresh
StartFight();

?>

<form method="post">
    <input type="submit" name="start-fight" value="Start new fight">
</form>

  </body>
</html>
