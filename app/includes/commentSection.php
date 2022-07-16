<?php

$comment_array = array();

//DBからデータを取得
// $statement = $db->prepare("SELECT id, (SELECT category FROM category_list WHERE category_id = id) AS category, title, text, date FROM blog ORDER BY date DESC");
// $sql = "SELECT id, (SELECT title FROM thread WHERE thread_id = id) FROM comment";
$sql = "SELECT * FROM comment";
$statement = $pdo->prepare($sql);
$statement->execute();

$comment_array = $statement;

// var_dump($comment_array);
?>


<section>
    <?php if (!empty($comment_array)) : ?>
        <?php foreach ($comment_array as $comment) : ?>
            <article>
                <div class="wrapper">
                    <div class="nameArea">
                        <span>名前：</span>
                        <p class="username"><?php echo $comment['username'] ?></p>
                        <time>：<?php echo date('Y/m/d H:i', strtotime($comment['post_date'])); ?></time>
                    </div>
                    <p class="comment"><?php echo $comment['message']; ?></p>
                </div>
            </article>
        <?php endforeach; ?>
    <?php endif; ?>
</section>