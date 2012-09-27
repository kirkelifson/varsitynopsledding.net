<?
class BACKEND {
	function mysql_conn(){
		return mysql_connect('localhost', 'username', 'password') or die('Could not connect to database');
	}

	function login($user, $pass){
		$mysql = $this->mysql_conn();
		$user = mysql_real_escape_string($user);
		$pass = mysql_real_escape_string($pass);
		$db = mysql_select_db("db_name");
		$result = mysql_query("select password,salt from users where username=\"".$user."\"");
		if(mysql_num_rows($result)){
			$ret = mysql_fetch_assoc($result);
			$hash_input = sha1($ret['salt'].$pass);
			$hash_db = $ret['password'];
			if ($hash_input==$hash_db){
				$_SESSION['username']=$user;
				header("Location: /administration/admin.php");
			} else {
				$fptr = fopen("/administration/ip.txt", "a+");
				$content = "-------------------\n";
				$content .= date("m/d/Y H:i:s")."\n";
				$content .= $_SERVER['REMOTE_ADDR']."\n";
				$content .= $_SERVER['HTTP_USER_AGENT']."\n";
				$content .= "-------------------\n";
				fwrite($fptr, $content);
				fclose($fptr);
				header("Location: /index.php");
			}
		}
		mysql_close();
	}

	function logout(){
		unset($_SESSION['username']);
		header("Location: /index.php");
	}

	function readLog(){
		$output = file_get_contents("/administration/ip.txt");
		echo nl2br($output);
	}

	function clearLog(){
		file_put_contents("/administration/ip.txt", "");
		header("Location: admin.php");
	}

	function upload($file, $filename){
		move_uploaded_file($file["tmp_name"], "/images/articles/".$filename.".png");
	}

	function post($title, $content, $author){
		$mysql = $this->mysql_conn();
		$db = mysql_select_db("db_name");
		$content = mysql_real_escape_string($content);
		$query = "insert into posts value(0, \"".$title."\", \"".$author."\", \"".$content."\", ".time().")";
		mysql_query($query);
		echo mysql_error();
		mysql_close();
	}

	function listPosts(){
		$mysql = $this->mysql_conn();
		$db = mysql_select_db("db_name");
		$query = "select * from posts order by time desc";
		$result = mysql_query($query);
		while ($ret = mysql_fetch_assoc($result)){
			echo "<li>";
			echo "<a href=\"index.php?x=".$ret['id']."\">".$ret['title']."</a> ";
			echo "by ".$ret['author'];
			echo "</li>\n";
		}
		mysql_close();
	}

	function readPost($x){
		$mysql = $this->mysql_conn();
		$db = mysql_select_db("db_name");
		$query = "select content,id from posts where id='$x'";
		$result = mysql_query($query);
		if (mysql_num_rows($result)){
			$ret = mysql_fetch_assoc($result);
			echo "<img src=\"images/articles/".$ret['id'].".png\" />";
			echo stripslashes(nl2br($ret['content']));
		}
		mysql_close();
	}

	function nav(){
		$list = array(	"home"      => "/index.php",
										"services"  => "/services.php",
										"about"     => "/about.php",
										"links"     => "/links.php",
								 );
		$x=sizeof($list);
		foreach ($list as $key=>$value){
			echo "<a href=\"$value\">$key</a>";
			if ($x-->1) echo " //\n";
		}
	}
}

class FRONTEND {

}
?>
