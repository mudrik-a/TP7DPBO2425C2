<?php
function layout(string $title, string $content){
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($title) ?></title>
  <style>
    body{font-family:Arial,Helvetica,sans-serif;margin:16px}
    nav a{margin-right:12px}
    table{border-collapse:collapse;width:100%}
    th,td{border:1px solid #ccc;padding:8px}
    form{margin:8px 0}
    input,select,button{padding:6px}
  </style>
</head>
<body>
  <nav>
    <a href="index.php?module=team">Team</a>
    <a href="index.php?module=rider">Rider</a>
    <a href="index.php?module=bike">Bike</a>
  </nav>
  <hr>
  <?= $content ?>
</body>
</html>
<?php } ?>
