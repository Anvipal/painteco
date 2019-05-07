<?php
	include('_config.inc.php');	
	include('inc/init_site.inc');

	if(count($_POST)) {
		
		$email = mysql_escape_string($_POST["email"]);
		$sql = "select id, login, passw from users where email='$email'";
		$res = mysql_query($sql);
		if(!mysql_num_rows($res)) {
			echo "<h3>" . _get_vars("rem_error") . "</h3>";	
		} else {
			
			$user = mysql_fetch_array($res);
			
			$sql = "select text_".SITE_LANG." as text from texts where id=8";
			$res = mysql_query($sql);
			$text = mysql_fetch_array($res);
			$msg = str_replace("#login", $user["login"], $text["text"]);
			$msg = str_replace("#password", $user["passw"], $msg);

			_send_message($SETTINGS['email'], $email, $SETTINGS['title']." - Jusu litotajvards un parole", $msg, false);
			
			?>
				<script>window.close()</script>
			<?			
		}	
	}


?>
<form method=post action="<? echo CGI_ARG ?>">
<table width="100%" border=0><tr>
	<td><? echo _get_vars("rem_email") ?></td>
	<td><input type=text name="email" value="<? if(isset($_POST["email"])) echo $_POST["email"] ?>"></td>
	<td><input type=submit value="<? echo _get_vars("rem_btn") ?>"></td>	
</tr></table>
</form>
