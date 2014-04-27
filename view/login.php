<?php
    echo $message;
?>
<form action="index.php" method = "post">
	<table>
		<thead>
			<tr><th colspan = 2>Login form</th></tr>
		</thead>
		<tbody>
			<tr class = "login">
				<td>UserName<td>
				<td><input type = "text" name = "user"></td>
			</tr>
			<tr class = "login">
				<td>Password<td>
				<td><input type = "password" name = "password" ></td>
			</tr>
		</tbody>
	</table>
	<input type = "submit" value = "Submit">
</form>

