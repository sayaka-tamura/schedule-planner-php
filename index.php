<table border="1">
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
      
      // 今日が土曜日の場合は
      if(date("w", mktime(0, 0, 0, $m, $d, $y)) == 6){
        // 週を終了
        echo "</tr>";

        // さらに次の週がある場合は新たな行を準備
        if(checkdate($m, $d+1, $y)){
          echo "<tr>";
        }
      }

      // 最後の週の土曜日まで移動
      $wdx = date("w", mktime(0, 0, 0, $m+1, 0, $y));
      for($i = 1; $i = 7 - $wdx; $i++){
        echo "<td>  </td>";
      }
    ?>
  </tr>
</table>