<?php
  $ym_now = date("Ym");
  $y = substr($ym_now, 0, 4);
  $d = substr($ym_now, 4, 2);
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
      // var_dump($wd1);

      // その数だけ空白を表示
      for($i = 1; $i <= $wd1; $i++){
        echo "<td>  </td>";
      }

      // 1日から月末日までの表示
      $d = 1;
      while(checkdate($m, $d, $y)){
        echo "<td>$d</td>";
        $d++;
      }

      // 最後の週の土曜日まで移動
      $wdx = date("w", mktime(0, 0, 0, $m+1, 0, $y));
      var_dump($wdx);

      // for($i = 1; $i = 7 - $wdx; $i++){
      //   echo "<td>  </td>";
      // }

      // 今日が土曜日の場合は
      if(date("w", mktime(0, 0, 0, $m, $d, $y)) == 6){
        // 週を終了
        echo "</tr>";

        // さらに次の週がある場合は新たな行を準備
        if(checkdate($m, $d+1, $y)){
          echo "<tr>";
        }
      }

    ?>
  </tr>
</table>