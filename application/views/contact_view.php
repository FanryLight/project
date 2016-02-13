<img src="img\contact_back1.png" class="right">
<form method="post" action="">
	<table border="0" cellpadding="5">
		<?php
		if (!defined('SID'))
					session_start();
		if (!isset($_SESSION['authorized']) OR  $_SESSION['authorized']== 0) 
			echo "
				<tr> 
					<td width=\"106\">Name:</td> 
					<td width=\"288\"> <input type=\"text\" name=\"name\" required /> </td>
				</tr>
				<tr>
					<td>E-mail:</td>
					<td> <input type=\"text\" name=\"email\" required /> </td>
				</tr>
			";
		?>
		<tr>
			<td> Message:</td>
			<td> <textarea name="message" cols="30" rows="5" required id="textarea"></textarea><br></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="submit" value="Submit"/></td>
		</tr>
	</table>
</form>

<?php
	echo $data;
?>