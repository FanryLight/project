<div id="sort">
<form action="" method="post">
Sort by 
	<select name="sort" >
		<option disabled></option>
		<option value="`name`">Name A-Z</option>
		<option value="`name` DESC">Name Z-A</option>
		<option value="`time`">Time ↓</option>
		<option value="`time` DESC">Time ↑</option>
		<option value="`author`">Author A-Z</option>
		<option value="`author` DESC">Author Z-A</option>
		<option value="`access`">Access ↓</option>
		<option value="`access` DESC">Access ↑</option>
		<option value="`checked`">Checked ↓</option>
		<option value="`checked` DESC">Checked ↑</option>
	</select>
	<input type="submit" value="Sort" name="Sub_Sort">
</form>

</div>

<div id="article">
	<table id="table" border="0" cellpadding="5">
	<tr>
		<td width="0"><td>
		<td width="150"><center><b>Name</b></center></td>
		<td width="180"><center><b>Time</b></center></td>
		<td width="100"><center><b>Author</b></center></td>
		<td width="100"><center><b>Access</b></center></td>
		<td width="100"><center><b>Checked</b></center></td>
		<td width="100"><center><b>See on site</b></center></td>
		
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
				<td width=\"150\"><a href=\"/edit//?id=".$data[$i]['id']."\" title=\"Click to edit\">".$data[$i]['name']."</a></td>
				<td width=\"180\">".$data[$i]['time']."</td>
				<td width=\"100\">".$data[$i]['author']."</td>
				<td width=\"100\"><a href=\"/controlpanel/access/?id=".$data[$i]['id']."\">".$data[$i]['access']."</a></td>
				<td width=\"100\"><a href=\"/controlpanel/checked/?id=".$data[$i]['id']."\">".$data[$i]['checked' ]."</a></td>";
				if ($data[$i]['checked']=="Yes")
					echo"
				<td width=\"100\"><a href=\"/article/".$data[$i]['name']."\">Show</a></td>";
				else echo "<td width=\"100\"></td>";
			echo "</tr>
			</table>
			";
	}
	echo "<table id = \"panel\" border=\"0\" cellpadding=\"5px\">
			<tr>
			<td width=\"100\"><input type=\"submit\" value=\"Delete\" name=\"delete\"/></td>
			<td width=\"120\"> 
			<select name=\"access\">
				<option value=\"1\">Admin only</option>
				<option value=\"3\">Registred only</option>
				<option value=\"4\">All</option>
			</select>
			<input type=\"submit\" value=\"Change access\" name=\"setaccess\" />
			</td>
			<td width=\"120\">
			<select name=\"checked\">
				<option value=\"1\">Yes</option>
				<option value=\"0\">No</option>
			</select>
			<input type=\"submit\" value=\"Change status\" name=\"setchecked\" />
			</td>
			<tr>
		</table>
	</form>";
	echo "<div id = \"num_pages\">";
	if(isset($_GET['page']))
		$page = $_GET['page'];
	else $page = 1;
	if (isset($_POST['sort']))
		$order = $_POST['sort'];
	else if (isset($_GET['order']))
		$order = $_GET['order'];
	else $order = "id";
	if ($pages >= 1)
	{
		for ($i = 1; $i <= $pages; $i++)
			echo ($i == $page) ? '<a id = "cur" href="/controlpanel/articles/?page='.$i.'&order='.$order.'">'.$i.'</a>':'<a href="/controlpanel/articles/?page='.$i.'&order='.$order.'">'.$i.'</a>';
	}
	echo "</div>";
	
?>
