<?php

//formで送信すると3回スレッドの数だけ回ってる。
$comment_array = array();

//DBからデータを取得
//多分これはカテゴリの主キーとブログの外部キーが一致するものだけを取り出してるような気がする。
// $statement = $db->prepare("SELECT id, (SELECT category FROM category_list WHERE category_id = id) AS category, title, text, date FROM blog ORDER BY date DESC");
// $sql = "SELECT id, (SELECT title FROM thread WHERE thread_id = id) FROM comment";

//コメントを全て取得。
$sql = "SELECT * FROM comment"; //これがフォームを送信したときに全部とれてきてない。送信した直後のやつが入ってない。
$statement = $pdo->prepare($sql);
$statement->execute();

$comment_array = $statement;
?>


<section>
    <!-- スレッド毎に表示するコメントを分類したい -->
    <?php if (!empty($comment_array)) : ?>
        <!-- TODO:ここがフォームで送信したときに１回回ってない可能性 -->
        <?php foreach ($comment_array as $comment) : ?>
            <!-- スレッドのidとthread_idが一致するときに表示する -->
            <?php if ($thread['id'] == $comment["thread_id"]) : ?>
                <article>
                    <div class="wrapper">
                        <div class="nameArea">
                            <span>名前：</span>
                            <p class="username"><?php echo $comment['username'] ?></p>
                            <time>：<?php echo date('Y/m/d H:i', strtotime($comment['post_date'])); ?></time>
                            <!-- <p>コメントのthread_id:<?php echo $comment["thread_id"]; ?></p> -->
                        </div>
                        <p class="comment"><?php echo $comment['message']; ?></p>
                    </div>
                </article>
            <?php endif; ?>
        <?php endforeach; ?>
    <?php endif; ?>
</section>