<!DOCTYPE html>
<html>
<head>
	<title>Contact</title>
</head>
<body>
<h2>Contact</h2>
	<form method="post">
	@csrf
	<table>
		<tr>
			<td>id</td>
			<td><input type="text" name="uid"></td>
		</tr>
		<tr>
			<td>message</td>
			<td><input type="text" name="msg"></td>
		</tr>
       <tr>
			<td></td>
			<td><input type="submit" name="Submit" value="submit"></td>
		</tr>
	</table>
	</form>
</body>
</html>