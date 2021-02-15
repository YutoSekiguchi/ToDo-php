<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
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

  if (isset($_GET["date"]) && isset($_GET["content"]) && ($_GET["date"] != "") && ($_GET["content"] != "")) {
    $date = $_GET["date"];
    $dateArray = explode('-', $date);
    $dow = $dateArray[0];
    $month = $dateArray[1];
    $day = $dateArray[2];
    $content = $_GET["content"];

    $pdo = new PDO("sqlite:ToDoList.sqlite");
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    $st = $pdo->prepare("INSERT INTO ToDoList(month, day, dow, content) VALUES(?, ?, ?, ?)");
    $st->execute(array($month, $day, $dow, $content));

      $result = "登録しました。";
  }
  else {
    $result = "todoがありません。";
  }
  ?>

  <div class="article">
    <h1> <?php print $result;?> </h1>
    <p>
      <a href="top.php"> ToDoリストに戻る </a>
    </p>
  </div>

</body>

</html>