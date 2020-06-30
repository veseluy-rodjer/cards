<?php
class DistrCards
{
	function __construct()
	{
		$_SESSION['resKlient'] = [];
		$_SESSION['resDill'] = [];
		list($one, $two, $dill) = array_rand($_SESSION['coloda'], 3);
		$_SESSION['resKlient'][$one] = $_SESSION['coloda'][$one];
		$_SESSION['resKlient'][$two] = $_SESSION['coloda'][$two];
		$_SESSION['resDill'][$dill] = $_SESSION['coloda'][$dill];
		unset($_SESSION['coloda'][$one]);
		unset($_SESSION['coloda'][$two]);
		unset($_SESSION['coloda'][$dill]);
	}
}

class DillCards
{
	function __construct()
	{
		$kart = array_rand($_SESSION['coloda']);
		$_SESSION['resDill'][$kart] = $_SESSION['coloda'][$kart];
		unset($_SESSION['coloda'][$kart]);
	}
}

class KlientCards
{
	function __construct()
	{
		$kart = array_rand($_SESSION['coloda']);
		$_SESSION['resKlient'][$kart] = $_SESSION['coloda'][$kart];
		unset($_SESSION['coloda'][$kart]);
	}
}

