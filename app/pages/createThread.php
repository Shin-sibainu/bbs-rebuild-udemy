<?php
include_once("../database/connect.php");

/* 新規スレッド作成用ファイル */
include("../../app/functions/thread_add.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>２ちゃんねる掲示板</title>
    <link rel="stylesheet" href="../../assets/css/style.css">
</head>

<body>
    <!-- ヘッダー -->
    <?php include("../../app/includes/header.php"); ?>

    <!-- バリデーションチェック -->
    <?php include("../includes/validations.php"); ?>

    <div style="padding-left: 36px; color: blue;">
        <h2 style="margin-top: 20px; margin-bottom: 0;">新規スレッド立ち上げ場</h2>
    </div>
    <!-- 新規スレッド作成 -->
    <form method="POST" class="formWrapper">
        <div>
            <label for="usernameLabel">スレッド名：</label>
            <input type="text" name="title">
            <label>名前：</label>
            <input type="text" name="username">
        </div>
        <div>
            <textarea name="message" class="commentTextArea"></textarea>
        </div>
        <input type="submit" value="立ち上げ" name="threadSubmitButton">
    </form>
</body>

</html>