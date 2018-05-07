<?php
$msj = htmlentities($_GET["msj"], ENT_QUOTES | ENT_IGNORE, "UTF-8");
$post = dechex(rand());
$color = rand(0,6);
if($color == '0'){$back = '#aaffff';}elseif($color == '1'){$back = '#ffaaff';}elseif($color == '2'){$back = '#ffaaff';}elseif($color == '3'){$back = '#ccccff';}elseif($color == '4'){$back = '#ffcccc';}elseif($color == '5'){$back = '#ffccff';}else{$back = '#ffffaa';}

if ($_GET["msj"]){
	$msj = str_replace("[[","<a href=\"#", $msj);
	$msj = str_replace("]]","\">otro post</a>", $msj);
	$bbs = '<div style="background-color:'.$back.';"><a name="' . $post . '"><b>' . $post . '</b></a> - ' . $msj . '<div>';
	$bbs .= file_get_contents('bbs.htm');
	file_put_contents('bbs.htm', $bbs);
}
echo '<meta http-equiv="pragma" content="no-cache" />';
echo '<div style="background-color: #000; color: #ccc; text-align: center;"><br><b>DAMNSIMPLETEXTBOARD</b><br>MANUAL DE USO:<br><b>Escribir</b> bbs.php?msj=tu-mensaje<br><b>Citar</b> [[numero-post]]<br><br></div><br>';
$file = fopen("bbs.htm", "r");
while(!feof($file)) {
		echo fgets($file). "<br />";
}
fclose($file);
?>