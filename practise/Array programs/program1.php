<?php
include 'count.php';
$numbers = array(5,6,1,7,2);
// $numbers = array(0,11,12,2,3,5,4,7,9,8,10,13);
// $i = 2;
function ascending($numbers){
for($i=1;$i< counting($numbers);$i++)
{
    //var_dump($i);
   for($j=$i;$j>0;$j--)
   {    //var_dump($j);
       if($numbers[$j] < $numbers[$j-1]) 
       { 
           $tmp = $numbers[$j];
           $numbers[$j] = $numbers[$j-1];
           $numbers[$j-1] = $tmp ;      
       }
   }
}
echo "Ascending Sort </br>";
$acount = counting($numbers);
 for ($c=0; $c< $acount ; $c++) { 

    echo "" . $numbers[$c]."&nbsp; ";
}
}


function descending($numbers){
    for($i=1;$i< counting($numbers);$i++)
     
for ($s = 0; $s < counting($numbers) - 1; $s++) 
{         // traverse i+1 to array length 
          for ($j = $s + 1; $j < count($numbers); $j++) 
 {
              if ($numbers[$s] < $numbers[$j]) { 

                  $a = $numbers[$s]; 
                  $numbers[$s] = $numbers[$j]; 
                  $numbers[$j] = $a; 
              } 
          }
      }

echo " </br> Decending Sort </br>" ;
for ($d=0; $d< counting($numbers) ; $d++) { 

  echo "" . $numbers[$d]."&nbsp; ";
}
    }



    
$alpha = array('a','b','x','d','z');
function myarra($alpha){
for($z=1;$z< counting($alpha);$z++)
{
   for($y=$z;$y>0;$y--)
   {    
       if($alpha[$y] < $alpha[$y-1]) 
       { 
           $tmp = $alpha[$y];
           $alpha[$y] = $alpha[$y-1];
           $alpha[$y-1] = $tmp ;
       }
   }
}
for ($g=0; $g <counting($alpha); $g++) { 
   
}

echo " </br> Alphabet Ascending Sort </br>" ;
for ($as=0; $as< counting($alpha) ; $as++) { 

    echo "" . $alpha[$as]."&nbsp; ";
}
}
function myarrd($alpha){
for ($s = 0; $s < counting($alpha) - 1; $s++) 
  {         // traverse i+1 to array length 
            for ($j = $s + 1; $j < count($alpha); $j++) 
   {
                if ($alpha[$s] < $alpha[$j]) { 
  
                    $a = $alpha[$s]; 
                    $alpha[$s] = $alpha[$j]; 
                    $alpha[$j] = $a; 
                } 
            }
        }
echo " </br> Alphabet Decending Sort </br>" ;
for ($ds=0; $ds< count($alpha) ; $ds++) { 

    echo "" . $alpha[$ds]."&nbsp; ";
}
}
myarra($alpha);
myarrd($alpha);
echo"</br>";
ascending($numbers);
descending($numbers);
?>
