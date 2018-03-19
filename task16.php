<?php
echo"~~~~~~ Task 1 ~~~~~~<br>";
$hours = 48;
echo "hours = ".$hours."<br><br>";

echo"~~~~~~ Task 2 ~~~~~~<br>";
$productivity = 10.5;
echo "productivity = ".$productivity."<br><br>";

echo"~~~~~~ Task 3 ~~~~~~<br>";
$firstTotal = $hours*$productivity;
echo "firstTotal = ".$firstTotal."<br><br>";

echo"~~~~~~ Task 4 ~~~~~~<br>";
$hours+=1;
echo "hours + 1 = ".$hours."<br><br>";

echo"~~~~~~ Task 5 ~~~~~~<br>";
$productivity-=0.5;
echo "productivity - 0.5 = ".$productivity."<br><br>";

echo"~~~~~~ Task 6 ~~~~~~<br>";
$secondTotal = $hours*$productivity;
echo "secondTotal = ".$secondTotal."<br><br>";

echo"~~~~~~ Task 8 ~~~~~~<br>";
$Programmer = "Aaqib Akhtar";
echo "Programmer = ".$Programmer."<br><br>";

echo"~~~~~~ Task 9 ~~~~~~<br>";
$Year = 2018;
echo "Year = ".$Year."<br><br>";

echo"~~~~~~ Task 10 ~~~~~~<br>";
$Message = "Hello World";
echo "Message initially = ".$Message."<br><br>";

echo"~~~~~~ Task 11 ~~~~~~<br>";
$Message = str_replace("World", "Programmer",$Message);
echo "Message after replacement = ".$Message."<br><br>";

echo"~~~~~~ Task 12 ~~~~~~<br>";
$v1=10;
$v2=20;
if($v2>$v1)
	echo "v2 is greater<br><br>";
else
	echo "v1 is greater<br><br>";

echo"~~~~~~ Task 13 ~~~~~~<br>";
echo "Counting from 1 to 100<br>";
for($count = 1 ; $count<=100 ; $count++ ){
 echo $count." ";
}
echo "<br><br>";

echo"~~~~~~ Task 14 ~~~~~~<br>";
echo "Counting from 100 to 1<br>";
$count = 100;
while( $count >= 1) {
	echo $count." ";
	$count--;
}
echo "<br><br>";

echo"~~~~~~ Task 15 ~~~~~~<br>";
$numbers = [1,2,3,4,5];
foreach ($numbers as $index => $value) {
	echo "Value at index ".$index." is ".$value."<br>";
}

echo "<br><br>";

echo "~~~~~~ Task 16 ~~~~~~<br>";
echo "
	<form method='POST' action=''>
	<input type='text' name='number' placeholder='Enter Number'/>
	<button type='submit'>Convert</button>
	</form>
";

if(isset($_POST["number"]))
	$num = $_POST["number"];
else{
	$num = 7820908;
	echo "Sample ";
}
$num    = ( string ) ( ( int ) $num );

echo "Number = ".$num."<br>";

$list1  = array('','one','two','three','four','five','six','seven',
    'eight','nine','ten','eleven','twelve','thirteen','fourteen',
    'fifteen','sixteen','seventeen','eighteen','nineteen');

$list2  = array('','ten','twenty','thirty','forty','fifty','sixty',
    'seventy','eighty','ninety','hundred');

$list3  = array('','thousand','million');

$num_length;
$digits;

if( ( int ) ( $num ) && ctype_digit( $num ) )
{
    $num_length = strlen( $num );   
    for( $i = 0 ; $i < strlen($num) ; $i++ ){
    	$digits[$i] = substr($num, $num_length-1,1);
    	$num_length--;
    }
    $num_length = strlen($num);
    print_words();
}


function print_words(){
switch(true){
        	case ($GLOBALS['num_length']==1):
        	 	echo $GLOBALS['list1'][$GLOBALS['num']];
        	 	break;
        	case ($GLOBALS['num_length']==2):
        		if($GLOBALS['num']<20){
        			if($GLOBALS['digits'][1]!=0)
        				echo $GLOBALS['list1'][$GLOBALS['num']]." ";
        			else
        				echo $GLOBALS['list1'][$GLOBALS['digits'][0]]." ";
        	 		break;
        		}
        		else{
        			if($GLOBALS['digits'][1]!=0)
       		 		echo $GLOBALS['list2'][$GLOBALS['digits'][1]]." ";
        			if($GLOBALS['digits'][0]!=0){

        			remove_digit(1);
        			
        			print_words();
        		}
        		}
        		break;
        	case ($GLOBALS['num_length']==3):
        		if($GLOBALS['digits'][2]!=0)
        			echo $GLOBALS['list1'][$GLOBALS['digits'][2]]." ".$GLOBALS['list2'][10].", ";
        		
        		remove_digit(2);
        		print_words();
        		break;
        	case ($GLOBALS['num_length']==4):
        		if($GLOBALS['digits'][3]!=0)
        			echo $GLOBALS['list1'][$GLOBALS['digits'][3]]." ".$GLOBALS['list3'][1].", ";
        		
        		remove_digit(3);
        		print_words();
        		break;
        	case ($GLOBALS['num_length']==5):
        		if($GLOBALS['digits'][4]!=0){
        			if($GLOBALS['digits'][4]==1){
        				echo $GLOBALS['list1'][$GLOBALS['digits'][4].$GLOBALS['digits'][3]]." ".$GLOBALS['list3'][1].", ";

        				
        			}else{
        				echo $GLOBALS['list2'][$GLOBALS['digits'][4]]." ".$GLOBALS['list1'][$GLOBALS['digits'][3]]." ".$GLOBALS['list3'][1].", ";

        			}

        			remove_digit(4);
	        		remove_digit(3);
	        		print_words();
        		}else{
        		remove_digit(4);
        		print_words();
        		}
        		break;
        	case ($GLOBALS['num_length']==6):
        		if($GLOBALS['digits'][5]!=0)
        			echo $GLOBALS['list1'][$GLOBALS['digits'][5]]." ".$GLOBALS['list2'][10]." and ";

        		remove_digit(5);
        		print_words();
        		break;
        	case ($GLOBALS['num_length']==7):
        		if($GLOBALS['digits'][6]!=0)
        			echo $GLOBALS['list1'][$GLOBALS['digits'][6]]." ".$GLOBALS['list3'][2].", ";

        		remove_digit(6);
        		print_words();
        		break;
        	default:
        		echo "Please try again with number less than 10 million!";
        }
       
}
function remove_digit($index){
        	    $GLOBALS['num'] = substr($GLOBALS['num'], 1,$GLOBALS['num_length']-1);
        		$GLOBALS['num_length'] = strlen($GLOBALS['num']);
        		unset($GLOBALS['digits'][$index]);
        		$GLOBALS['digits'] = array_values($GLOBALS['digits']);
}

?>