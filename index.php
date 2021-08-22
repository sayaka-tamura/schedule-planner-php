<?php
  $ym_now = date("Ym");
  $y = substr($ym_now, 0, 4);
  $d = substr($ym_now, 4, 2);

  // 年のセレクトボックス
  echo "<select name='y'>";
  for ($i= $y-2; $i <= $y+2; $i++) { 
    echo "<option>$i</option>";
  }
  echo "</select> 年";

  // 月のセレクトボックス
  echo "<select name='m'>";
  for ($i= 1; $i <= 12; $i++) { 
    echo "<option>$i</option>";
  } 
  echo "</select> 月";
  echo "<input type='submit' value='Show' name='sub1'>";
  echo "</form>";
?>

<table border="1">
  <tr>
    <th>日</th>
    <th>月</th>
    <th>火</th>
    <th>水</th>
    <th>木</th>
    <th>金</th>
    <th>土</th>
  </tr>
  <tr>
    <?php
    
      $y = 2021;
      $m = 2;

      // 月初日（1日）の曜日を取得
      $wd1 = date("w", mktime(0, 0, 0, $m, 1, $y));

      // その数だけ空白を表示
      for($i = 1; $i <= $wd1; $i++){
        echo "<td>　</td>";
      }

      // 1日から月末日までの表示
      $d = 1;
      while(checkdate($m, $d, $y)){
        echo "<td>$d</td>";

        // 今日が土曜日の場合は…
        if (date("w", mktime(0, 0, 0, $m, $d, $y)) == 6) {
          // 週を終了
          echo "</tr>";

          // 次の週がある場合は新たな行を準備
          if (checkdate($m, $d + 1, $y)) {
            echo "<tr>";
          }
        }

        $d++;
      }

      // 最後の週の土曜日まで移動
      $wdx = date("w", mktime(0, 0, 0, $m+1, 0, $y));

      for($i = 1; $i < 7 - $wdx; $i++){
        echo "<td>　</td>";
      }

    ?>
  </tr>
</table>