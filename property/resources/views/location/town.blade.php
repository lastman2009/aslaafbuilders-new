@foreach($towns as $town)
<?php print_r($town) ?>
	<option data-icon="fa fa-map-marker"  value="{{ $town->id }}" >{{$town->name}}</option>
@endforeach
	