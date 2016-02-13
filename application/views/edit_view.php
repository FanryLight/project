<form method="post" action="">
	<table border="0" cellpadding="5">
		<tr> 
			<td width="106">Name:</td> 
			<td width="288"> <input type="text" name="name" required value="<?php echo $data['name']?>"/> </td>
		</tr>
		<tr>
			<td>Icon:</td>
			<td> <input type="text" name="icon" required value="<?php echo $data['icon']?>"/>
			</td>
		</tr>
		<tr>
			<td>Tag:</td>
			<td> 
			<select name="tag" size = 2 class="width"> 
			<option value="dragon" 
			<?php if($data['tag']=="dragon") echo "selected"; ?>
			>Dragon</option> 
			<option value="viking"<?php if($data['tag']=="viking") echo "selected"; ?>>Viking</option> 
			</select>
			</td>
		</tr>
		<tr>
			<td>Access:</td>
			<td>
			<select name="access" size = 3 class="width"> 
			<option value="1" 
			<?php if($data['access']==1) echo "selected"; ?>
			>Admin only</option> 
			<option value="2" 
			<?php if($data['access']==2) echo "selected"; ?>
			>Registred only</option>  
			<option value="3" 
			<?php if($data['access']==3) echo "selected"; ?>
			>All</option> 
			</select>
			</td>
		</tr>
		<tr>
			<td>Checked:</td>
			<td> 
			<select name="checked" size = 2 class="width"> 
			<option value="1" 
			<?php if($data['checked']==1) echo "selected"; ?>
			>Yes</option> 
			<option value="0" 
			<?php if($data['checked']==0) echo "selected"; ?>
			>No</option>  
			</select>
			</td>
		</tr>
		<tr>
			<td>Stats image:</td>
			<td> <input type="text" name="stats" required value="<?php echo $data['stats']?>"/>
			</td>
		</tr>
		<tr>
			<td> Text:</td>
			<td> <textarea name="text" cols="80" rows="15" required id="textarea"><?php echo $data['text']?></textarea><br></td>
		</tr>
		<tr>
			<td>Pair item:</td>
			<td> <input type="text" name="pair_item" required value="<?php echo $data['pair_item']?>"/>
			</td>
		</tr>
		
		<tr><td></td><td>
		<input type="submit" name="submit" value="Submit"/></td></tr>
	</table>
</form>