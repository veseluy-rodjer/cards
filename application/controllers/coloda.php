<?php
class Cards
{
	function __construct()
	{
		$rang = ['2_'=>'2', '3_'=>'3', '4_'=>'4', '5_'=>'5', '6_'=>'6', '7_'=>'7', '8_'=>'8', '9_'=>'9', '10_'=>'10', 'j_'=>'10', 'q_'=>'10', 'k_'=>'10', 'a_'=>'11,1'];
		
		foreach ($rang as $i=>$y) {
			$b[$i . 'b.jpg'] = $y;
		}
		
		foreach ($rang as $i=>$y) {
			$p[$i . 'p.jpg'] = $y;
		}
		
		foreach ($rang as $i=>$y) {
			$t[$i . 't.jpg'] = $y;
		}
		
		foreach ($rang as $i=>$y) {
			$ch[$i . 'ch.jpg'] = $y;
		}
		
		foreach ($b as $i=>$y) {
			$card[$i] = $y;
		}
		
		foreach ($p as $i=>$y) {
			$card[$i] = $y;
		}
		
		foreach ($t as $i=>$y) {
			$card[$i] = $y;
		}
		
		foreach ($ch as $i=>$y) {
			$card[$i] = $y;
		}
		$_SESSION['coloda'] = $card;	
	}
}