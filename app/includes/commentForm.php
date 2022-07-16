<form method="POST" action="" class="formWrapper">
    <div>
        <input type="submit" value="書き込む" name="submitButton">
        <label for="usernameLabel">名前：</label>
        <input type="text" name="username" value="<?php if (!empty($_SESSION['username'])) {
                                                        echo htmlspecialchars($_SESSION['username'], ENT_QUOTES, 'UTF-8');
                                                    }    ?>">
    </div>
    <div>
        <textarea name="comment" class="commentTextArea"></textarea>
    </div>
</form>