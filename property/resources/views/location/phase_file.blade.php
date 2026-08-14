@foreach($phases as $phase)

	<option value="{{ $phase->id }}" <?php if($phase->id == '746'){ echo "selected"; } ?> >{{$phase->name}}</option>
@endforeach