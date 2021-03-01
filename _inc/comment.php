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
?>

<!-- comment input form -->
<aside class="inputform clear">
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

<?php
if (!empty($_POST['submit']) && !empty($_POST['comment_name']) && !empty($_POST['comment_msg'])) {
  if ($file_handle = fopen(FILENAME, "a")) {
    $date = date("Y-m-d H:i:s");
    $data =
    "'".$_POST['comment_name'].
    "','".$_POST['comment_msg'].
    "','".$date."'\n";

    fwrite($file_handle, $data);

    fclose($file_handle);
  }
}
?>

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
