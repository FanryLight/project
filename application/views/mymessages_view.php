<div id = "options">
<?php 
	if (!defined('SID'))
		session_start();
	$name = $_SESSION['user_name'];
	echo '<a href = "/profile/user/?name='.$name.'"> <img src="/img/profile.png" class = "img" >	Profile</a>    ';
	echo '<a href = "/profile/mymessages/?page=1">   <img src="/img/message.png" class = "img">    My messages</a>     ';
?>
</div>
<?php
	$n = count($data);
	for ($i=0; $i<$n; $i++)
	{
		$from = $data[$i]['user_from'];
		$theme = $data[$i]['theme'];
		$time = $data[$i]['time'];
		$text = $data[$i]['message'];
		echo "<table id=\"table\" border=\"0\" cellpadding=\"0\">
		<tr> 
			
			<td width=\"100\"><b>From:</b></td> 
			<td width=\"335\"> $from     <div class = \"answer\"> <a  href=\"/profile/user/?name=".$from."&act=send\"><img src=\"/img/reply.png\" width=\"30\"></a></div>
			</td>
		</tr>
		<tr>
			
			<td> <b>Time:</b> </td>
			<td>	$time	</td>
		</tr>
		<tr>
			
			<td> <b>Theme:</b> </td>
			<td>	$theme	</td>
		</tr>
		<tr>
			
			<td><b>Message:</b></td>
			<td> $text </td>
		</tr>		
		</table>
		
		";
	}
	echo "<div id = \"num_pages\">";

	if ($pages >= 1)
	{
		echo "<form name=\"form\" method=\"post\">";
		for ($i = 1; $i <= $pages; $i++)
		{
			echo ($i == $_GET['page']) ? '<a id = "cur" href="/profile/mymessages/?page='.$i.'" value="'.$i.'">'.$i.'</a>':'<a href="/profile/mymessages/?page='.$i.'" value="'.$i.'">'.$i.'</a>';
			
		}
		echo "<input type=\"hidden\" name=\"value\" value=\"nojs\" id=\"review\" />
		</form>";
	}

	echo "</div>";
?>