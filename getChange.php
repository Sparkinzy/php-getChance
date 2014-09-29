<?php
/**
 * according to the params you given 
 * Firstly ,it will generate all the range for each value
 * then compare each rate of value and the range generated before
 * so we can get a number according to the rate you given
 * @param  [type] $rand [description]
 * @return [type]       [description]
 */
function getChance($rand)
{
	$total_rates=0;
	$rate_arr=array();
	foreach ($rand as $key=>$value) {
		$rate_row=(object)array();		//difine an object ! Is there a better way to define an object ?
		$rate_row->min=$total_rates+1;//the min
		$total_rates+=$value;
		$rate_row->max=$total_rates;//the max
		$rate_row->num=$key;		//the number
		$rate_arr[]=$rate_row;
	}

	if ($total_rates!=100) {
		throw new Exception("the total rates is over 100!", 1);
	}
	$loop=0;
	$output=0;
	$rand=mt_rand(1,100);
	foreach ($rate_arr as $val) {	
		$min=$val->min;
		$max=$val->max;
		if ($min<=$rand&&$max>=$rand) {
			$output=$val->num;
			break;
		}
	}
	var_dump($output);
	return $output;

}


$rates=array();
$rates[5]=15;
$rates[1]=35;
$rates[3]=25;
$rates[7]=25;
$out=getChance($rates);
echo $out;







