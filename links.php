<?
session_start();
require_once('./func.php');
$back = new BACKEND();
?>
<!DOCTYPE html>
<html>
<head>
<title>links</title>
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
links
</div>
<div id="content">
<ul>
<li><a href="http://gonullyourself.org">GoNullYourself</a></li>
<li><a href="http://news.ycombinator.org">Hacker News</a></li>
</ul>
</div>
<div id="footer">
(c) xtc industries, 1994-2012
</div>
</body>
</html>
