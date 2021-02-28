<form class="comment" method="post">
  <div class="comment_name_div">
    <label for="comment_name">
      <input id="comment_name" type="text" name="comment_name" value="">
    </label>
  </div>
  <div class="comment_msg_div">
    <label for="msg">
      <textarea id="comment_msg" name="comment_msg" rows="8" cols="80"></textarea>
    </label>
  </div>
  <input type="submit" name="submit" value="送信">
</form>

<?php
  define('FILENAME', "{$path}comments.txt");

  date_default_timezone_set('Asia/Tokyo');

  var_dump($_POST);

  if (!empty($_POST['submit'])) {
    if ($file_handle = fopen(FILENAME, "a")) {
      $now_date = date("Y-m-d H:i:s");
      $data =
      "'".$_POST['comment_name'].
      "','".$_POST['comment_msg'].
      "','".$now_date."'\n";

      fwrite($file_handle, $data);

      fclose($file_handle);
    }
  }
?>
