 <?php
include 'count.php';

 function matrix($a,$b){
      for ($row=0; $row<counting($a) ; $row++) { 
          for ($col=0; $col <3; $col++) { 
              echo "". $a[$row][$col] ."&nbsp;";
          }
          echo "<br>";
      }

echo "<b>The second matrix is given below:-</b><br>";
for($i=0;$i<counting($b);$i=$i+1)
{
    for($j=0;$j<3;$j=$j+1)
    {
        echo $b[$i][$j]." ";
        
    }
    echo "<br>";
}
echo "<b>The addition matrix is given below:-</b>"."<br>";
for($i=0;$i<counting($a);$i=$i+1)
{
    for($j=0;$j<3;$j=$j+1)
    {
        $c[$i][$j]=$a[$i][$j]+$b[$i][$j]; 
        echo $c[$i][$j]." ";
    }
    echo "<br>";
}

  }

 $a= array(
    array(2,5,6,7,5,7),
    array(2,5,6,7,9,8)
 );
 $b = array(
    array(5,9,3,2,1,4),
    array(6,6,5,4,1,1)
 );

 matrix($a, $b);
//  echo $a[0][0]."".$a[0][1]."".$a[0][2]."".$a[0][1]."<br>";
//  echo $a[1][0]."".$a[1][1]."".$a[1][2]."".$a[0][1].".<br>";
 
?>
