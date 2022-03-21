<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
</head>
<body>
<form action="{{ url('register')}}" method = "post">
@csrf
Name <input type="text" name="tname"><br>
<button type="submit">Register</button>
</form>
</div>
</body>