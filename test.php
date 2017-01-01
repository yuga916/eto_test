<?php 
  $db = mysqli_connect('localhost', 'root', 'root', 'test') or die(mysqli_connect_error());
        mysqli_set_charset($db, 'utf8');

  $sql = 'SELECT * FROM `years`';
  $rec = mysqli_query($db, $sql) or die(mysqli_error($db));
  $years = array();

  while (1) {
    $record = mysqli_fetch_assoc($rec);
    if ($record == false) {
      break;
    }
    $years[] = $record;
  }

// ポスト送信がされていた時の処理
 if ($_POST['year']) {
    $id = $_POST['year'];
    $sql = 'SELECT `eto` FROM `years` WHERE `id`=' . $id;
    $rec = mysqli_query($db, $sql) or die(mysqli_error($db));
    $eto = mysqli_fetch_assoc($rec);
 }

 ?>


<!DOCTYPE html>
<html>
  <head>
    <title></title>
  </head>
    <body>
      <form method="post" action="">
        <select name="year">
           <option value="0">年を選択</option>
             <?php foreach ($years as $year) : ?>
                <option value="<?php echo $year['id']; ?>"><?php echo $year['year'] ?></option>
             <?php endforeach; ?>
        </select>
        <input type = "submit" value ="送信">
      </form>

  <!-- 年度が選択された時の表示 -->
      <?php if($_POST['year']) : ?>
        <?php echo $eto['eto']; ?>
      <?php else: ?>
   <!-- デフォルト表示 -->   
        <?php echo $year['eto']; ?>
      <?php endif; ?>

    </body>
</html>