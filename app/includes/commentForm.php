<?php

$error_message = array();

if (isset($_POST['submitButton'])) {
    //TODO:表示名チェック
    //TODO:コメント入力チェック

    //エラーメッセージが何もないときだけコメント書き込み可能
    if (empty($error_message)) {

        //同じスレッド内でのコメント書き込みのときだけクエリを叩く。
        if ($thread["id"] == $_POST["threadID"]) {

            $post_date = date("Y-m-d H:i:s");
            //トランザクション開始
            $pdo->beginTransaction();
            try {
                //今書き込んでいるスレッドのIDをコメントのthread_idに挿入するSQL文を各
                $sql = "INSERT INTO comment (username, message, post_date, thread_id) VALUES (:username, :message, :post_date, :thread_id)";
                $stmt = $pdo->prepare($sql);

                //値をセット
                $stmt->bindParam(":username", $_POST["username"], PDO::PARAM_STR);
                $stmt->bindParam(":message", $_POST["message"], PDO::PARAM_STR);
                $stmt->bindParam(":post_date", $post_date, PDO::PARAM_STR);
                $stmt->bindParam(":thread_id", $_POST["threadID"], PDO::PARAM_STR);

                $stmt->execute();

                $pdo->commit();
            } catch (Exception $e) {
                //エラーが発生したときはロールバック(処理取り消し)
                $pdo->rollBack();
            }
        }
        $stmt = null;
    }
}



// var_dump($_POST["thread_id"]);
?>

<!-- 各スレッドIDをコメントのthread_idに挿入したい。 -->
<form method="POST" class="formWrapper">
    <div>
        <input type="submit" value="書き込む" name="submitButton">
        <label for="usernameLabel">名前：</label>
        <input type="text" name="username">
        <input type="hidden" name="threadID" value="<?php echo $thread["id"]; ?>">
    </div>
    <div>
        <textarea name="message" class="commentTextArea"></textarea>
    </div>
</form>