<form action="/users/{{$user->id}}" method="POST">
         <input name="_method" type="hidden" value="DELETE">
             {{ csrf_field()}}
    
    <input type="checkbox" name="name1">
    <input type="checkbox" name="name2">
    <input type="checkbox" name="name3">
                    <button>edit me</button>


</form>