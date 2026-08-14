<?php include 'header.php' ?>

<!-- banner-wraper starts -->
<div class="banner-wraper"> 


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
                    <form class="navbar-form navbar-left" role="search">
                      <div class="col-md-12 srch-flds">
						<div class="col-md-4 col-sm-4 form-select price-index-dropdown">
                          <select class="form-control selectpicker" name="city" title="City" id="radiusSelect4">
                              <option value="20" class="tabbed">Farm Houses</option>
                              <option value="24" class="tabbed">Rooms</option>
                              <option value="25" class="tabbed">Penthouse</option>
                          </select>
                        </div>
						<div class="col-md-4 col-sm-4 form-select price-index-dropdown">
                          <select class="form-control selectpicker" name="town" title="Town" id="radiusSelect2">
                            <option value="0"> Lahore </option>
                            <option value="1"> Karachi </option>
                            <option value="2"> Islamabad </option>
                          </select>
                        </div>
                        
                        <div class="col-md-4 col-sm-4 btn-price-index text-center padding-left clearfix">
                          <button type="submit" class="btn btn-default btn-style">Search Now</button>
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
								<h2>DHA Lahore Price Indexes.</h2>
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
								<h2>DHA Lahore Price Indexes.</h2>
							</div>
						</div>
						<div class="col-md-12">
							<div class="table-responsive">
								<table class="table table-bordered">
									<thead>
										<tr>
										  <th>Title</th>
										  <th>Index</th>
										  <th>Price/FT2</th>
										  <th>Price</th>
										  <th>3M</th>
										  <th>6M</th>
										  <th>1 Year</th>
										</tr>
									</thead>
									<tbody>
										<tr>
										  <td>Lahore DHA Defence, 5 Marla</td>
										  <td>231.79</td>
										  <td>10,822</td>
										  <td>15,242,387</td>
										  <td class="green-index">+1.46%</td>
										  <td class="red-index">-1.46%</td>
										  <td class="green-index">+1.46%</td>
										</tr>
										<tr>
										  <td>Lahore DHA Defence, 5 Marla</td>
										  <td>231.79</td>
										  <td>10,822</td>
										  <td>15,242,387</td>
										  <td class="green-index">+1.46%</td>
										  <td class="red-index">-1.46%</td>
										  <td class="green-index">+1.46%</td>
										</tr>
										<tr>
										  <td>Lahore DHA Defence, 5 Marla</td>
										  <td>231.79</td>
										  <td>10,822</td>
										  <td>15,242,387</td>
										  <td class="green-index">+1.46%</td>
										  <td class="red-index">-1.46%</td>
										  <td class="green-index">+1.46%</td>
										</tr>
										<tr>
										  <td>Lahore DHA Defence, 5 Marla</td>
										  <td>231.79</td>
										  <td>10,822</td>
										  <td>15,242,387</td>
										  <td class="green-index">+1.46%</td>
										  <td class="red-index">-1.46%</td>
										  <td class="green-index">+1.46%</td>
										</tr>
										<tr>
										  <td>Lahore DHA Defence, 5 Marla</td>
										  <td>231.79</td>
										  <td>10,822</td>
										  <td>15,242,387</td>
										  <td class="green-index">+1.46%</td>
										  <td class="red-index">-1.46%</td>
										  <td class="green-index">+1.46%</td>
										</tr>
										<tr>
										  <td>Lahore DHA Defence, 5 Marla</td>
										  <td>231.79</td>
										  <td>10,822</td>
										  <td>15,242,387</td>
										  <td class="green-index">+1.46%</td>
										  <td class="red-index">-1.46%</td>
										  <td class="green-index">+1.46%</td>
										</tr>
									</tbody>
								</table>
							  </div>
						</div>
					</div>
				</div>
			</section>



			
			
			
			
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
	