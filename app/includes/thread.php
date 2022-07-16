<!-- スレッドを繰り返し表示したい -->
<?php
$thread_array = array();
?>
<div class="threadWrapper">
    <div class="childWrapper">
        <div class="threadTitle">
            <span>【タイトル】</span>
            <h1>２チャンネル作ってみたｗｗｗ</h1>
        </div>
        <!-- コメント表示エリア -->
        <?php include("commentSection.php"); ?>

        <!-- フォーム打ち込みエリア -->
        <?php include("commentForm.php"); ?>
    </div>
</div>