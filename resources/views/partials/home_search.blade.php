<ul>
	@foreach($lists as $list)
	<li>
		{{ $list->address }}
	</li>
	@endforeach
</ul>