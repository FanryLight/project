
<?php
	$n = count($data);
	for ($i=0; $i<$n; $i++)
	{
		$names = $data[$i]['name'];
		$mail = $data[$i]['mail'];
		$date = $data[$i]['date'];
		$ip = $data[$i]['ip'];
		$answer = $data[$i]['answer'];
		$message = $data[$i]['message'];
		$ans = ($answer) ? "<tr><td><b>Answer:</b></td><td>$answer</td></tr>" : "";
		$reg = $data[$i]['reg'];
		$name = $data[$i]['name'];
		if ($reg == 1)
			$name = '<a href="/profile/user/?name='.$names.'">'.$names.'</a>';
		echo "<table class=\"table\" border=\"0\" cellpadding=\"0\">
		<tr> 
			
			<td width=\"100\"><b>Name:</b></td> 
			<td width=\"350\"> $name </td>
		</tr>
		<tr>
			
			<td> <b>IP:</b> </td>
			<td>	$ip	</td>
		</tr>
		<tr>
			
			<td> <b>Date/Time:</b> </td>
			<td>	$date	</td>
		</tr>
		<tr>
			
			<td><b>E-mail:</b></td>
			<td> $mail </td>
		</tr>
		<tr>
			
			<td> <b>Message:</b></td>
			<td>$message </td>
		</tr>
		$ans		
		</table>
		";
	}
			
	echo "<div id = \"num_pages\">";

	if ($pages >= 1)
	{
		echo "<form name=\"form\" method=\"post\">";
		for ($i = 1; $i <= $pages; $i++)
		{
			echo ($i == $_GET['page']) ? '<a id = "cur" href="?page='.$i.'" value="'.$i.'">'.$i.'</a>':'<a href="?page='.$i.'" value="'.$i.'">'.$i.'</a>';
			
		}
		echo "<input type=\"hidden\" name=\"value\" value=\"nojs\" id=\"review\" />
		</form>";
	}

	echo "</div>";

?>
