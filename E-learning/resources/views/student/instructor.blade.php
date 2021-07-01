<!DOCTYPE html>
<html>
<body>

<h1>Review of a Instructor</h1>

<form action="post">
@csrf
  <p>Please rate the instructor:</p>
  <input type="radio" id="Good" name="rate" value="Good">
  <label for="good">good</label><br>
  <input type="radio" id="better" name="rate" value="better">
  <label for="better">better</label><br>
  <input type="radio" id="best" name="rate" value="best">
  <label for="best">best</label>

  <br> 
   
  <input type="submit" value="Submit">
</form>

</body>
</html> 

