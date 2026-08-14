@foreach($towns as $town)
@if($town->id == '603')
	<option data-icon="fa fa-map-marker"  value="{{ $town->id }}" <?php if($town->id == 603){ echo "selected"; } ?> >{{$town->name}}</option>
@endif	
@endforeach
	