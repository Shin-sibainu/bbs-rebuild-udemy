<?php
//新規スレッド作成してホームにリダイレクトしたい
$error_message = array();

if (isset($_POST['threadSubmitButton'])) {
    //TODO:スレッドタイトル入力チェック
    if (empty($_POST["title"])) {
        $error_message[] = "スレッドのタイトルを入力してください。";
    } else {
        $clean['title'] = htmlspecialchars($_POST["title"], ENT_QUOTES, "UTF-8");
    }
    //TODO:表示名チェック
    if (empty($_POST["username"])) {
        $error_message[] = "お名前を入力してください。";
    } else {
        $clean["username"] = htmlspecialchars($_POST["username"], ENT_QUOTES, "UTF-8");
    }
    //TODO:コメント入力チェック
    if (empty($_POST["message"])) {
        $error_message[] = "コメントを入力してください。";
    } else {
        $clean['message'] = htmlspecialchars($_POST["message"], ENT_QUOTES, "UTF-8");
    }

    //エラーメッセージが何もないときだけスレッド書き込み可能
    if (empty($error_message)) {

        $post_date = date("Y-m-d H:i:s");
        //トランザクション開始
        $pdo->beginTransaction();
        //まずはスレッドから追加。
        try {
            $sql = "INSERT INTO thread (title) VALUES (:title)";
            $stmt = $pdo->prepare($sql);

            //値をセット
            $stmt->bindParam(":title", $_POST["title"], PDO::PARAM_STR);
            $stmt->execute();

            $pdo->commit();
        } catch (Exception $e) {
            //エラーが発生したときはロールバック(処理取り消し)
            $pdo->rollBack();
        }

        $pdo->beginTransaction();
        //次にコメントも追加
        try {
            $sql = "INSERT INTO comment (username, message, post_date, thread_id) VALUES (:username, :message, :post_date, (SELECT id FROM thread WHERE title = :title))";
            $stmt = $pdo->prepare($sql);

            //値をセット
            $stmt->bindParam(":username", $_POST["username"], PDO::PARAM_STR);
            $stmt->bindParam(":message", $_POST["message"], PDO::PARAM_STR);
            $stmt->bindParam(":post_date", $post_date, PDO::PARAM_STR);
            $stmt->bindParam(":title", $_POST["title"], PDO::PARAM_STR);

            $stmt->execute();

            $pdo->commit();
        } catch (Exception $e) {
            //エラーが発生したときはロールバック(処理取り消し)
            $pdo->rollBack();
        }
        $stmt = null;
        //ホームへリダイレクト
        header('Location: http://localhost:8080/bbs2');
    }
}
