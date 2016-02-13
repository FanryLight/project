<form method="post" action="">
<table border="0" cellpadding="5">
	<tr> 
		<td width="106">Name:</td> 
		<td width="288"> <input type="text" name="name" required/> </td>
	</tr>
	<tr>
		<td>Icon:</td>
		<td><input type="text" name="icon" required/></td>
	</tr>
	<tr>
		<td>Tag:</td>
		<td> 
			<select name="tag" size = 2 class="width" required> 
			<option value="dragon">Dragon</option> 
			<option value="viking">Viking</option> 
			</select>
		</td>
	</tr>
	<tr>
		<td>Access:</td>
		<td>
			<select name="access" size = 3 class="width"> 
			<option value="1" 
			>Admin only</option> 
			<option value="2" 
			>Registred only</option>  
			<option value="3" 
			>All</option> 
			</select>
		</td>
	</tr>
	<tr>
		<td>Checked:</td>
		<td> 
			<select name="checked" size = 2 class="width"> 
			<option value="1" 
			>Yes</option> 
			<option value="0" 
			>No</option>  
			</select>
		</td>
	</tr>
	<tr>
		<td>Stats image:</td>
		<td> 
			<input type="text" name="stats" required/>
		</td>
	</tr>
	<tr>
		<td> Text:</td>
		<td>
			<textarea name="text" cols="80" rows="15" required id="textarea"></textarea><br>
		</td>
	</tr>
	<tr>
		<td>Pair item:</td>
		<td> 
			<input type="text" name="pair_item" required/>
		</td>
	</tr>
	<tr>
	<td></td>
	<td>
		<input type="submit" name="submit" value="Submit"/>
		<input type="submit" name="view" value="View"/>
	</td>
	</tr>
	</table>
</form>