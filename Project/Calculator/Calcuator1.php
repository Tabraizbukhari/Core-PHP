<?php
error_reporting(0);
if(isset($_POST['btn']))
{
    $a = $_POST['num1'];
    $b = $_POST['num2'];
    $o = $_POST['op'];
    $d = $_POST['op'];

    switch ($o) {
        case '+':
            $c= $a+$b;
            break;
            case '-':
                $c= $a-$b;
                break;
                case '/':
                    $c= $a/$b;
                    break;
                    case '*':
                        $c= $a*$b;
                        break;
                        case '%':
                            $c= $a/$b*100;
                            break;
                
                            
        
        default:
           echo 'code error';
    }

}
?>
 
 
 
    <form method="post" action="">
        <input type="text" name='num1'>
        <select name ='op'>
  <option name='op' >+</option>
  <option name='op' >-</option>
  <option name='op' >/</option>
  <option name='op' >*</option>
  <option name='op' >%</option>
</select>
        
        <input type="text" name='num2'>
        
        <input type="submit" name="btn">
    </form>


<label><?php if(isset($c)){ echo $c;}?></label>
