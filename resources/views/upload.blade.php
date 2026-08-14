<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="/upload_image_now" method="post" enctype="multipart/form-data">
		{{csrf_field()}}
	<input type="file" name="file">
	<button type="submit">add</button>
	</form>
</body>
</html>