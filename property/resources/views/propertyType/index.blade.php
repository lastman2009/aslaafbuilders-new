<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body>
@if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
@endif
@if (session('alert'))
    <div class="alert alert-success">
        {{ session('alert') }}
    </div>
@endif

<div class="container">
<div>
	<h1>ADD PROPERTY TYPE</h1>
</div>
	<div class="row">
		<div class="col-sm-offset-6 col-md-offset-0">
			
	<form action="addPropertyType" method="post" class="form-group">
		{{ csrf_field() }}
		<div class="col-sm-offset-3 col-md-offset-0">
		<select name="parent" id="" class="form-control">
			<option value="">Select</option>
			@foreach($propertyTypes as  $propertyType)
			<option value="{{$propertyType->id}}">{{ $propertyType->name }}</option>
			@endforeach
		</select>
		<br>
		</div>
		<label for="">Enter Name</label>
		<input type="text" name="name" class="form-control" required="">
		<button class="btn btn-success">Add</button>
	</form>
		</div>
	</div>
	<div class="row">
		<div class="col-sm-offset-6 col-md-offset-0">
			

	<ul>
		@foreach($propertyTypes as $propertyType)
		<li>
			<h4>
				{{$propertyType->name}}
			<a href="propertyTypeDelete/{{$propertyType->id}}"><button class="btn btn-danger">Delete</button></a>
			<a href="propertyTypeEdit/{{$propertyType->id}}"><button class="btn btn-info">Edit</button></a>
			<a href="propertyTypeDetail/{{$propertyType->id}}"><button class="btn btn-primary">Detail</button></a>

			</h4>
		</li>
		@endforeach
	</ul>
		</div>
	</div>

	<div class="row">
		
		<div>
			<h1>Trashed Types</h1>
			<ul>
				@foreach($trashedPropertyTypes as $trashedPropertyType)
				<li>
					{{$trashedPropertyType->name}}		
					<a href="propertyTypeUntrash/{{$trashedPropertyType->id}}"><button class="btn btn-primary">Reterive Back</button></a>

				</li>
				@endforeach
			</ul>
		</div>
	</div>
</div>
</body>
</html>