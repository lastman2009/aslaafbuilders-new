

<form action="/updateUser/{{$user->id}}" method="post">

 {{ csrf_field()}}
<input type="text" name="first_name" value="{{$user->first_name}} {{$user->last_name}}">
<input type="text" name="address" value="{{$user->address}}">
<button>update me</button>

</form>