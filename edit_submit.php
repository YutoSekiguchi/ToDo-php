<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
    integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
  </link>
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
    integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
  </script>
  <script src="js/jquery.lettering.js">
  </script>
  <script src="js/jquery.textillate.js">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
    integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
  </script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
    integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
  </script>
  <link rel="stylesheet" href="style.css">
  <title>ToDoSubmit</title>
</head>

<body>
  <header>
    <h1 class="header">ToDoList</h1>
    <script src="js/app.js">
    </script>
  </header>

  <?php
  ini_set('display_errors',"On");
  error_reporting(E_ALL);
  function h($str) { return htmlspecialchars($str, ENT_QUOTES, "UTF-8"); }
  session_start();

  if (isset($_GET["date"]) && isset($_GET["content"]) && ($_GET["date"] != "") && ($_GET["content"] != "")) {
    $date = $_GET["date"];
    $dateArray = explode('-', $date);
    $dow = $dateArray[0];
    $month = $dateArray[1];
    $day = $dateArray[2];
    $content = $_GET["content"];
    $content2 = $_SESSION["content"];
    $month2 = $_SESSION["month"];
    $day2 = $_SESSION["day"];
    $dow2 = $_SESSION["dow"];
    
    
    
    $pdo = new PDO("sqlite:ToDoList.sqlite");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $st = $pdo->query('DELETE FROM ToDoList WHERE content = "'. $content2 .'" AND day='. $day2 .' AND month='. $month2 .';');
    $st = $pdo->prepare("INSERT INTO ToDoList(month, day, dow, content) VALUES(?, ?, ?, ?);");
    $st->execute(array($month, $day, $dow, $content));
    $data = $st->fetchAll();

      $result = "登録しました。";
  }
  else {
    $result = "todoがありません。";
  }
  ?>

  <div class="article">
    <h2> <?php print $result;?> </h2>
    <p>
      <a href="top.php"> ToDoリストに戻る </a>
    </p>
  </div>

</body>

</html>