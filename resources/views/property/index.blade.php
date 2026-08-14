<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
</head>
<body >
	<div class="container">
		<h1 style="color:red">Property Page & Form</h1>
		<div class="row">
			<div class="col-md-3 col-sm-offset-2">
			
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" class="form-control" required>
				</div>
			
			</div>
			<div class="col-md-3 col-sm-offset-2">
			
				<div class="form-group">
					<label for="description">Description</label>
					<textarea  type="text" name="description" class="form-control" required></textarea>
				</div>
			
			</div>
			<div class="col-md-3 col-sm-offset-2">
			
				<div class="form-group">
					<label for="bed">Bed</label>
					<input type="number" name="bed" class="form-control" required>
				</div>
			
			</div>
			<div class="col-md-3 col-sm-offset-2">
		
				<div class="form-group">
					<label for="area">area</label>
					<input type="number" name="area" class="form-control" required>
				</div>
		
			</div>
			<div class="col-md-3 col-sm-offset-2">
	
				<div class="form-group">
					<label for="Area Type">Area Type</label>
					<select name="area_type" id="" required>
						<option value="">kanal</option>
						<option value="">ekar</option>

						<option value="">marla</option>

					</select>
				</div>
		
			</div>
			<div class="col-md-3 col-sm-offset-2">
			
				<div class="form-group">
					<label for="title">Title</label>
					<input type="text" name="title" class="form-control" required>
				</div>
			
			</div>
			<div class="col-md-3 col-sm-offset-2">
				<div class="form-group">
					<label for="title">Purpose	</label>
					<select name="purpose" id="" required>
						<option value="">kanal</option>
						<option value="">ekar</option>

						<option value="">marla</option>

					</select>
				</div>
			</div>
			<div class="col-md-3 col-sm-offset-2">
				<div class="form-group">
					<label for="Area Type">Area Type</label>
					<select name="area_type" id="" required>
						<option value="">Select</option>

						@foreach($propertyTypes as $propertyType)
								<optgroup label="{{ $propertyType->name}}">
								@foreach($data[$propertyType->id] as $datas)
									<option value="{{$datas->id}}">{{$datas->name}}</option>
								@endforeach
								</optgroup>
						@endforeach
							
					</select>
				</div>
			</div>
		</div>

	</div>
</body>
</html>