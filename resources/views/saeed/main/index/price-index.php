<?php include 'header.php' ?>

<!-- banner-wraper starts -->
<div class="banner-wraper"> 


  <!-- slider ends -->


  <div class="banner price-index-banner">
    <div class="container">
      <div class="row">
        <div class="banner-contents col-md-10">
          <div class="col-md-4 col-sm-4 padding-left padding-right">
            <div class="banner-inner-contents-left price-index-left">
              <h4>PRICE INDEX </br>SEARCH</h4>
              </div>
            </div>
            <div class="col-md-8 col-sm-8 padding-left padding-right">
              <div class="banner-inner-contents basic-srch price-index col-md-12">
                <div class="tab-content col-md-12 srch-content">
                    <form class="navbar-form navbar-left" role="search">
                      <div class="col-md-12 srch-flds">
						<div class="col-md-6 col-sm-6 price-index-check">
							<input type="checkbox" id="test1" />
							<label for="test1">Residential</label>
                        </div>
						<div class="col-md-6 col-sm-6 price-index-check">
							<input type="checkbox" id="test2" />
							<label for="test2">Commercial</label>
                        </div>
						
						<div class="col-md-6 col-sm-6 form-select price-index-dropdown">
                          <select class="form-control selectpicker" name="town" title="Town" id="radiusSelect2">
                            <option value="0"> Lahore </option>
                            <option value="1"> Karachi </option>
                            <option value="2"> Islamabad </option>
                          </select>
                        </div>
                        <div class="col-md-6 col-sm-6 form-select price-index-dropdown">
                          <select class="form-control selectpicker" name="city" title="All Cities" id="radiusSelect4">
                              <option value="20" class="tabbed">Farm Houses</option>
                              <option value="24" class="tabbed">Rooms</option>
                              <option value="25" class="tabbed">Penthouse</option>
                          </select>
                        </div>
                        <div class="col-md-12 btn-price-index text-right clearfix">
                          <button type="submit" class="btn btn-default btn-style">Submit</button>
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
								<h2>Over All Price Indexes.</h2>
							</div>
						</div>
						<div class="col-md-12">
							<div id="chart"></div>
						</div>
					</div>
				</div>
			</section>



			<section class="top-city-index">
				<div class="container">
					<div class="row">
						<div class="col-md-12">		
							<div class="top-city-index-portion">
								<h2>Top Cities Indexes.</h2>
								<div id="chartdiv"></div>
							</div>
						</div>
					</div>
				</div>
			</section>



			<div id="price-index-tab" class="container">	
				
				
				
				<ul class="nav nav-pills">
					<li class="active"><a href="">Lahore</a></li>
					<li><a href="">Karachi</a></li>
					<li><a href="">Islamabad</a></li>
					<li><a href="">Rawalpindi</a></li>
					<li><a href="">Multan</a></li>
					<li class="dropdown">
						<button class="btn all-city-index dropdown-toggle" type="button" data-toggle="dropdown">More
						<span class="caret"></span></button>
						<ul class="dropdown-menu">
							<li><a href="">City 1</a></li>
							<li><a href="">City 2</a></li>
							<li><a href="">City 3</a></li>
						</ul>
					</li>
				</ul>

				<div class="tab-content clearfix">
					<div class="tab-pane active">

						<div class="col-md-12 city-index-col padding-left"> 
							<div class="col-md-4 city-index-list padding-right">
								<ul class="list-unstyled">
									<li><a href=""><span class="label-text">DHA</span></a> <a href=""><span class="value pull-right">59</span></a></li>
									<li><a href=""><span class="label-text">Bahria Town</span></a> <a href=""><span class="value pull-right">39</span></a></li>
									<li><a href=""><span class="label-text">Askari</span></a> <a href=""><span class="value pull-right">76</span></a></li>
									<li><a href=""><span class="label-text">DHA</span></a> <a href=""><span class="value pull-right">59</span></a></li>
									<li><a href=""><span class="label-text">Bahria Town</span></a> <a href=""><span class="value pull-right">39</span></a></li>
									<li><a href=""><span class="label-text">Askari</span></a> <a href=""><span class="value pull-right">76</span></a></li>
								</ul>
							</div>
							
							<div class="col-md-4 city-index-list padding-right">
								<ul class="list-unstyled">
									<li><a href=""><span class="label-text">DHA</span></a> <a href=""><span class="value pull-right">59</span></a></li>
									<li><a href=""><span class="label-text">Bahria Town</span></a> <a href=""><span class="value pull-right">39</span></a></li>
									<li><a href=""><span class="label-text">Askari</span></a> <a href=""><span class="value pull-right">76</span></a></li>
									<li><a href=""><span class="label-text">DHA</span></a> <a href=""><span class="value pull-right">59</span></a></li>
									<li><a href=""><span class="label-text">Bahria Town</span></a> <a href=""><span class="value pull-right">39</span></a></li>
									<li><a href=""><span class="label-text">Askari</span></a> <a href=""><span class="value pull-right">76</span></a></li>
								</ul>
							</div>
							
							<div class="col-md-4 city-index-list padding-right">
								<ul class="list-unstyled">
									<li><a href=""><span class="label-text">DHA</span></a> <a href=""><span class="value pull-right">59</span></a></li>
									<li><a href=""><span class="label-text">Bahria Town</span></a> <a href=""><span class="value pull-right">39</span></a></li>
									<li><a href=""><span class="label-text">Askari</span></a> <a href=""><span class="value pull-right">76</span></a></li>
									<li><a href=""><span class="label-text">DHA</span></a> <a href=""><span class="value pull-right">59</span></a></li>
									<li><a href=""><span class="label-text">Bahria Town</span></a> <a href=""><span class="value pull-right">39</span></a></li>
									<li><a href=""><span class="label-text">Askari</span></a> <a href=""><span class="value pull-right">76</span></a></li>
								</ul>
							</div>
							
							
						</div>
					</div>
				</div>
				
				
				
			</div>
			
			
			
		</div>
</main>
	<!-- Main Starts -->
 

	<?php include 'footer.php' ?>
	<script type="text/javascript">
		google.charts.load('current', {packages: ['corechart', 'line']});
		google.charts.setOnLoadCallback(drawTrendlines);

		function drawTrendlines() {
		      var data = new google.visualization.DataTable();
		      data.addColumn('number', 'X');
		      data.addColumn('number', 'Dogs');
		      data.addColumn('number', 'Cats');

		      data.addRows([
		        [0, 0, 0],    [1, 10, 5],   [2, 23, 15],  [3, 17, 9],   [4, 18, 10],  [5, 9, 5],
		        [6, 11, 3],   [7, 27, 19],  [8, 33, 25],  [9, 40, 32],  [10, 32, 24], [11, 35, 27],
		        [12, 30, 22], [13, 40, 32], [14, 42, 34], [15, 47, 39], [16, 44, 36], [17, 48, 40],
		        [18, 52, 44], [19, 54, 46], [20, 42, 34], [21, 55, 47], [22, 56, 48], [23, 57, 49],
		        [24, 60, 52], [25, 50, 42], [26, 52, 44], [27, 51, 43], [28, 49, 41], [29, 53, 45],
		        [30, 55, 47], [31, 60, 52], [32, 61, 53], [33, 59, 51], [34, 62, 54], [35, 65, 57],
		        [36, 62, 54], [37, 58, 50], [38, 55, 47], [39, 61, 53], [40, 64, 56], [41, 65, 57],
		        [42, 63, 55], [43, 66, 58], [44, 67, 59], [45, 69, 61], [46, 69, 61], [47, 70, 62],
		        [48, 72, 64], [49, 68, 60], [50, 66, 58], [51, 65, 57], [52, 67, 59], [53, 70, 62],
		        [54, 71, 63], [55, 72, 64], [56, 73, 65], [57, 75, 67], [58, 70, 62], [59, 68, 60],
		        [60, 64, 56], [61, 60, 52], [62, 65, 57], [63, 67, 59], [64, 68, 60], [65, 69, 61],
		        [66, 70, 62], [67, 72, 64], [68, 75, 67], [69, 80, 72]
		      ]);

		      var options = {
		        hAxis: {
		          title: 'Time',
		        },
		        vAxis: {
		          title: 'Popularity'
		        },
		        colors: ['#AB0D06', '#007329'],
		        trendlines: {
		          0: {type: 'exponential', color: '#333', opacity: 1},
		          1: {type: 'linear', color: '#111', opacity: .3}
		        }
		      };

		      var chart = new google.visualization.LineChart(document.getElementById('chart'));
		      chart.draw(data, options);
    	}
	</script>
	<script src="https://www.amcharts.com/lib/3/amcharts.js"></script>
	<script src="https://www.amcharts.com/lib/3/serial.js"></script>
	<script src="https://www.amcharts.com/lib/3/themes/light.js"></script>
	<script type="text/javascript">

		$(document).ready(function(){
			var chart = AmCharts.makeChart("chartdiv", {
			"type": "serial",
			"theme": "light",
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
			"dataProvider": [{
				"date": "2012-07-27",
				"value": 13
			}, {
				"date": "2012-07-28",
				"value": 11
			}, {
				"date": "2012-07-29",
				"value": 15
			}, {
				"date": "2012-07-30",
				"value": 16
			}, {
				"date": "2012-07-31",
				"value": 18
			}, {
				"date": "2012-08-01",
				"value": 13
			}, {
				"date": "2012-08-02",
				"value": 22
			}, {
				"date": "2012-08-03",
				"value": 23
			}, {
				"date": "2012-08-04",
				"value": 20
			}, {
				"date": "2012-08-05",
				"value": 17
			}, {
				"date": "2012-08-06",
				"value": 16
			}, {
				"date": "2012-08-07",
				"value": 18
			}, {
				"date": "2012-08-08",
				"value": 21
			}, {
				"date": "2012-08-09",
				"value": 26
			}, {
				"date": "2012-08-10",
				"value": 24
			}, {
				"date": "2012-08-11",
				"value": 29
			}, {
				"date": "2012-08-12",
				"value": 32
			}, {
				"date": "2012-08-13",
				"value": 18
			}, {
				"date": "2012-08-14",
				"value": 24
			}, {
				"date": "2012-08-15",
				"value": 22
			}, {
				"date": "2012-08-16",
				"value": 18
			}, {
				"date": "2012-08-17",
				"value": 19
			}, {
				"date": "2012-08-18",
				"value": 14
			}, {
				"date": "2012-08-19",
				"value": 15
			}, {
				"date": "2012-08-20",
				"value": 12
			}, {
				"date": "2012-08-21",
				"value": 8
			}, {
				"date": "2012-08-22",
				"value": 9
			}, {
				"date": "2012-08-23",
				"value": 8
			}, {
				"date": "2012-08-24",
				"value": 7
			}, {
				"date": "2012-08-25",
				"value": 5
			}, {
				"date": "2012-08-26",
				"value": 11
			}, {
				"date": "2012-08-27",
				"value": 13
			}, {
				"date": "2012-08-28",
				"value": 18
			}, {
				"date": "2012-08-29",
				"value": 20
			}, {
				"date": "2012-08-30",
				"value": 29
			}, {
				"date": "2012-08-31",
				"value": 33
			}, {
				"date": "2012-09-01",
				"value": 42
			}, {
				"date": "2012-09-02",
				"value": 35
			}, {
				"date": "2012-09-03",
				"value": 31
			}, {
				"date": "2012-09-04",
				"value": 47
			}, {
				"date": "2012-09-05",
				"value": 52
			}, {
				"date": "2012-09-06",
				"value": 46
			}, {
				"date": "2012-09-07",
				"value": 41
			}, {
				"date": "2012-09-08",
				"value": 43
			}, {
				"date": "2012-09-09",
				"value": 40
			}, {
				"date": "2012-09-10",
				"value": 39
			}, {
				"date": "2012-09-11",
				"value": 34
			}, {
				"date": "2012-09-12",
				"value": 29
			}, {
				"date": "2012-09-13",
				"value": 34
			}, {
				"date": "2012-09-14",
				"value": 37
			}, {
				"date": "2012-09-15",
				"value": 42
			}, {
				"date": "2012-09-16",
				"value": 49
			}, {
				"date": "2012-09-17",
				"value": 46
			}, {
				"date": "2012-09-18",
				"value": 47
			}, {
				"date": "2012-09-19",
				"value": 55
			}, {
				"date": "2012-09-20",
				"value": 59
			}, {
				"date": "2012-09-21",
				"value": 58
			}, {
				"date": "2012-09-22",
				"value": 57
			}, {
				"date": "2012-09-23",
				"value": 61
			}, {
				"date": "2012-09-24",
				"value": 59
			}, {
				"date": "2012-09-25",
				"value": 67
			}, {
				"date": "2012-09-26",
				"value": 65
			}, {
				"date": "2012-09-27",
				"value": 61
			}, {
				"date": "2012-09-28",
				"value": 66
			}, {
				"date": "2012-09-29",
				"value": 69
			}, {
				"date": "2012-09-30",
				"value": 71
			}, {
				"date": "2012-10-01",
				"value": 67
			}, {
				"date": "2012-10-02",
				"value": 63
			}, {
				"date": "2012-10-03",
				"value": 46
			}, {
				"date": "2012-10-04",
				"value": 32
			}, {
				"date": "2012-10-05",
				"value": 21
			}, {
				"date": "2012-10-06",
				"value": 18
			}, {
				"date": "2012-10-07",
				"value": 21
			}, {
				"date": "2012-10-08",
				"value": 28
			}, {
				"date": "2012-10-09",
				"value": 27
			}, {
				"date": "2012-10-10",
				"value": 36
			}, {
				"date": "2012-10-11",
				"value": 33
			}, {
				"date": "2012-10-12",
				"value": 31
			}, {
				"date": "2012-10-13",
				"value": 30
			}, {
				"date": "2012-10-14",
				"value": 34
			}, {
				"date": "2012-10-15",
				"value": 38
			}, {
				"date": "2012-10-16",
				"value": 37
			}, {
				"date": "2012-10-17",
				"value": 44
			}, {
				"date": "2012-10-18",
				"value": 49
			}, {
				"date": "2012-10-19",
				"value": 53
			}, {
				"date": "2012-10-20",
				"value": 57
			}, {
				"date": "2012-10-21",
				"value": 60
			}, {
				"date": "2012-10-22",
				"value": 61
			}, {
				"date": "2012-10-23",
				"value": 69
			}, {
				"date": "2012-10-24",
				"value": 67
			}, {
				"date": "2012-10-25",
				"value": 72
			}, {
				"date": "2012-10-26",
				"value": 77
			}, {
				"date": "2012-10-27",
				"value": 75
			}, {
				"date": "2012-10-28",
				"value": 70
			}, {
				"date": "2012-10-29",
				"value": 72
			}, {
				"date": "2012-10-30",
				"value": 70
			}, {
				"date": "2012-10-31",
				"value": 72
			}, {
				"date": "2012-11-01",
				"value": 73
			}, {
				"date": "2012-11-02",
				"value": 67
			}, {
				"date": "2012-11-03",
				"value": 68
			}, {
				"date": "2012-11-04",
				"value": 65
			}, {
				"date": "2012-11-05",
				"value": 71
			}, {
				"date": "2012-11-06",
				"value": 75
			}, {
				"date": "2012-11-07",
				"value": 74
			}, {
				"date": "2012-11-08",
				"value": 71
			}, {
				"date": "2012-11-09",
				"value": 76
			}, {
				"date": "2012-11-10",
				"value": 77
			}, {
				"date": "2012-11-11",
				"value": 81
			}, {
				"date": "2012-11-12",
				"value": 83
			}, {
				"date": "2012-11-13",
				"value": 80
			}, {
				"date": "2012-11-14",
				"value": 81
			}, {
				"date": "2012-11-15",
				"value": 87
			}, {
				"date": "2012-11-16",
				"value": 82
			}, {
				"date": "2012-11-17",
				"value": 86
			}, {
				"date": "2012-11-18",
				"value": 80
			}, {
				"date": "2012-11-19",
				"value": 87
			}, {
				"date": "2012-11-20",
				"value": 83
			}, {
				"date": "2012-11-21",
				"value": 85
			}, {
				"date": "2012-11-22",
				"value": 84
			}, {
				"date": "2012-11-23",
				"value": 82
			}, {
				"date": "2012-11-24",
				"value": 73
			}, {
				"date": "2012-11-25",
				"value": 71
			}, {
				"date": "2012-11-26",
				"value": 75
			}, {
				"date": "2012-11-27",
				"value": 79
			}, {
				"date": "2012-11-28",
				"value": 70
			}, {
				"date": "2012-11-29",
				"value": 73
			}, {
				"date": "2012-11-30",
				"value": 61
			}, {
				"date": "2012-12-01",
				"value": 62
			}, {
				"date": "2012-12-02",
				"value": 66
			}, {
				"date": "2012-12-03",
				"value": 65
			}, {
				"date": "2012-12-04",
				"value": 73
			}, {
				"date": "2012-12-05",
				"value": 79
			}, {
				"date": "2012-12-06",
				"value": 78
			}, {
				"date": "2012-12-07",
				"value": 78
			}, {
				"date": "2012-12-08",
				"value": 78
			}, {
				"date": "2012-12-09",
				"value": 74
			}, {
				"date": "2012-12-10",
				"value": 73
			}, {
				"date": "2012-12-11",
				"value": 75
			}, {
				"date": "2012-12-12",
				"value": 70
			}, {
				"date": "2012-12-13",
				"value": 77
			}, {
				"date": "2012-12-14",
				"value": 67
			}, {
				"date": "2012-12-15",
				"value": 62
			}, {
				"date": "2012-12-16",
				"value": 64
			}, {
				"date": "2012-12-17",
				"value": 61
			}, {
				"date": "2012-12-18",
				"value": 59
			}, {
				"date": "2012-12-19",
				"value": 53
			}, {
				"date": "2012-12-20",
				"value": 54
			}, {
				"date": "2012-12-21",
				"value": 56
			}, {
				"date": "2012-12-22",
				"value": 59
			}, {
				"date": "2012-12-23",
				"value": 58
			}, {
				"date": "2012-12-24",
				"value": 55
			}, {
				"date": "2012-12-25",
				"value": 52
			}, {
				"date": "2012-12-26",
				"value": 54
			}, {
				"date": "2012-12-27",
				"value": 50
			}, {
				"date": "2012-12-28",
				"value": 50
			}, {
				"date": "2012-12-29",
				"value": 51
			}, {
				"date": "2012-12-30",
				"value": 52
			}, {
				"date": "2012-12-31",
				"value": 58
			}, {
				"date": "2013-01-01",
				"value": 60
			}, {
				"date": "2013-01-02",
				"value": 67
			}, {
				"date": "2013-01-03",
				"value": 64
			}, {
				"date": "2013-01-04",
				"value": 66
			}, {
				"date": "2013-01-05",
				"value": 60
			}, {
				"date": "2013-01-06",
				"value": 63
			}, {
				"date": "2013-01-07",
				"value": 61
			}, {
				"date": "2013-01-08",
				"value": 60
			}, {
				"date": "2013-01-09",
				"value": 65
			}, {
				"date": "2013-01-10",
				"value": 75
			}, {
				"date": "2013-01-11",
				"value": 77
			}, {
				"date": "2013-01-12",
				"value": 78
			}, {
				"date": "2013-01-13",
				"value": 70
			}, {
				"date": "2013-01-14",
				"value": 70
			}, {
				"date": "2013-01-15",
				"value": 73
			}, {
				"date": "2013-01-16",
				"value": 71
			}, {
				"date": "2013-01-17",
				"value": 74
			}, {
				"date": "2013-01-18",
				"value": 78
			}, {
				"date": "2013-01-19",
				"value": 85
			}, {
				"date": "2013-01-20",
				"value": 82
			}, {
				"date": "2013-01-21",
				"value": 83
			}, {
				"date": "2013-01-22",
				"value": 88
			}, {
				"date": "2013-01-23",
				"value": 85
			}, {
				"date": "2013-01-24",
				"value": 85
			}, {
				"date": "2013-01-25",
				"value": 80
			}, {
				"date": "2013-01-26",
				"value": 87
			}, {
				"date": "2013-01-27",
				"value": 84
			}, {
				"date": "2013-01-28",
				"value": 83
			}, {
				"date": "2013-01-29",
				"value": 84
			}, {
				"date": "2013-01-30",
				"value": 81
			}]
		});

		chart.addListener("rendered", zoomChart);

		zoomChart();

		function zoomChart() {
			chart.zoomToIndexes(chart.dataProvider.length - 40, chart.dataProvider.length - 1);
		}
		});

	</script>

