<form action="/updateInterest/{{$interest->id}}" method="post">

{{ csrf_field() }}
	<input type="text" name="name" value="{{$interest->name}}">
	<button>update</button>
</form>