<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>reset</title>
</head>
<body>
	
	
	<h1>{{$token}}</h1>
		<h1>{{$user->first_name}}</h1>
		<a href="{{ url('/reset_password/' . $user->email . '/' . $token) }}">click me</a>
</body>
</html>