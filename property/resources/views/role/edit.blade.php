
<form action="/roles/{{$role->id}}" method="post">
	{{csrf_field()}}
	 <input name="_method" type="hidden" value="PATCH">
	<input type="text" name="name" value="{{$role->name}}">
	<button>update</button>
</form>