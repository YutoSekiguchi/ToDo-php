<?php
function h($str) { return htmlspecialchars($str, ENT_QUOTES, "UTF-8"); }
session_start();
$pdo = new PDO("sqlite:ToDoList.sqlite");
$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$st = $pdo->query("SELECT * FROM ToDoList;");
$data = $st->fetchAll();
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="js/jquery.lettering.js">
  </script>
  <script src="js/jquery.textillate.js">
  </script>
  <link rel="stylesheet" href="style.css">
  <title>削除</title>
</head>

<body>
  <header>
    <h1 class="header">ToDoList</h1>
    <script src="js/app.js">
    </script>
  </header>
  <?php
    $content = $_GET["content"];
    $month = $_GET["month"];
    $day = $_GET["day"];
    $dow = $_GET["dow"];
    
    
    $st = $pdo->query('DELETE FROM ToDoList WHERE content = "'. $content .'" AND day='. $day .' AND month='. $month .';');
    $data = $st->fetchAll();
  ?>
  <h1>削除しました。
    <br>
    <a href="top.php">戻る</a>
  </h1>
</body>

</html>