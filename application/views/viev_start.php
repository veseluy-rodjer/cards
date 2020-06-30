<table align="left" width="50%">
  <tr>
    <th align="center"><h2>Твои карты:</h2></th>
  </tr>
  <tr><td>
<?php
foreach ($resKlient as $i=>$y) {
	echo '<img src="../../images/' . $i . '" width="20%" height="30%" alt="">';
}
?>
  </td></tr>
  <tr><td>
  <p><?= 'Количество очков: ' . $sumKlient ?></p>
  </td></tr>
  <?php if ((explode('/', $_SERVER['REQUEST_URI'])[2] == 'start' || explode('/', $_SERVER['REQUEST_URI'])[2] == 'klient') && $sumKlient != 21): ?>
  <tr><td>
  <h3>&nbsp;&nbsp;&nbsp;&nbsp;<a style="color: white" href="/cards/klient/">Еще</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a style="color: white" href="/cards/diller/">Стоп</a></h3>
  </td></tr>
  <?php endif; ?>
</table>
<table align="right" width="50%">
  <tr>
    <th align="center"><h2>Карты диллера:<br></h2></th>
  </tr>
  <tr><td>
<?php
foreach ($resDill as $i=>$y) {
	echo '<img src="../../images/' . $i . '" width="20%" height="30%" alt="">';
}
?>
  </td></tr>
  <tr><td>
  <p><?= 'Количество очков: ' . $sumDill ?></p>
  </td></tr>
</table>
<h1 style="color: white" align='center'><?= $result ?></h1>