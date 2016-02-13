<form method="post" action="">
<table border="0" cellpadding="5">
	<tr> 
		<td width="106">Name:</td> 
		<td width="288"> <input type="text" name="name" required value="<?php echo $data['name']?>"/> </td>
	</tr>
	<tr>
		<td>Avatar:</td>
		<td> <input type="text" name="avatar" value="<?php echo $data['avatar']?>"/>
		</td>
	</tr>
	<tr>
		<td>Sex:</td>
		<td> 
		<select name="sex" size = 2 class="width"> 
		<option value="male" 
		<?php if($data['sex']=="male") echo "selected"; ?>
		>Male</option> 
		<option value="female"<?php if($data['sex']=="female") echo "selected"; ?>>Female</option> 
		</select>
		</td>
	</tr>
	<tr>
		<td>Access to e-mail:</td>
		<td>
		<select name="mail_access" size = 2 class="width"> 
		<option value="0" 
		<?php if($data['mail_access']==0) echo "selected"; ?>
		>Nobody</option> 
		<option value="1" 
		<?php if($data['mail_access']==1) echo "selected"; ?>
		>All</option>  
		</select>
		</td>
	</tr>
	<tr>
		<td>Age:</td>
		<td> <input type="text" name="age" required value="<?php echo $data['age']?>"/>
		</td>
	</tr>
	<tr>
		<td> Information:</td>
		<td> <textarea name="info" cols="80" rows="15" id="textarea"><?php echo $data['info']?></textarea><br></td>
	</tr>
	
	<tr><td></td><td>
	<input type="submit" name="submit" value="Edit"/></td></tr>
	</table>
</form>