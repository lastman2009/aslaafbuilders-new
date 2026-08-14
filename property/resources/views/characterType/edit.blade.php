<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Edit</title>
</head>
<body>

<h1>Edit page</h1>
	
	<form action="/characterTypeUpdate/{{$characterType->id}}" method="post">
		{{ csrf_field() }}

		<input type="text" name="name" value="{{$characterType->name}}">
		<button>Update</button>
	</form>

	<a href="/charactertype"><button>Back to main page</button></a>
</body>
</html>