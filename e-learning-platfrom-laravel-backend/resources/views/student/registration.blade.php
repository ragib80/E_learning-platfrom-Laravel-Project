<!DOCTYPE html>
<html>
<head>
	<title>Login Page</title>
</head>
<body>
<h2>Add an user</h2>
	<form method="post">
	@csrf
	<table>
		<tr>
			<td>id</td>
			<td><input type="text" name="uid"></td>
		</tr>
		<tr>
			<td>name</td>
			<td><input type="text" name="uuname"></td>
		</tr>
        <tr>
			<td>pass</td>
			<td><input type="text" name="pass"></td>
		</tr>
        <tr>
			<td>country</td>
			<td><input type="text" name="country"></td>
		</tr>
        <tr>
			<td>dob</td>
			<td><input type="text" name="dob"></td>
		</tr>
        <tr>
			<td>email</td>
			<td><input type="text" name="uemail"></td>
		</tr>
		<tr>
			<td></td>
			<td><input type="submit" name="Submit" value="submit"></td>
		</tr>
	</table>
	</form>
</body>
</html>