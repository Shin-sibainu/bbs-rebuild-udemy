<!-- これは送信しても表示位置固定用に書くPHP -->
<?php
$position = 0;

$msg = null;

if ((isset($_REQUEST["position"]) == true)) {
    $position = $_REQUEST["position"];
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
    $(document).ready(() => {
        window.onload = function() {
            // console.log(<?php echo $position; ?>)
            $(window).scrollTop(<?php echo $position; ?>);
        }

        $("input[type=submit]").click(() => {
            let position = $(window).scrollTop(); //現在のスクロール位置
            // console.log(position);
            $("input:hidden[name=position]").val(position);
        })
    });
</script>