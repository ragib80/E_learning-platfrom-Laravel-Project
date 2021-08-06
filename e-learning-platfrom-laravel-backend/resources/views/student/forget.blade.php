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
			<td>Phone Number</td>
			<td><input type="text" name="phone"></td>
		</tr>
		<tr>
			<td>Email</td>
			<td><input type="text" name="email"></td>
		</tr>
        <tr>
			<td>DOB</td>
			<td><input type="text" name="DOB"></td>
		</tr>
       <tr>
			<td></td>
			<td><input type="submit" name="Submit" value="submit"></td>
		</tr>
	</table>
	</form>
</body>
</html>