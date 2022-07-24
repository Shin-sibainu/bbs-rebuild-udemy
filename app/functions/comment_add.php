<?php

$error_message = array();

session_start();

if (isset($_POST['submitButton'])) {
    //TODO:表示名チェック
    if (empty($_POST["username"])) {
        $error_message[] = "お名前を入力してください。";
    } else {
        $clean["username"] = htmlspecialchars($_POST["username"], ENT_QUOTES, "UTF-8");
        $_SESSION["username"] = $clean["username"];
    }
    //TODO:コメント入力チェック
    if (empty($_POST["message"])) {
        $error_message[] = "コメントを入力してください。";
    } else {
        $clean['message'] = htmlspecialchars($_POST["message"], ENT_QUOTES, "UTF-8");
    }

    //エラーメッセージが何もないときだけコメント書き込み可能
    if (empty($error_message)) {



        $post_date = date("Y-m-d H:i:s");
        //トランザクション開始
        $pdo->beginTransaction();
        try {
            //今書き込んでいるスレッドのIDをコメントのthread_idに挿入するSQL文を各
            $sql = "INSERT INTO comment (username, message, post_date, thread_id) VALUES (:username, :message, :post_date, :thread_id)";
            $stmt = $pdo->prepare($sql);

            //値をセット
            $stmt->bindParam(":username", $clean["username"], PDO::PARAM_STR);
            $stmt->bindParam(":message", $clean["message"], PDO::PARAM_STR);
            $stmt->bindParam(":post_date", $post_date, PDO::PARAM_STR);
            $stmt->bindParam(":thread_id", $_POST["threadID"], PDO::PARAM_STR);

            $stmt->execute();

            $pdo->commit();
        } catch (Exception $e) {
            //エラーが発生したときはロールバック(処理取り消し)
            $pdo->rollBack();
        }
        $stmt = null;
        // header('Location: ./');
        // exit;
    }
}
// var_dump($_POST["thread_id"]);
