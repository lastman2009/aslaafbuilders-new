<div class="container-fluid">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="col-md-9 no-padding">
					<div class="top-locations col-md-12 col-sm-12 no-padding">
						<h3>TOP LOCATIONS OF SALES HOUSES</h3>
						@if($rentData['lahore'] != null )
						<div class="col-md-4 col-sm-4">
							<h4>Lahore House</h4>
							<ul class="list-unstyled">
								@foreach($rentData['lahore'] as $town)
								<li><a href="/property/lahore-rent/{{$town->town_city_id}}/{{str_slug($town->name)}}/{{$town->townid}}">Houses For Rent in {{$town->name}}</a> </li>
								
								@endforeach
							</ul>
							@endif
						</div>
						<div class="col-md-4 col-sm-4">
							@if($rentData['karachi'] != null )
							<h4>Karachi House</h4>
							<ul class="list-unstyled">
							@foreach($rentData['karachi'] as $town)
								<li><a href="/property/karachi-rent/{{$town->town_city_id}}/{{str_slug($town->name)}}/{{$town->townid}}">Houses For Rent in {{$town->name}}</a> </li>										
							@endforeach
							</ul>
							@endif
						</div>
						<div class="col-md-4 col-sm-4">
							@if($rentData['islamabad'] != null )
							<h4>Islamabad House</h4>
							<ul class="list-unstyled">
								 @foreach($rentData['islamabad'] as $town)
								<li>
									<a href="/property/islamabad-rent/{{$town->town_city_id}}/{{str_slug($town->name)}}/{{$town->townid}}">Houses For Rent in {{$town->name}}</a> 
								</li>												
								@endforeach
							</ul>
							@endif
						</div>
					</div>

					<div class="top-locations col-md-12 col-sm-12 no-padding">
						<h3>TOP LOCATIONS FOR SALES OF PLOTS</h3>
						@if($plotData['lahore'] != null )

						<div class="col-md-4 col-sm-4">
							<h4>Lahore Plots</h4>
							<ul class="list-unstyled">
								 @foreach($plotData['lahore'] as $town)
								<li><a href="/property/lahore-plots/{{$town->town_city_id}}/{{str_slug($town->name)}}/{{$town->townid}}">Plots For Sale in {{$town->name}}</a> </li>
								
								@endforeach
                    		</ul>
                			@endif
						</div>
						<div class="col-md-4 col-sm-4">
							 @if($plotData['karachi'] != null )
							<h4>Karachi Plots</h4>
							<ul class="list-unstyled">
								@foreach($plotData['karachi'] as $town)
								<li><a href="/property/karachi-plots/{{$town->town_city_id}}/{{str_slug($town->name)}}/{{$town->townid}}">Plots For Sale in {{$town->name}}</a> </li>
								
							@endforeach
                                </ul>
                            @endif
						</div>
						<div class="col-md-4 col-sm-4">
							 @if($plotData['islamabad'] != null )
							<h4>Islamabad Plots</h4>
							<ul class="list-unstyled">
								 @foreach($plotData['islamabad'] as $town)
								<li><a href="/property/islamabad-plots/{{$town->town_city_id}}/{{str_slug($town->name)}}/{{$town->townid}}">Plots For Sale in {{$town->name}}</a> </li>
								
							@endforeach
                                </ul>
                            @endif
						</div>
					</div>

					<div class="top-locations col-md-12 col-sm-12 no-padding">
						<h3>TOP LOCATIONS FOR RENT OF HOUSES</h3>
						<div class="col-md-4 col-sm-4">
							<h4>Lahore</h4>
							<ul class="list-unstyled">
								 @foreach($townData['lahore'] as $town)
								    <li><a href="/property/lahore/{{$town->town_city_id}}/{{str_slug($town->name)}}/{{$town->townid}}">Houses For Sale in {{$town->name}}</a> </li>
								
								@endforeach
							</ul>
						</div>
						<div class="col-md-4 col-sm-4">
							<h4>Karachi </h4>
							<ul class="list-unstyled">
								 @foreach($townData['karachi'] as $town)
								<li><a  href="/property/lahore/{{$town->town_city_id}}/{{str_slug($town->name)}}/{{$town->townid}}">Houses For Sale in {{$town->name}}</a> </li>
								@endforeach
							</ul>
						</div>
						<div class="col-md-4 col-sm-4">
							<h4>Islamabad </h4>
							<ul class="list-unstyled">
								 @foreach($townData['islamabad'] as $town)
								<li><a href="/property/islamabad/{{$town->town_city_id}}/{{str_slug($town->name)}}/{{$town->townid}}">Houses For Sale in {{$town->name}}</a> </li>
								@endforeach
							</ul>
						</div>
					</div> 
				</div>
				@include("partials.blog")
			</div>
		</div>
	</div>
</div>