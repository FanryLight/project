<div id="sort">
	<form action="" method="post">
	Sort by 
		<select name="sort" >
			<option disabled></option>
			<option value="`user`">User A-Z</option>
			<option value="`user` DESC">User Z-A</option>
			<option value="`time`">Time ↓</option>
			<option value="`time` DESC">Time ↑</option>
			<option value="`article`">Article A-Z</option>
			<option value="`article` DESC">Article Z-A</option>
		</select>
		<input type="submit" value="Sort" name="Sub_Sort">
	</form>
</div>

<div id="article">
	<table id="table" border="0" cellpadding="5">
	<tr>
		<td width="0"><td>
		<td width="150"><center><b>User</b></center></td>
		<td width="200"><center><b>Time</b></center></td>
		<td width="100"><center><b>Article</b></center></td>
		<td width="250"><center><b>Text</b></center></td>
	</tr>
	</table>
</div>
<?php
	echo "<form method=\"post\" action=\"\">";
	$n = count($data);
	for ($i = 0; $i < $n; $i++)
	{
		echo "
			<table class=\"table\" border=\"0\" cellpadding=\"5px\">
			<tr>
				<td width=\"40\"> <input name=\"choosed[]\" type=\"checkbox\" value=\"".$data[$i]['id']."\"></td>
				<td width=\"150\">".$data[$i]['user']."</td>
				<td width=\"200\">".$data[$i]['time']."</td>
				<td width=\"100\">".$data[$i]['article']."</td>
				<td width=\"250\">".$data[$i]['text']."</td></tr>
			</table>
			";
	}
	echo "<td width=\"100\"><input type=\"submit\" value=\"Delete\" name=\"delete\"/></td></form>";
	echo "<div id = \"num_pages\">";
	if(isset($_GET['page']))
		$page = $_GET['page'];
	else $page = 1;
	if (isset($_POST['sort']))
		$order = $_POST['sort'];
	else 
		if (isset($_GET['order']))
			$order = $_GET['order'];
	else $order = "id";
	if ($pages >= 1)
	{
		for ($i = 1; $i <= $pages; $i++)
			echo ($i == $page) ? '<a id = "cur" href="/controlpanel/comments/?page='.$i.'&order='.$order.'">'.$i.'</a>':'<a href="/controlpanel/comments/?page='.$i.'&order='.$order.'">'.$i.'</a>';
	}
	echo "</div>";
	
?>
