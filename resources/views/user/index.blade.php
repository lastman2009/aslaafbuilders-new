@foreach($users as $user)
    <tr>
        <td>{{ $user->first_name }}</td>
        <td>
            <form action="/users/{{$user->id}}" method="POST">
             <input name="_method" type="hidden" value="DELETE">
             {{ csrf_field()}}
            <button>delete</button>
            </form>
            
            <td>
                <form action="users/{{$user->id}}/edit">
                    <button>edit me</button>
                </form>

            </td>
        </td>
    </tr>
@endforeach

<form action="/assignCharacterRole" method="POST">
         <!-- <input name="_method" type="hidden" value="DELETE"> -->
             {{ csrf_field()}}
        
        @foreach($charactertypes as $charactertype)
       <input type="checkbox" name="{{$charactertype->id}}"> {{ $charactertype->name}}
        @endforeach
                    <button>edit me</button>


</form>
