<?php
include_once("./app/database/connect.php");
// include("path.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>２ちゃんねる掲示板</title>
    <link rel="stylesheet" href="./assets/css/style.css">
</head>

<body>
    <!-- ヘッダー -->
    <?php include("app/includes/header.php"); ?>
    <!-- コメント送信用ファイル -->
    <?php include("app/functions/comment_add.php"); ?>
    <!-- バリデーションチェック -->
    <?php include("app/includes/validations.php"); ?>
    <!-- スレッド表示 -->
    <?php include("app/includes/thread.php"); ?>
    <!-- 新規スレッド作成 -->
    <?php include("app/includes/newThread.php"); ?>

</body>

</html>