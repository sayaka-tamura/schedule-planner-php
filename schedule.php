<?php
// 年月日を取得する
if (isset($_GET["ymd"])) {
  // スケジュールの年月日を取得する
  $ymd = basename($_GET["ymd"]);
  $y = intval(substr($ymd, 0, 4));
  $m = intval(substr($ymd, 4, 2));
  $d = intval(substr($ymd, 6, 2));
  $disp_ymd = "{$y} 年 {$m} 月 {$d} 日のスケジュール";

  // スケジュールデータを取得する
  $filename = "data/{$ymd}.txt";
  if (file_exists($filename)){
    var_dump($filename);
    $schedule = file_get_contents($filename);
  } else {
    $schedule = "";
  }
} else {
  // カレンダー画面に強制移動する
  header("Location: index.php");
}

// スケジュールを更新する
if(isset($_POST["action"]) and $_POST("action")=="Update"){
  // 更新メッセージのサニタイズ処理
  $schedule = htmlspecialchars($_POST["schedule"], ENT_QUOTES, "UTF-8");

  // スケジュールが入力されたか調べて処理を分岐
  if(!empty($schedule)){
    // 入力された内容でスケジュールを更新
    file_put_contents($filename, $schedule);
  } else {
    // スケジュールが空の場合はファイルを削除
    if(file_exists($filename)){
      unlink($filename);
    }
  }
  // カレンダー画面に移動する
  header("Location: index.php");
}
?>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Schedule Planner</title>
  </head>
  <body>
    <h1>Schedule Planner (2. Register Schedule)</h1>
    <form action="" method="post">
      <!-- 日付のタイトル -->
      <tr>
        <td><?php echo $disp_ymd; ?></td>
      </tr>
      <!-- テキストエリア -->
      <tr>
        <td>
          <textarea name="schedule" cols="50" rows="10" style="display: block;"><?php $schedule; ?>/textarea>
        </td>
      </tr>
      <!-- ボタンエリア -->
      <tr>
        <td>
          <input type="submit" value="Update" name="action">
          <!-- 戻るボタン -->
          <input type="button" value="Go Back" name="back" onClick="history.back()">
        </td>
      </tr>
    </form>
  </body>
</html>