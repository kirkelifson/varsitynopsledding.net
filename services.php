<?
session_start();
require_once('./func.php');
$back = new BACKEND();

if (isset($_GET['x'])){
	$x = $_GET['x'];
	
	switch ($x){
		case 1:
			if (!empty($_POST['length'])){
				if (!isset($_POST['alpha'])&&!isset($_POST['numeric'])&&!isset($_POST['symbols']))
					$length=-1;
				else
					$length = $_POST['length'];

				if ($length<100&&$length>6){
					$pass = '';
					$list = '';
					$lists1 = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
					$lists2 = '1234567890';
					$lists3 = '!@#$%^&*()';
					
					if (isset($_POST['alpha']))
						$list.=$lists1;
					if (isset($_POST['numeric']))
						$list.=$lists2;
					if (isset($_POST['symbols']))
						$list.=$lists3;
					while ($length--)
						$pass .= $list[rand(0,strlen($list)-1)];
				}
			}
			break;
		
		case 2:
			if(isset($_POST['hashtype'])&&!empty($_POST['data']))
				$hash=hash($_POST['hashtype'],$_POST['data']);
			break;
	}
}
?>
<!DOCTYPE html>
<html>
<head>
<title>services</title>
<link rel="shortcut icon" href="favicon.ico" />
<link rel="stylesheet" href="/style.css" type="text/css" />
</head>
<body>
<div id="header">
// varsity nop-sledding
</div>
<div id="logo">
0x90
</div>
<div id="nav">
<? $back->nav(); ?>
</div>
<div id="title">
services
</div>
<div id="content">
<?
if (empty($x)){ ?>
<ul>
<li><a href="services.php?x=1">password generator</a>
<li><a href="services.php?x=2">hash calculator</a>
</ul>
<? }
elseif ($x==1){
?>
<form  method="post" action="services.php?x=<? echo $_GET['x']; ?>" name="passgen">
length:
<input class="smooth" size="2" type="text" name="length" maxlength="2" value="<? if(isset($_POST['length'])) echo $_POST['length'] ?>" /><br />
<textarea name="pass" cols="40" rows="3">
<? if (isset($list)&&$_POST['length']>0) echo $pass;?>
</textarea>
<br />
<input type="checkbox" name="alpha" <? if(isset($_POST['alpha'])) echo "checked" ?>/>alpha<br />
<input type="checkbox" name="numeric" <? if(isset($_POST['numeric'])) echo "checked" ?> />numeric<br />
<input type="checkbox" name="symbols" <? if(isset($_POST['symbols'])) echo "checked" ?> />symbols<br />
<button type="submit">generate</button>
</form>
<? } 
elseif ($x==2){
?>
<form method="post" action="services.php?x=<? echo $_GET['x']; ?>" name="hashgen">
type:
<select name="hashtype" style="font-family: monospace; border: 1px solid black;" >
<?
foreach (hash_algos() as $value){
	if (isset($_POST['hashtype'])&&$value==$_POST['hashtype'])
		echo "<option value=\"$value\" selected>$value</option>\n";
	else
		echo "<option value=\"$value\">$value</option>\n";
}
?>
</select>
<br />
<input class="smooth" style="width: 300px" type="text" name="data" value="<? if (isset($_POST['hashtype'])) echo $_POST['data']; else echo 'data';?>" />
<input class="smooth" style="width: 300px" type="text" name="hashvalue" value="<? if (isset($_POST['hashtype'])) echo $hash ?>" /><br />
<button type="submit">hash</button>
</form>
<?
}
?>
</div>
<div id="footer">
(c) xtc industries, 1994-2012
</div>
</body>
</html>
