




<tr>
	
@foreach($roles as $role)

 Itertaion ==={{ $loop->iteration }} / count  ==={{ $loop->count }}
(indexx ==={{ $loop->index }} / remaining ==={{ $loop->remaining }})

( first === {{ $loop->first }} / last  ==={{ $loop->last }})
(depth  === {{ $loop->depth }} /  parent === {{ $loop->parent }})



	<td>{{$role->name}}</td>
	<td>
            <form action="/roles/{{$role->id}}" method="POST">
             <input name="_method" type="hidden" value="DELETE">
             {{ csrf_field()}}
            <button>delete</button>
            </form>
            
            <td>
                <form action="roles/{{$role->id}}/edit">
                    <button>edit me</button>
                </form>

            </td>

	
	<br>
	@endforeach
</tr>
