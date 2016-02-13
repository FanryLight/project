<div id="sort">
<form action="/controlpanel/messages/?page=1" method="post">
Sort by 
	<select name="sort" >
		<option disabled></option>
		<option value="`name`">Name A-Z</option>
		<option value="`name` DESC">Name Z-A</option>
		<option value="`datetime`">Time v</option>
		<option value="`datetime` DESC">Time ^</option>
		<option value="`mail`">E-mail A-Z</option>
		<option value="`mail` DESC">E-mail Z-A</option>
		<option value="`ip`">IP v</option>
		<option value="`ip` DESC">IP ^</option>
	</select>
	<input type="submit" value="Sort" name="Sub_Sort"></p>
</form>
</div>

<div id="article">
	<table id="table" border="0" cellpadding="0">
	<tr>
		<td width="30"><td>
		<td width="150"><center><b>Name</b></center></td>
		<td width="180"><center><b>Time</b></center></td>
		<td width="180"><center><b>E-mail</b></center></td>
		<td width="60"><center><b>IP</b></center></td>
		<td width="220"><center><b>Message</b></center></td>
	</tr>
	</table>
</div>
<?php
	echo "<form method=\"post\" action=\"\">";
	$n = count($data);
	for ($i=0; $i<$n; $i++)
	{
		$id= $data[$i]['id'];
		$time = $data[$i]['time'];
		$name = $data[$i]['name'];
		$mail = $data[$i]['mail'];
		$date = $data[$i]['date'];
		$ip = $data[$i]['ip'];
		$answer = $data[$i]['answer'];
		$message = $data[$i]['message'];
		echo "
		<table id=\"panel\" border=\"0\" cellpadding=\"5px\">
		<tr>
			<td width=\"30\"> <input name=\"choosed[]\" type=\"checkbox\" value=\"$id\"></td>
			<td width=\"150\"> $name</td>
			<td width=\"180\">	$time</td>
			<td width=\"180\">	$mail	</td>
			<td width=\"60\"> $ip </td>
			<td width=\"220\">$message </td>
		</tr>
		</table>
		
		<form method=\"post\" action=\"\" name=\"answer\">
		<input type=\"hidden\" value=\"$id\" name=\"id\"/>
		<table id=\"table\" border=\"0\" cellpadding=\"5px\">
		<tr>
		<td width=\"100\">
		<b>Answer:</b>
		</td>
		<td width=\"400\">
		<textarea name=\"text\" cols=\"50\" rows=\"3\"id=\"textarea\">$answer</textarea>
		</td>
		<td>
		<input type=\"submit\" value=\"Answer\" name=\"answer\"/>
		</td>
		</tr>
		</table>
		</form>
		";
		
	}
	
	echo "<div id=\"del\"><input type=\"submit\" value=\"Delete\" name=\"delete\"/>
	</div>
	</form>";
	if(isset($_GET['page']))
		$page = $_GET['page'];
	else $page = 1;
	if (isset($_POST['sort']))
		$order = $_POST['sort'];
	else if (isset($_GET['order']))
		$order = $_GET['order'];
	else $order = "id";
	echo "<div id = \"num_pages\">";
	
	if ($pages >= 1)
	{
		for ($i = 1; $i <= $pages; $i++)
			echo ($i == $page) ? '<a id = "cur" href="/controlpanel/messages/?page='.$i.'&order='.$order.'">'.$i.'</a>':'<a href="/controlpanel/messages/?page='.$i.'&order='.$order.'">'.$i.'</a>';
	}
	echo "</div>";
	

?>
