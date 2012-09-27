<?
session_start();
require_once('./func.php');
$back = new BACKEND();
?>
<!DOCTYPE html>
<html>
<head>
<title>about</title>
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
about
</div>
<div id="content">
<img src="/images/hallway.png" alt="hallway" />
<p>Hello, I'm Kirk Elifson, currently a freshman majoring in Computer Science at the University of Central Florida.
I take many activities to heart, ranging from hiking to first-person shooters. However, of all these activities,
learning is the most important to me. I believe that knowledge should be spread as much as possible in order to
educate the masses about interesting topics. One may call me a fan of full disclosure; another a free-thinker.
Anything that inhibits the mind from accessing an increased amount of information is an enemy of mine.</p>

<p>Thus, the sole reason for my keeping a blog. Knowledge should be spread, but the people that wish to learn
must find it first. The internet makes this a simpler task which is why I invite everyone to experience the
fulfilling act of learning, side-by-side with me.</p>
<br />
xtc
<br />
email: xtc (at) varsitynopsledding (dot) net<br />
PGP key:<br />
<pre>
<?
	$filename = "pgp";
	$handle = fopen($filename, "r");
	$content = fread($handle, filesize($filename));
	echo nl2br($content);
	fclose($handle);
?>
</pre>
<br />
<a href="http://www.linkedin.com/pub/kirk-elifson/34/431/b71"><img src="/images/icons/linkedin.png" alt="linkedin" /></a>
<a href="https://plus.google.com/113830508999867492707"><img src="/images/icons/gplus.png" alt="gplus" /></a>
<a href="http://github.com/kirkelifson"><img src="/images/icons/github.png" alt="github" /></a>
<a href="https://twitter.com/#!/kelifson"><img src="/images/icons/twitter.png" alt="twitter" /></a>
<a href="http://www.last.fm/user/elifsonk"><img src="/images/icons/lastfm.png" alt="lastfm" /></a>
<a href="http://www.reddit.com/user/xtc0re/"><img src="/images/icons/reddit.png" alt="reddit" /></a>
<a href="http://steamcommunity.com/id/v0rtextc"><img src="/images/icons/steam.png" alt="steam" /></a>
<br />
<br />
* Image credit: http://wallbase.cc/wallpaper/660607
</div>
<div id="footer">
(c) xtc industries, 1994-2012
</div>
</body>
</html>
