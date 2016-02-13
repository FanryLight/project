<div id = "send">
<form method="post" action="">
	<table border="0" cellpadding="5">
		<tr> 
			<td width="106">Theme:</td> 
			<td width="288"> <input type="text" name="theme" required/> </td>
		</tr>
		<tr>
			<td>Text:</td>
			<td> <textarea name="text" cols="60" rows="10" required id="message"></textarea>
			 </td>
		</tr>
	</table>
	<br>
	<input type="submit" name="submit" value="Send"/></td></tr>

</form>
</div>

<?php
	if (isset($_POST["submit"]))
	{
		$link = mysql_connect("localhost:3306", "root", "rfgtkkfy99")
				or die("Could not connect : " . mysql_error());
				mysql_select_db("site") or die("Could not select database");
		$text = $_POST['text'];
		$theme = $_POST['theme'];
		$from = $_SESSION['user_name'];
		$to = $_GET['name'];
		$query = "INSERT INTO messages (`message`,`theme`,`user_from`,`user_to`) values ('$text','$theme','$from','$to')";
		mysql_query($query) or die (mysql_error());
		header("Location: http://".$_SERVER['HTTP_HOST']."/profile/user/?name=".$to."");
		mysql_close($link);
	}

?>