<div class="container-fluid">
				<div class="container">
					<div class="row">
						<div class="col-md-12 text-center file-rate">
							<h3>Files Rates</h3>
							<p>Note:Files Rates are Volatile and subject to change any time. For latest updates please call (042) 35742250</p>
						</div>
						<div class="col-md-12 file-rateselect">
							<form id="graph-form" class="form-inline" action="">
								{{ csrf_field() }}
						    <select class="selectpicker" name="city_id" id="city" data-size="10">
				    	 	 	
					    	 	@foreach($cities as $city)
	                                    <option value="{{ $city->id }}">{{$city->name}}</option>
	                              @endforeach
								</select>
							  
								<select name="town_id" id="town"  class="selectpicker" data-size="10" >
                                 </select>
								<select name="phase_id" id="phase" class="selectpicker" data-size="10" >
                               	 </select>
								<select class="selectpicker" id="area" name="area" data-size="10" >
				    	 	 	<option value="0" selected>Select Area</option>		
								@for($i=1; $i<11; $i++)
								  <option value="{{$i}}">{{ $i }}</option>
								 @endfor
								</select>
								<select class="selectpicker" id="type" name="type">
				    	 	 	<option value="0">Select Area Type</option>		
				    	 	 	<option value="marla">Marla</option>		
				    	 	 	<option value="kanal">Kanal</option>		
								</select>
							</form>

							
						</div>
						<div class="col-md-12">
							<div class="col-md-7 no-padding" >
								<div class="mCustomScrollbar">
									<table class="table text-center">
									    <thead class="file_table">
										    <tr>
										        <th>Title</th>
										        <th>Date</th>
										        <th>Area</th>
										        <th>Price</th>
										        <th>Contact</th>
										    </tr>
									    </thead>
									    <tbody id="file-chart">
									     </tbody>
									</table>
								</div> 
							</div>
							<div class="col-md-5 chart">
								<div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>
							</div>
						</div>
					</div>
				</div>
			</div>


@section('chart_script')
<script>
		$(document).ready(function(){
            loadTowns();
		});
		
		$('#city').change(function () {
		loadTowns();
		});
		$('#town').change(function () {
		loadPhases();
		});
		$('#city').change(function () {
		sendAjaxCall();
		});
        
        $('#phase').change(function () {
		sendAjaxCall();
		});
		
		$('#area').change(function () {
		sendAjaxCall();
		});
	    
		$('#type').change(function () {
		sendAjaxCall();
		});
	   function loadTowns(){
                id =$('#city option:selected').val()
                $.ajax({
                    url: '/LocationCity_file/'+id,
                    type:'POST',
                    datatype:'html',
                    data: id,
                 headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    success: function (json) {	
                        $('#town').html(json);
                        loadPhases();
                    }
                });
            }
            function loadPhases()
            {
                town_id =$('#town option:selected').val();
                $.ajax({
                    url: '/cityTown_file/'+town_id,
                    type: 'POST',
                    datatype:'html',
                    data:town_id,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    success: function (json) {
                        $('#phase').html(json);
                        $('.selectpicker').selectpicker('refresh');
                        sendAjaxCall();
                    }
                });
            }

            function sendAjaxCall(){
	   			var data = $('#graph-form').serialize();
	   				$.ajax({
                    url: '/graphdata',
                    type: 'POST',
                    datatype:'html',
                    data:data,
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content') },
                    success: function (json) {
                    	$('#file-chart').html(json);

                       
                        
                    }
                });

            }


</script>

@endsection

