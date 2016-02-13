<form method="post" action="">
<table border="0" cellpadding="5">
	<tr> 
		<td width="106">Login:</td> 
		<td width="288"> <input type="text" name="login" required /> </td>
	</tr>
	<tr>
		<td>Password:</td>
		<td> <input type="password" name="password" required /> </td>
	</tr>
	<tr>
		<td></td>
		<td><input type="submit" name="submit" value="Submit"/></td></tr>
	</table>
</form>

<?php
	echo $data;
?>