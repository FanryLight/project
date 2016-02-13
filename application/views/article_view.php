<?php
	$text = html_entity_decode($data['text']);
	$name = $data['name'];
	$icon = $data['pair_item'];
	$stats = $data['stats'];
	echo '<div id="article"><img src="/'.$stats.'" class="left"><center><h2><a href = "/article/'.$name.'.xml" title="Watch as XML">'.$name.'</a><br></h2></center>'.$text.'<center><br><img src="/'.$icon.'" width="600px"></center></div>';
?>
<h3>Comments</h3>
<?php
	$n = count($pages);
	for ($i=0; $i<$n; $i++)
	{
		$text = $pages[$i]['text'];
		$user = $pages[$i]['user'];
		$time = $pages[$i]['time'];
		$u_name = '<a href="/profile/user/?name='.$user.'">'.$user.'</a>';
		echo "<table class=\"table\" border=\"0\" cellpadding=\"0\">
		<tr> 
			
			<td width=\"100\"><b>Name:</b></td> 
			<td width=\"350\"> $u_name </td>
		</tr>
		<tr>
			
			<td> <b>Time:</b> </td>
			<td>	$time	</td>
		</tr>
		<tr>
			
			<td> <b>Comment:</b> </td>
			<td>	$text	</td>
		</tr>
		<tr>
		</table>
		";
	}
	if (isset($_SESSION['authorized']) AND  $_SESSION['authorized']== 1) 
	{
?>
<div id = "send">
	<form method="post" action="">
		Leave your comment: <br>
		<textarea name="text" cols="45" rows="4" required id="message"></textarea> 
		<br>
		<input type="submit" name="submit" value="Send"/></td></tr>
	</form>
</div>	
<?php	
	}
	else echo '<div id = "send">Login to add a comment.</div>'		
?>
