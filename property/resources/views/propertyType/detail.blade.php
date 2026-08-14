<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<h1>Detail for {{$name}}</h1>
			<div class="col-md-3">
				<ul>
					@foreach($details as $detail)
					<li>{{$detail->name}}</li>
					<a href="/typeDetailDelete/{{$detail->id}}"><button class="btn btn-danger">Delete</button></a>
					<!-- <a href="/typeDetailEdit/{{$detail->id}}"><button class="btn btn-info">Edit</button></a> -->
					@endforeach
				</ul>
			</div>
		</div>
		<div class="row">
			<h1>Reterive  {{$name}} detial</h1>
			<div class="col-md-3">
				<ul>
					@foreach($deletedetails as $detail)
					<li>{{$detail->name}}</li>
					<a href="/typeDetailReterive/{{$detail->id}}"><button class="btn btn-danger">Reterive</button></a>
					
					@endforeach
				</ul>
			</div>
			
		</div>

	</div>
</body>
</html>