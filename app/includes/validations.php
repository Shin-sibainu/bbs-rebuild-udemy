 <!-- メッセージ送信成功時 -->
 <?php if (!empty($success_message)) : ?>
     <p class="success_message"><?php echo $success_message; ?></p>
 <?php endif; ?>

 <!-- バリデーションチェック時 -->
 <?php if (!empty($error_message)) : ?>
     <ul class="errorComment">
         <?php foreach ($error_message as $value) : ?>
             <li><?php echo $value; ?></li>
         <?php endforeach; ?>
     </ul>
 <?php endif; ?>