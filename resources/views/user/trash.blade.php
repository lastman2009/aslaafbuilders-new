@foreach($users as $user)

<tr>
	<td>
		{{$user->first_name}}
		<a href="/user/retrieve/{{$user->id}}"><button>Retrieve</button></a>
	</td>
</tr>

@endforeach