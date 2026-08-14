<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<form action="/interest" method="post">
		{{ csrf_field()}}
		<input type="text" name="name">
	<button>ass</button>

	</form>
	
<h1>new</h1>
	<ul>
	@foreach($interests as $interest)
		
		<li>{{$interest->name}}
		<a href="/interest/{{$interest->id}}"><button>delete</button></a>
		<a href="/interest/edit/{{$interest->id}}"><button>edit</button></a>

		</li>	
		@endforeach
	</ul>


<h1>Trash</h1>

<ul>
	@foreach($interestsdelete as $interest)
		
		<li>{{$interest->name}}
		<a href="/reterive/{{$interest->id}}"><button>Reterive</button></a>
		

		</li>	
		@endforeach
	</ul>



	<!-- //// -->
	<h1>new</h1>
	<ul>
	<form action="/assignInterest" method="post">
		{{ csrf_field()}}
	@foreach($interests as $interest)
		
		<li>{{$interest->name}}
		<?php 
			if(in_array($interest->id, $selected))
			{
		?>	
		<input type="checkbox" name="interests[]" value="{{$interest->id}}" checked>

		<?php 	
			}else{

		?>
		<input type="checkbox" name="interests[]" value="{{$interest->id}}">
		<?php
			}
		?>


		</li>	
		@endforeach
		<button>assign</button>
	</form>
	</ul>
</body>
</html>
