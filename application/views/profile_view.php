<div id = "options">
<?php 
	if (!defined('SID'))
			session_start();
	if ($_GET['name']==$_SESSION['user_name'])
	{
		$name = $_GET['name'];
		echo '<a href = "/profile/user/?name='.$name.'"><img src="/img/profile.png" class = "img" >	Profile</a>    ';
		echo '<a href = "/profile/edit"> <img src="/img/edit.png" class = "img"> Edit</a>     ';
		echo '<a href = "/profile/mymessages/?page=1"><img src="/img/message.png" class = "img">				My messages</a>     ';
	}
	else 
	{
		$name = $_GET['name'];
		echo '<a href = "/profile/user/?name='.$name.'"><img src="/img/profile.png" class = "img" >	Profile</a>    ';
		echo '<a href = "/profile/user/?name='.$name.'&act=send"><img src="/img/message.png" class = "img">Send a message</a>     ';
		
	}

?>
</div>
<div id="profile">
	<img id="image" src="<?php echo $data['avatar']; ?>">
	<table>
		<tr>
			<td>
			<b>Name:</b>
			</td>
			<td>
			<?php echo $data['name']; ?>
			</td>
		</tr>
		<tr>
			<td>
			<b>Group:</b>
			</td>
			<td>
			<?php 
			switch($data['lvl_access'])
			{
				case 1:  echo "Administrator"; break;
				case 2:  echo "Moderator"; break;
				case 3:  echo "User"; break;
			}
			 ?>
			</td>
		</tr>
		<tr>
			<td>
			<b>E-mail:</b>
			</td>
			<td>
			<?php 
			if ($_GET['name'] == $_SESSION['user_name'] or $data['mail_access'] == 1)
				echo $data['mail']; 
			else echo "No access";
			?>
			</td>
		</tr>
		<tr>
			<td>
			<b>Sex:</b>
			</td>
			<td>
			<?php echo $data['sex']; ?>
			</td>
		</tr>
		<tr>
			<td>
			<b>Age:</b>
			</td>
			<td>
			<?php echo $data['age']; ?>
			</td>
		</tr>
		<tr>
			<td>
			<b>Information:</b>
			</td>
			<td>
			<?php echo $data['info']; ?>
			</td>
		</tr>

	</table>

</div>

<?php 
	
	if (isset($_GET['act']))
	{
		if (!defined('SID'))
			session_start();
		if (!isset($_SESSION['lang']))
			$_SESSION['lang'] = "en";

		switch($_SESSION['lang'])
		{
			case "en": include("send_en.php"); break;
			case "ua": include("send_ua.php"); break;
		}
		
	}

?>




