<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
		<form action="/propertyTypeUpdate/{{$propertyType->id}}" method="post">
		{{ csrf_field() }}
			<input type="text" name="name" value="{{$propertyType->name}}">
			<button>update</button>
		</form>
</body>
</html>