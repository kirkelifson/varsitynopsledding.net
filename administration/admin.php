<?
session_start();
require_once("../func.php");
$back = new BACKEND();
if (isset($_POST['login']))
	$back->login($_POST['username'],$_POST['password']);

if (isset($_POST['new-post'])){
	$back->upload($_FILES['header'], $_POST['filename']);
	$back->post($_POST['title'], $_POST['content'], $_SESSION['username']);
}
if (isset($_POST['clear-logs']))
	$back->clearLog();

?>
<!DOCTYPE html>
<html>
<head>
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
varsity nop-sledding
</div>
<div id="content">
<? 
if (!isset($_SESSION['username'])){
?>
	<form action="admin.php" method="POST">
	<input type="text" name="username" maxlength="30" /><br />
	<input type="password" name="password" /><br />
	<input type="hidden" name="login" />
	<input type="submit" value="login" />
	</form>
<?
} else {
?>
<h1>Administration Panel</h1>
<h2>New Post</h2>
<form action="admin.php" method="POST" enctype="multipart/form-data">
title:<br />
<input type="text" name="title" /><br />
content:<br />
<textarea name="content" cols="80" rows="20"></textarea><br />
header: <input type="file" name="header" size="40" /><br />
filename: <input type="text" name="filename" />
<input type="hidden" name="new-post" /><br />
<input type="submit" value="post" />
</form>
<br />
Access Violation Log:<br />
<pre>
<? $back->readLog(); ?>
</pre>
<form action="admin.php" method="POST">
<input type="submit" value="clear" />
<input type="hidden" name="clear-logs" />
</form>
<br />
<a href="/logout.php">logout</a>
<?
}
?>
</div>
<div id="footer">
(c) xtc industries, 1994-2012
</div>
</body>
</html>
