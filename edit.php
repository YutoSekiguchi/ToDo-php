<?php
  function h($str) { return htmlspecialchars($str, ENT_QUOTES, "UTF-8"); }
  session_start();
  $pdo = new PDO("sqlite:ToDoList.sqlite");
  $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  $st = $pdo->query("SELECT * FROM ToDoList;");
  $data = $st->fetchAll();
  $content = $_GET["content"];
    $_SESSION["month"] = $_GET["month"];
    $_SESSION["day"] = $_GET["day"];
    $_SESSION["dow"] = $_GET["dow"];
    $_SESSION["content"] = $content;
  
?>
<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
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
  <title>form</title>
</head>

<body>
  <header>
    <h1 class="header">ToDoList</h1>
    <script src="js/app.js">
    </script>
  </header>
  <div class="container">
    <form action="edit_submit.php">
      <div class="form-group">
        <h2>予定を編集する</h2>
        <textarea class="form-control" name='content' id="exampleFormControlTextarea1" rows="3"><?php
        print $content;
        ?></textarea>
        <br>
        <input type="date" name="date"></input>
      </div>
      <input type="submit" value="完了">
    </form>
  </div>
</body>

</html>