@php
$title = "Index Search";
@endphp
@include("includes.title")


<!-- banner-wraper starts -->
<div class="banner-wraper"> 

<style type="text/css">
	#chartdiv1, #chartdiv2, #chartdiv3 {
		width: 100%;
		height: 500px;
		float: left;
		margin: 30px 0;
	}
</style>
  <!-- slider ends -->


  <div class="banner price-index-banner price-index-search">
    <div class="container">
      <div class="row">
        <div class="banner-contents col-md-10">
          <div class="col-md-4 col-sm-4 padding-left padding-right">
            <div class="banner-inner-contents-left price-index-left">
              <h4>Filter By</h4>
              </div>
            </div>
          	<div class="col-md-8 col-sm-8 padding-left padding-right">
					<div class="banner-inner-contents basic-srch price-index col-md-12">
						<div class="tab-content col-md-12 srch-content">
							<form class="navbar-form navbar-left">
								{{ csrf_field()}}
								<div class="col-md-12 srch-flds">
									<div class="col-md-5 col-sm-6 form-select price-index-dropdown">
										<select class="form-control selectpicker" name="city" title="All Cities" id="city">
											@foreach($cities as $city) 
											<option value="{{ $city->id }}">{{$city->name}}
											</option> 
											@endforeach
										</select>
									</div>
									<div class="col-md-5 col-sm-6 form-select price-index-dropdown">
										<select name="town_id" id="town" class="selectpicker townclass" data-style="form-control btn-font btn-default btn-outline" title="--Nothing Selected--">
										
										</select>
									</div>
									
									<div class="col-md-2 btn-price-index text-right padding-right padding-left clearfix">
										<button id="theform" class="btn btn-default btn-style">Submit</button>
									</div>
								</div>
							</form>
						</div>
					</div>
				</div>
        	</div>
        </div>
    </div>
   </div>
  </div>

    
<!-- Main Starts -->
<main class="main-section index-page"> 

		<div class="top-margin-index">
			<section class="all-price-index">
				<div class="container">
					<div class="row">
						<div class="col-md-12">		
							<div class="all-price-index-portion">
								<h2>{{Request::segment(4)}} {{Request::segment(2)}} Price Indices</h2>
							</div>
						</div>
						<div class="col-md-12">
						<ul class="nav nav-tabs nav-justified">
							<li class="active"><a data-toggle="tab" href="#home">Residential</a></li>
							<li><a data-toggle="tab" href="#menu1">Plots</a></li>
							<li><a data-toggle="tab" href="#menu2">Commercial</a></li>
						</ul>

						<div class="tab-content">
							<div id="home" class="tab-pane fade in active">
								<div id="chartdiv1">
									
								</div>
							<div class="row">
						<div class="col-md-12">		
							<div class="top-city-index-portion">
								<h2>{{Request::segment(4)}} {{Request::segment(2)}} Price Indices</h2>
							</div>
						</div>
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
										  {{-- <th>Title</th> --}}
										  <th class="text-center">Index</th>
										  <th class="text-center">Price/FT2</th>
										  {{-- <th>Price</th> --}}
										  <th class="text-center">Houses</th>
										  {{-- <th>Plots</th> --}}
										  {{-- <th>Commercial</th> --}}
										</tr>
									</thead>
									<tbody>
										@foreach($houseCityIndexes as $index)
										<tr>
										  {{-- <td>Lahore DHA Defence, 5 Marla</td> --}}
										  <td class="text-center">{{$index->index}}</td>
										  <td class="text-center">{{$index->avg_price_ftsq}}</td>
										  {{-- <td>15,242,387</td> --}}
										  <td class="text-center @if($index->avg_price_difference < 0) red-index @elseif($index->avg_price_difference == 0) default @else green-index @endif">
											@if($index->avg_price_difference < 0) {{$index->avg_price_difference}}%  @elseif($index->avg_price_difference == 0) - @else +{{$index->avg_price_difference}}% @endif
										</td>
										  {{-- <td class="red-index">-1.46%</td> --}}
										  {{-- <td class="green-index">+1.46%</td> --}}
										</tr>
										@endforeach
									</tbody>
								</table>
							  </div>
						</div>
					</div>

							</div>
							<div id="menu1" class="tab-pane fade">
								<div id="chartdiv2"></div>
										<div class="row">
						<div class="col-md-12">		
							<div class="top-city-index-portion">
								<h2>{{Request::segment(4)}} {{Request::segment(2)}} Price Indices</h2>
							</div>
						</div>
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
										  {{-- <th>Title</th> --}}
										  <th class="text-center">Index</th>
										  <th class="text-center">Price/FT2</th>
										  {{-- <th>Price</th> --}}
										  <th class="text-center">Plots</th>
										  {{-- <th>Plots</th> --}}
										  {{-- <th>Commercial</th> --}}
										</tr>
									</thead>
									<tbody>
										@foreach($plotsCityIndexes as $index)
										<tr>
										  {{-- <td>Lahore DHA Defence, 5 Marla</td> --}}
										  <td class="text-center">{{$index->index}}</td>
										  <td class="text-center">{{$index->avg_price_ftsq}}</td>
										  {{-- <td>15,242,387</td> --}}
										  <td class="text-center @if($index->avg_price_difference < 0) red-index @elseif($index->avg_price_difference == 0) default @else green-index @endif">
											@if($index->avg_price_difference < 0) {{$index->avg_price_difference}}%  @elseif($index->avg_price_difference == 0) - @else +{{$index->avg_price_difference}}% @endif
										  	</td>
										  {{-- <td class="red-index">-1.46%</td> --}}
										  {{-- <td class="green-index">+1.46%</td> --}}
										</tr>
										@endforeach
									</tbody>
								</table>
							  </div>
						</div>
					</div>

					</div>
					<div id="menu2" class="tab-pane fade">
						<div id="chartdiv3"></div>
								<div class="row">
									<div class="col-md-12">		
										<div class="top-city-index-portion">
											<h2>{{Request::segment(4)}} {{Request::segment(2)}} Price Indices</h2>
										</div>
									</div>
									<div class="col-md-12">
										<div class="table-responsive">
											<table class="table table-bordered">
												<thead>
													<tr>
													  {{-- <th>Title</th> --}}
													  <th class="text-center">Index</th>
													  <th class="text-center">Price/FT2</th>
													  {{-- <th>Price</th> --}}
													  <th class="text-center">Commercial</th>
													  {{-- <th>Plots</th> --}}
													  {{-- <th>Commercial</th> --}}
													</tr>
												</thead>
												<tbody>
													@foreach($commercialCityIndexes as $index)
													<tr>
													  {{-- <td>Lahore DHA Defence, 5 Marla</td> --}}
													  <td class="text-center">{{$index->index}}</td>
													  <td class="text-center">{{$index->avg_price_ftsq}}</td>
													  {{-- <td>15,242,387</td> --}}
													  <td class="text-center @if($index->avg_price_difference < 0) red-index @elseif($index->avg_price_difference == 0) default @else green-index @endif">
														@if($index->avg_price_difference < 0) {{$index->avg_price_difference}}%  @elseif($index->avg_price_difference == 0) - @else +{{$index->avg_price_difference}}% @endif
													</td>
													  {{-- <td class="red-index">-1.46%</td> --}}
													  {{-- <td class="green-index">+1.46%</td> --}}
													</tr>
													@endforeach
												</tbody>
											</table>
										  </div>
									</div>
								</div>
							</div>
						</div>
					</div>
					</div>
				</div>
			</section>			
		</div>
</main>
	<!-- Main Starts -->
@include('includes.footer')
	<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
<script src="https://www.amcharts.com/lib/3/serial.js"></script>
<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
<script type="text/javascript">

	$(document).ready(function(){
		var chart = AmCharts.makeChart("chartdiv1", {
			"type": "serial",
			"theme": "dark",
			"marginRight": 40,
			"marginLeft": 40,
			"autoMarginOffset": 20,
			"mouseWheelZoomEnabled":true,
			"dataDateFormat": "YYYY-MM-DD",
			"valueAxes": [{
				"id": "v1",
				"axisAlpha": 0,
				"position": "left",
				"ignoreAxisWidth":true
			}],
			"trendLines": [{
				"finalDate": "2017-01-09 12",
				"finalValue": 100,
				"initialDate": "2017-12-31 12",
				"initialValue": 0,
				"lineColor": "#000"
			}, {
				"finalDate": "2017-01-22 09",
				"finalValue": 100,
				"initialDate": "2017-01-17 09",
				"initialValue": 0,
				"lineColor": "#000"
			}],
			"balloon": {
				"borderThickness": 1,
				"shadowAlpha": 0
			},
			"graphs": [{
				"id": "g1",
				"balloon":{
					"drop":true,
					"adjustBorderColor":false,
					"color":"#ffffff"
				},
				"bullet": "round",
				"bulletBorderAlpha": 1,
				"bulletColor": "#FFFFFF",
				"bulletSize": 6,
				"hideBulletsCount": 50,
				"lineThickness": 2,
				"title": "red line",
				"useLineColorForBulletBorder": true,
				"valueField": "value",
				"balloonText": ""
			}],
			"chartScrollbar": {
				"graph": "g1",
				"oppositeAxis":false,
				"offset":30,
				"scrollbarHeight": 80,
				"backgroundAlpha": 0,
				"selectedBackgroundAlpha": 0.1,
				"selectedBackgroundColor": "#888888",
				"graphFillAlpha": 0,
				"graphLineAlpha": 0.5,
				"selectedGraphFillAlpha": 0,
				"selectedGraphLineAlpha": 1,
				"autoGridCount":true,
				"color":"#AAAAAA"
			},
			"chartCursor": {
				"pan": true,
				"valueLineEnabled": true,
				"valueLineBalloonEnabled": true,
				"cursorAlpha":1,
				"cursorColor":"#258cbb",
				"limitToGraph":"g1",
				"valueLineAlpha":0.2,
				"valueZoomable":true
			},
			"valueScrollbar":{
				"oppositeAxis":false,
				"offset":50,
				"scrollbarHeight":10
			},
			"categoryField": "date",
			"categoryAxis": {
				"parseDates": true,
				"dashLength": 1,
				"minorGridEnabled": false
			},
			"dataProvider": [
			<?php 
			if(!$houseCityIndexes->isEmpty()){	
				$i = 0;
				foreach($houseCityIndexes as $index){

					?>
					{
						"date": "<?= $index->year.'-'.sprintf("%02d", $index->month).'-'.sprintf("%02d", $index->day); ?>",
						"value": <?= $index->index ?>
					}
					<?php
					$i++;
					if(count($houseCityIndexes) != $i)	
						echo ",";
				}
			}
			else
			{
				?>
				{
					"date": "<?= date("Y-m-d"); ?>",
					"value": 100
				}

				<?php
			} 
			?>
			]
		});

		chart.addListener("rendered", zoomChart);

		zoomChart();

		function zoomChart() {
			chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
		}
	});

</script>
<script type="text/javascript">

	$(document).ready(function(){
		var chart = AmCharts.makeChart("chartdiv2", {
			"type": "serial",
			"theme": "dark",
			"marginRight": 40,
			"marginLeft": 40,
			"autoMarginOffset": 20,
			"mouseWheelZoomEnabled":true,
			"dataDateFormat": "YYYY-MM-DD",
			"valueAxes": [{
				"id": "v1",
				"axisAlpha": 0,
				"position": "left",
				"ignoreAxisWidth":true
			}],
			"balloon": {
				"borderThickness": 1,
				"shadowAlpha": 0
			},
			"graphs": [{
				"id": "g1",
				"balloon":{
					"drop":true,
					"adjustBorderColor":false,
					"color":"#ffffff"
				},
				"bullet": "round",
				"bulletBorderAlpha": 1,
				"bulletColor": "#FFFFFF",
				"bulletSize": 6,
				"hideBulletsCount": 50,
				"lineThickness": 2,
				"title": "red line",
				"useLineColorForBulletBorder": true,
				"valueField": "value",
				"balloonText": ""
			}],
			"chartScrollbar": {
				"graph": "g1",
				"oppositeAxis":false,
				"offset":30,
				"scrollbarHeight": 80,
				"backgroundAlpha": 0,
				"selectedBackgroundAlpha": 0.1,
				"selectedBackgroundColor": "#888888",
				"graphFillAlpha": 0,
				"graphLineAlpha": 0.5,
				"selectedGraphFillAlpha": 0,
				"selectedGraphLineAlpha": 1,
				"autoGridCount":true,
				"color":"#AAAAAA"
			},
			"chartCursor": {
				"pan": true,
				"valueLineEnabled": true,
				"valueLineBalloonEnabled": true,
				"cursorAlpha":1,
				"cursorColor":"#258cbb",
				"limitToGraph":"g1",
				"valueLineAlpha":0.2,
				"valueZoomable":true
			},
			"valueScrollbar":{
				"oppositeAxis":false,
				"offset":50,
				"scrollbarHeight":10
			},
			"categoryField": "date",
			"categoryAxis": {
				"parseDates": true,
				"dashLength": 1,
				"minorGridEnabled": false
			},
			"dataProvider": [<?php 
				if(!$plotsCityIndexes->isEmpty()){	
					$i = 0;
					foreach($plotsCityIndexes as $index){

						?>
						{
							"date": "<?= $index->year.'-'.sprintf("%02d", $index->month).'-'.sprintf("%02d", $index->day); ?>",
							"value": <?= $index->index ?>
						}
						<?php
						$i++;
						if(count($plotsCityIndexes) != $i)	
							echo ",";
					}
				}
				else
				{
					?>
					{
						"date": "<?= date("Y-m-d"); ?>",
						"value": 100
					}

					<?php
				} 
				?>]
			});

		chart.addListener("rendered", zoomChart);

		zoomChart();

		function zoomChart() {
			chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
		}
	});

</script>
<script type="text/javascript">

	$(document).ready(function(){
		var chart = AmCharts.makeChart("chartdiv3", {
			"type": "serial",
			"theme": "dark",
			"marginRight": 40,
			"marginLeft": 40,
			"autoMarginOffset": 20,
			"mouseWheelZoomEnabled":true,
			"dataDateFormat": "YYYY-MM-DD",
			"valueAxes": [{
				"id": "v1",
				"axisAlpha": 0,
				"position": "left",
				"ignoreAxisWidth":true
			}],
			"trendLines": [{
				"finalDate": "2013-01-09 12",
				"finalValue": 66,
				"initialDate": "2012-12-31 12",
				"initialValue": 58,
				"lineColor": "#000"
			}, {
				"finalDate": "2013-01-22 12",
				"finalValue": 90,
				"initialDate": "2013-01-17 12",
				"initialValue": 75,
				"lineColor": "#000"
			}],
			"balloon": {
				"borderThickness": 1,
				"shadowAlpha": 0
			},
			"graphs": [{
				"id": "g1",
				"balloon":{
					"drop":true,
					"adjustBorderColor":false,
					"color":"#ffffff"
				},
				"bullet": "round",
				"bulletBorderAlpha": 1,
				"bulletColor": "#FFFFFF",
				"bulletSize": 6,
				"hideBulletsCount": 50,
				"lineThickness": 2,
				"title": "red line",
				"useLineColorForBulletBorder": true,
				"valueField": "value",
				"balloonText": ""
			}],
			"chartScrollbar": {
				"graph": "g1",
				"oppositeAxis":false,
				"offset":30,
				"scrollbarHeight": 80,
				"backgroundAlpha": 0,
				"selectedBackgroundAlpha": 0.1,
				"selectedBackgroundColor": "#888888",
				"graphFillAlpha": 0,
				"graphLineAlpha": 0.5,
				"selectedGraphFillAlpha": 0,
				"selectedGraphLineAlpha": 1,
				"autoGridCount":true,
				"color":"#AAAAAA"
			},
			"chartCursor": {
				"pan": true,
				"valueLineEnabled": true,
				"valueLineBalloonEnabled": true,
				"cursorAlpha":1,
				"cursorColor":"#258cbb",
				"limitToGraph":"g1",
				"valueLineAlpha":0.2,
				"valueZoomable":true
			},
			"valueScrollbar":{
				"oppositeAxis":false,
				"offset":50,
				"scrollbarHeight":10
			},
			"categoryField": "date",
			"categoryAxis": {
				"parseDates": true,
				"dashLength": 1,
				"minorGridEnabled": false
			},
			"dataProvider": [<?php
				if(!$commercialCityIndexes->isEmpty()){
					$i = 0;
					foreach($commercialCityIndexes as $index){

						?>
						{
							"date": "<?= $index->year.'-'.sprintf("%02d", $index->month).'-'.sprintf("%02d", $index->day); ?>",
							"value": <?= $index->index ?>
						}
						<?php
						$i++;
						if(count($commercialCityIndexes) != $i)	
							echo ",";
					}
				}
				else
				{
					?>
					{
						"date": "<?= date("Y-m-d"); ?>",
						"value": 100
					}

					<?php
				} 
				?>]
			});

		chart.addListener("rendered", zoomChart);

		zoomChart();

		function zoomChart() {
			chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
		}
	});

</script>

<script>
function loadTowns() {
id = $( '#city option:selected' ).val()
$.ajax( {
url: '/LocationCity/' + id,
type: 'POST',
datatype: 'html',
data: id,
headers: {
'X-CSRF-TOKEN': $( 'meta[name="csrf-token"]' ).attr( 'content' )
},
success: function ( json ) {

$( '#town' ).html( json );
$( '.selectpicker' ).selectpicker( 'refresh' );

}
} );
}
$( '#city' ).change( function () {

loadTowns();
} );
</script>
<script>

	function convertToSlug(Text)
	{
    return Text
        .toLowerCase()
        .replace(/ /g,'-')
        .replace(/[^\w-]+/g,'')
        .trim();
        ;
	}

    $("#theform").click(function(e){
    	e.preventDefault();
    	var _token = $("input[name='_token']").val();
    	var city_id = $("#city option:selected").val();
    	var city_name = $("#city option:selected").text()
    	var town_id = $("#town option:selected").val();
    	var town_name = $("#town option:selected").text();
    	var url = "/index/"+convertToSlug(city_name)+"/"+city_id;
    	if(town_id != ""){
    		url = url+"/"+convertToSlug(town_name)+"/"+town_id;
    	}
    	if(city_id == ""){
    		alert("Select a city to proceed");
    	}else{
    		window.location.href = url;
    	}
    }); 
</script>
