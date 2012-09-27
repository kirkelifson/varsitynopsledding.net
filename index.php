<?
session_start();
require_once('./func.php');
$back = new BACKEND();

if (isset($_GET['x'])) $x = $_GET['x'];
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<title>varsity nop-sledding</title>
<link rel="shortcut icon" href="favicon.ico"/>
<link rel="stylesheet" href="/style.css" type="text/css"/>
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
news
</div>
<div id="content">
<?
if (empty($x)){
?>
<ul>
<? $back->listPosts(); ?>
</ul>
<?
}
else if ($x>0&&is_numeric($x)){
	$back->readPost($x);
}
?>
</div>
<div id="footer">
(c) xtc industries, 1994-2012
</div>
</body>
</html>
