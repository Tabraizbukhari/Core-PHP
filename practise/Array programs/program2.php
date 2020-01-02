<?php 


function add($a, $b) {
    return $a + $b;
}

if(isset($_POST['submit'])){
    $c = $_POST['num1'];
    $d = $_POST['num2'];
    $r = array($c, $d);
    
 
  echo  add($r[0],$r[1]);
    
}

?>

<form method="post">
<label>Sum of values</label>
<input type="number" name='num1' >
<input type="text" readonly name='sum' value="+" >
<input type="number" name='num2' >

<button name="submit" >Submit</button>
</form>
<?php if(isset($result)){echo ' Total : &nbsp;
<input type="numer" value="'.$result.'" >'; } ?>
