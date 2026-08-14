<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
<h1>Display All</h1>
	<ul>

		@foreach($characterTypes as $characterType)
		<li>{{ $characterType->name }}  <a href="characterTypeDelete/{{$characterType->id}}"><button>Delete</button></a> <a href="characterTypeEdit/{{$characterType->id}}"><button>Edit</button></a></li>


		@endforeach
	</ul>
		 
	<h1>Add Form</h1>
		 <form action="characterTypeAdd" method="post">
		 {{ csrf_field() }}
		 	<input type="text" name="name">
		 	<button>save</button>
		 </form>



		 <h1>Trash Data</h1>
		 <ul>
		 @foreach($characterTrashDetails as $characterTrashDetail)
		 	<li>{{ $characterTrashDetail->name }} <a href="characterTypeReterive/{{$characterTrashDetail->id}}"><button>reterive</button></a></li>
		 	@endforeach
		 </ul>
</body>
</html>