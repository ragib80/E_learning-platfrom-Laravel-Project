<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
<h2>Log in</h2>
	<form method="post">
	@csrf
	<table>
		<tr>
			<td>id</td>
			<td><input type="text" name="uid">
			</td>
		</tr>
		<tr>
			<td>password</td>
			<td><input type="text" name="upass" required>
			</td>
		</tr>
       <tr>
			<td></td>
			<td><input type="submit" name="Submit" value="submit"></td>
		</tr>
	</table>
	</form>
</body>
</html>
