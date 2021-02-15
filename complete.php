<?php
function h($str) { return htmlspecialchars($str, ENT_QUOTES, "UTF-8"); }
session_start();
$pdo = new PDO("sqlite:ToDoList.sqlite");
$pdo -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
$st = $pdo->query("SELECT * FROM ToDoList;");
$data = $st->fetchAll();
    $content = $_GET["content"];
    $month = $_GET["month"];
    $day = $_GET["day"];
    $dow = $_GET["dow"];
    
    
    $st = $pdo->query('DELETE FROM ToDoList WHERE content = "'. $content .'" AND day='. $day .' AND month='. $month .';');
    $data = $st->fetchAll();
    http_response_code( 301 ) ;

    // リダイレクト
    header( "Location: ./top.php" ) ;
    exit ;
  ?>