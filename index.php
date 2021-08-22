<table border="1">
  <tr>
    <?php
      $y = 2021;
      $m = 2;
      $d = 1;

      while(checkdate($m, $d, $y)){
        echo "<td>$d</td>";
        d++;
      }
    ?>
  </tr>
</table>