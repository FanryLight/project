<div id="sort">
	<form action="" method="post">
		Sort by 
		<select name="sort" >
			<option disabled></option>
			<option value="`name`">Name A-Z</option>
			<option value="`name` DESC">Name Z-A</option>
		</select>
		<input type="submit" value="Sort" name="Sub_Sort"></p>
	</form>
</div>
<div id="choose">
	<center>
	<?php
		if ($data)
		{
			$n = count($data);
			for ($i=0; $i<$n; $i++)
			{
				$name = $data[$i]['name'];
				$icon = $data[$i]['icon'];
				$var = '<li><a href = "\article/'.$name.'"><img src="/'.$icon.'"><br>'.$name.'</img></a></li>';
				echo $var;
			}
		}

	?>
	</center>
</div>