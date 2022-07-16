<!-- スレッドを繰り返し表示したい -->
<?php
$thread_array = array();

//スレッドを出力したい
$sql = "SELECT * FROM thread";
$statement = $pdo->prepare($sql);
$statement->execute();

// print("b");

$thread_array = $statement;
// var_dump($thread_array)
?>

<?php foreach ($thread_array as $thread) : ?>
    <div class="threadWrapper">
        <div class="childWrapper">
            <div class="threadTitle">
                <span>【タイトル】</span>
                <!-- <h1>２チャンネル作ってみたｗｗｗ</h1> -->
                <h1><?php echo $thread["title"] ?></h1>
            </div>
            <!-- コメント表示エリア -->
            <?php include("commentSection.php"); ?>

            <!-- フォーム打ち込みエリア -->
            <?php include("commentForm.php"); ?>
        </div>
    </div>
<?php endforeach; ?>