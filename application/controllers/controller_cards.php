<?php
include 'coloda.php';
include 'cards.php';
class ControllerCards extends Controller
{
	function __construct()
	{
		$this->model = new ModelCards();
		$this->view = new View();
	}
	
	function main()
	{
		$this->view->generate('viev_main.php', 'view_template.php', 'Главная');
	}

	function start()
	{
		session_start();
		$cards = new Cards;
		$distr = new DistrCards;
		$resKlient = $_SESSION['resKlient'];
		$resDill = $_SESSION['resDill'];
		$sumKlient = array_sum($resKlient);
		$sumDill = array_sum($resDill);
		if (in_array('11,1', $resKlient)) {
			while (in_array('11,1', $resKlient)) {
				if (array_sum($resKlient) > 21) {
					$a = array_search('11,1', $resKlient);
					$resKlient[$a] = 1;
					$_SESSION['resKlient'] = $resKlient;
					$sumKlient = array_sum($resKlient);
				}
				else {
					break;
				}
			}
		}
		if ($sumKlient == 21) {
			header('Refresh: 0, /cards/dill');
		}		
		$this->view->generate('viev_start.php', 'view_template.php', 'Игра', $resKlient, $resDill, $sumKlient, $sumDill);
	}
	
	function klient()
	{
		session_start();
		$klient = new KlientCards;
		$resKlient = $_SESSION['resKlient'];
		$resDill = $_SESSION['resDill'];
		$sumKlient = array_sum($resKlient);
		$sumDill = array_sum($resDill);
		if (in_array('11,1', $resKlient)) {
			while (in_array('11,1', $resKlient)) {
				if (array_sum($resKlient) > 21) {
					$a = array_search('11,1', $resKlient);
					$resKlient[$a] = 1;
					$_SESSION['resKlient'] = $resKlient;
					$sumKlient = array_sum($resKlient);
				}
				else {
					break;
				}
			}
		}
		if ($sumKlient > 21) {
			$_SESSION['result'] = 'К сожалению, ты проиграл...';
			header('Location: /cards/result');
			exit;
		}
		elseif ($sumKlient == 21) {
			$_SESSION['result'] = 'Поздравляю! Ты выиграл!';
			header('Location: /cards/result');
			exit;
		}
		$this->view->generate('viev_start.php', 'view_template.php', 'Игра', $resKlient, $resDill, $sumKlient, $sumDill);
	}
		
	
	function dill()
	{
		session_start();
		$dill = new DillCards;
		$resDill = $_SESSION['resDill'];
		if (array_sum($resDill) != 21) {
			$_SESSION['result'] = 'Поздравляю! Ты выиграл!';
		}
		else {
			$_SESSION['result'] = 'Ну надо же, ничья!';
		}
		header('Location: /cards/result');
	}
	
	function diller()
	{
		session_start();
		$resKlient = $_SESSION['resKlient'];
		$resDill = $_SESSION['resDill'];
		$sumKlient = array_sum($resKlient);
		$sumDill = array_sum($resDill);
		while ($sumDill < 17) {
			$diller = new DillCards;
			$resDill = $_SESSION['resDill'];
			$sumDill = array_sum($resDill);
			if (in_array('11,1', $resDill)) {
				while (in_array('11,1', $resDill)) {
					if (array_sum($resDill) > 21) {
						$a = array_search('11,1', $resDill);
						$resDill[$a] = 1;
						$_SESSION['resDill'] = $resDill;
						$sumDill = array_sum($resDill);
					}
					else {
						break;
					}
				}
			}
		}
		if ($sumDill > 21 || $sumDill < $sumKlient) {
			$_SESSION['result'] = 'Поздравляю! Ты выиграл!';
			header('Location: /cards/result');
			exit;		
		}
		if ($sumDill == 21) {
			$_SESSION['result'] = 'К сожалению, ты проиграл...';
			header('Location: /cards/result');
			exit;
		}
		if ($sumDill > $sumKlient) {
			$_SESSION['result'] = 'К сожалению, ты проиграл...';
			header('Location: /cards/result');
			exit;
		}
		if ($sumDill == $sumKlient) {
			$_SESSION['result'] = 'Победила дружба';
			header('Location: /cards/result');
			exit;
		}
	}		
	
	
	
	function result()
	{
		session_start();
		$result = $_SESSION['result'];
		$resKlient = $_SESSION['resKlient'];
		$resDill = $_SESSION['resDill'];
		$sumKlient = array_sum($resKlient);
		$sumDill = array_sum($resDill);
		$this->view->generate('viev_start.php', 'view_template.php', 'Рузультат', $resKlient, $resDill, $sumKlient, $sumDill, $result);
	}
}