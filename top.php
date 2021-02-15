<?php
  session_start();
  function h($str) { return htmlspecialchars($str, ENT_QUOTES, "UTF-8"); }
  $pdo = new PDO("sqlite:ToDoList.sqlite");
  $pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
  $st = $pdo->query("SELECT * FROM ToDoList ORDER BY dow ASC, month ASC, day ASC");
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
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
  <link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
  <link rel="stylesheet" href="./style.css">
  <title>ToDoList</title>
</head>

<body>
  <header>
    <h1 class="header">ToDoList</h1>
    <script src="js/app.js">
    </script>
  </header>
  <p class="article_link">
    <a href="form.php" class="add_todo">＋ToDoの追加</a>
  </p>
  <?php

  foreach($data as $ToDoList){
  print '<div class="todo">';

    print '<div class="todo-head"><h2 class="time">' . h($ToDoList["dow"]) . '年'.h($ToDoList["month"]).'月'.h($ToDoList["day"]).'日</h2>';
    $_SESSION["content"] = $ToDoList["content"];
    $_SESSION["month"] = $ToDoList["month"];
    $_SESSION["day"] = $ToDoList["day"];
    $_SESSION["dow"] = $ToDoList["dow"];
    print '<a href="complete.php?content='. $_SESSION['content'] .'&month='. $_SESSION['month'] .'&day='. $_SESSION['day'] .'&dow='. $_SESSION['dow'] .'"><button class="btn btn-success">完了</button></a></div>';
    print '<p class="sentence">' . h($ToDoList["content"]) . '</p>';

    
    print '<div class="icon"><a href="edit.php?content='. $_SESSION['content'] .'&month='. $_SESSION['month'] .'&day='. $_SESSION['day'] .'&dow='. $_SESSION['dow'] .'">';
    ?>
  <i class="far fa-edit"></i>
  <?php
    print "</a>";
    print '<a href="delete.php?content='. $_SESSION['content'] .'&month='. $_SESSION['month'] .'&day='. $_SESSION['day'] .'&dow='. $_SESSION['dow'] .'">';
    ?>
  <i class="fas fa-trash-alt"></i>
  <?php
  print "</a></div>";
  print '</div>';
  }
  ?>

</body>

</html>