<?php
  define('FILENAME', "{$path}comments.txt");
  date_default_timezone_set('Asia/Tokyo');

  //initialize variables
  $file_handle = null;
  $date = null;
  $data = null;
  $split_data = null;
  $msg = array();
  $msg_array = array();
  $success_msg = null;
  $error_msg = array();
  $clean = array();
?>

<!-- comment input form -->

<?php
if (!empty($_POST['submit'])) {
  if (empty($_POST['comment_name'])) {
    $error_msg[] = "名前を入力してください.";
  }
  else {
    $clean['comment_name'] = htmlspecialchars($_POST['comment_name'], ENT_QUOTES);
    $clean['comment_name'] = preg_replace('/\\r\\n|\\n|\\r/', '', $clean['comment_name']);
  }

  if (empty($_POST['comment_msg'])) {
    $error_msg[] = "コメントが空です.";
  }
  else {
    $clean['comment_msg'] = htmlspecialchars($_POST['comment_msg'], ENT_QUOTES);
    $clean['comment_msg'] = preg_replace('/\\r\\n|\\n|\\r/', '<br>', $clean['comment_msg']);
  }

  if (empty($error_msg) && $file_handle = fopen(FILENAME, "a")) {
    $date = date("Y-m-d H:i:s");
    $data =
    "'".$clean['comment_name'].
    "','".$clean['comment_msg'].
    "','".$date.
    "'\n";

    fwrite($file_handle, $data);

    fclose($file_handle);

    $success_msg = "送信完了.";
  }
}
?>

<aside class="inputform clear">
  <?php if (!empty($success_msg)) :?>
    <p class="success_msg"> <?php echo $success_msg; ?> </p>
  <?php endif; ?>
  <?php if (!empty($error_msg)) :?>
    <ul>
      <?php foreach ($error_msg as $value) :?>
        <li class="error_msg"> <?php echo $value; ?> </li>
      <?php endforeach; ?>
    </ul>
  <?php endif; ?>
  <span style="
  background-color: white;
  font-size: 150%;
  border-radius: 50%;
  padding: 0.2rem;
  line-height: 150%;
  ">コメント</span>
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
</aside>

<!-- comment section -->
<?php
if ($file_handle = fopen(FILENAME, "r")) {
  while ($data = fgets($file_handle)) {
    $split_data = preg_split('/\'/', $data);
    /*$split_data = array(7) {
    [0]=> string(0) ""
    [1]=> string(6) comment_name
    [2]=> string(1) ","
    [3]=> string(4) comment_msg
    [4]=> string(1) ","
    [5]=> string(19) $now
    [6]=> string(1) " " }
    */
    $msg = array(
      'comment_name' => $split_data[1],
      'msg' => $split_data[3],
      'date' => $split_data[5]
    );
    array_unshift($msg_array, $msg); //配列の先頭から追加 <=> push
  }


  fclose($file_handle);
}
?>

<aside id="comment_section">
  <?php
  if (!empty($msg_array)):
    foreach ($msg_array as $value):
  ?>
  <article class="comment_per">
    <div class="info">
      <span class="writer_name"> <?php echo $value['comment_name']; ?> </span>
      <time> <?php echo date('Y年m月d日 H:i', strtotime($value['date'])); ?> </time>
    </div>
    <p>
      <?php echo $value['msg']; ?>
    </p>
  </article>
  <?php
    endforeach;
  endif;
  ?>
</aside>
