<table border="1">
  <tr>
    <?php
      $y = 2021;
      $m = 2;
      $d = 1;

      while(checkdate($m, $d, $y)){
        echo "<td>$d</td>";
        $d++;
      }
      
      // 今日が土曜日の場合は
      if(date("w", mktime(0, 0, 0, $m, $d, $y))==6){
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