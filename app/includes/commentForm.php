<!-- これは送信しても表示位置固定用に書くPHP -->
<?php
$position = 0;

$msg = null;

if ((isset($_POST["position"]) == true)) {
    //現在の位置座標を取得
    $position = $_POST["position"];
}

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
    <!-- 位置取得用 -->
    <input type="hidden" name="position" value="0">
</form>

<!-- 送信しても同じ表示位置にいる仕組み -->
</style>
<script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
    console.log($(window).scrollTop())
    //HTML読み込みが終わったら
    $(document).ready(() => {
        $("input[type=submit]").click(() => {
            let position = $(window).scrollTop(); //現在のスクロール位置
            $("input:hidden[name=position]").val(position); //value属性に現在位置を挿入
        })
        $(window).scrollTop(<?php echo $position; ?>);
    });
</script>