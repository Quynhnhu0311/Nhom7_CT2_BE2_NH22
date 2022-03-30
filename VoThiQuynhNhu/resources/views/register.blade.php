<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Title</title>
</head>
<body>
<form action="/register" method="post">
@csrf
Name <input type="text" name="tname"><br>
<button type="submit">Register</button>
</form>

<h1>Test Phuong Thuc Store</h1>
<form action="product" method="post">
@csrf
<button type="submit">Store</button>
</form>

<h1>Test Phuong Thuc Update</h1>
<form action="product/12" method="post">
<input type="hidden" name="_method" value="PUT">
@csrf
<button type="submit">Update</button>
</form>

<h1>Test Phuong Thuc Delete</h1>
<form action="product/12" method="post">
<input type="hidden" name="_method" value="DELETE">
@csrf
<button type="submit">Delete</button>
</form>
</div>
</body>
