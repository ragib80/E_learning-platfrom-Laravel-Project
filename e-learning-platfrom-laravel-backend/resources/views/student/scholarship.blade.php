<!DOCTYPE html>
<html>
<head>
	<title>Scholarship Page</title>
</head>
<body>
<h2>Application for Scholarship</h2>
	<form method="post">
	@csrf
	<table>
		<tr>
			<td>id</td>
			<td><input type="text" name="uid"></td>
		</tr>
		<tr>
			<td>name</td>
			<td><input type="text" name="uname"></td>
		</tr>
        <tr>
			<td>type</td>
			<td>
                <select name="cars" id="scholarshiptype">
                    <option value="fullscholarship">full scholarship</option>
                    <option value="poorfundscholarship">poor fund scholarship</option>
                    </select>
            </td>
		</tr>
        <tr>
			<td>message</td>
			<td><input type="text" name="msg"></td>
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